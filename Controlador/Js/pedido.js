$(document).ready(function(){
    let categProducto ='';
    let categProveedor ='';
    $(document).on('click', '#producto', function () {
        $('#producto').val('');
    });
    $(document).on('click', '#proveedor', function () {
        $('#proveedor').val('');
    });

    $(document).on('click','#nuevo', function (e) {
        if ($('#nuevo').val()=='oculto') {
            modal(1);
        } else if ($('#nuevo').val()=='visible') {
            modal(0);
        }
        
      });
    
    let operacion = 'Consultar'; 
    //llenamos los datalist  
    $.post('../../controlador/producto.controlador.php', {operacion}, function (respuesta) {
        let datos = JSON.parse(respuesta);
        datos.forEach(dato => {
            option = document.createElement("option");
            option.value = dato.nombreProducto;  
            option.setAttribute('data-index-number',dato.idProducto);
            document.getElementById('productos').append(option); 
        });
    })

    $.post('../../controlador/proveedor.controlador.php', {operacion}, function (respuesta) {
        let datos = JSON.parse(respuesta);
        datos.forEach(dato => {
            option = document.createElement("option");
            option.value = dato.nombreProveedor;  
            option.setAttribute('data-index-number',dato.idProveedor);
            document.getElementById('proveedores').append(option); 
        });
    })

    function seleccion(selec) {
        switch (selec) {
            case 'pedidos':
                $('#table').dataTable().fnDestroy();
                $('#col1').html('Proveedor');
                $('#col2').html('Fecha');
                $('#col3').html('Producto');
                $('#col4').html('');                
                $.post('../../controlador/pedido.controlador.php', {operacion}, function (respuesta) {
                    var table = null;                 
                    $.each(JSON.parse(respuesta), function(index, val) {
                        
                        table += '<tr class="mostrarPedido" id='+val.idPedido+'-'+val.idProveedor+'-'+val.idProducto+'-'+val.cantidadPedido+'>';
                        table += '<td>'+val.nombreProveedor+'</td>';
                        table += '<td>'+val.fechaPedido+'</td>';
                        table += '<td>'+val.nombreProducto+'</td>';
                        table += '<td><button type="button" class="editar btn btn-success" >Confirmar</button> </td>';
                        table += '</tr>';
                        
                    });
                    $('#tableBody').html(table);
                    $('#table').dataTable();
                })
                break;
            case 'productos':
                $('#table').dataTable().fnDestroy();
                $('#col1').html('Producto');
                $('#col2').html('Cantidad');
                $('#col3').html('Precio Unitario');
                $('#col4').html('Categoria');                
                $.post('../../controlador/producto.controlador.php', {operacion}, function (respuesta) {
                    var table = null;                 
                    $.each(JSON.parse(respuesta), function(index, val) {
                        if (val.cantidadProducto<30) {
                            table += '<tr class="mostrarProducto" id='+val.idProducto+'-'+val.idCategoria+'>';
                            table += '<td>'+val.nombreProducto+'</td>';
                            table += '<td>'+val.cantidadProducto+'</td>';
                            table += '<td>'+val.precioProducto+'</td>';
                            table += '<td>'+val.nombreCategoria+'</td>';
                            table += '</tr>';
                        }
                    });
                    $('#tableBody').html(table);
                    $('#table').dataTable();
                })
                break;
            case 'proveedores':
                $('#table').dataTable().fnDestroy();
                $('#col1').html('Proveedor');
                $('#col2').html('Correo');
                $('#col3').html('Celular');
                $('#col4').html('Categoria');
                $.post('../../controlador/proveedor.controlador.php', {operacion}, function (respuesta) {
                    var table = null;                 
                    $.each(JSON.parse(respuesta), function(index, val) {
                            table += '<tr class="mostrarProveedor" id='+val.idProveedor+'-'+val.idCategoria+'>';
                            table += '<td>'+val.nombreProveedor+'</td>';      
                            table += '<td>'+val.correoProveedor+'</td>';
                            table += '<td>'+val.celularProveedor+'</td>';
                            table += '<td>'+val.nombreCategoria+'</td>';
                            table += '</tr>';                        
                    });
                    $('#tableBody').html(table);
                    $('#table').dataTable();
                })
            break;
        } 
    }
    seleccion($('input:radio[name=consulta]:checked').val());
    
    $("input[name=consulta]").click(function () {    
        seleccion($('input:radio[name=consulta]:checked').val());                
    });

    
    $('#frmPedido').submit(function (e) {
        e.preventDefault();    
        if (categProducto === categProveedor) {
            datos = {
                proveedor: $('#proveedores [value="' + $('#proveedor').val() + '"]').data('indexNumber'),
                producto: $('#productos [value="' + $('#producto').val() + '"]').data('indexNumber'),
                cantidad: $('#cantidad').val(),
                total: $('#total').val(),
                operacion: 'Creo'
            };
            $.post('../../controlador/pedido.controlador.php', datos, function (respuesta) {
                modal(0);
                if (respuesta!='"X"') {
                    $.each(JSON.parse(respuesta), function(index, resultado) {
                        if (resultado['correoProveedor'] != '') {
                            alertify.success(`Se realizo el pedido con exito!!`);
                            (function(){
                                emailjs.init("user_byEQvmqnhWJ1OiqfrbDSW");
                            })();
                            setTimeout(() => {                                    
                                    emailjs.send("gmail", "template_Nf8vKGWa", {"to_email":`${resultado.correoProveedor}`,"from_name":`${resultado.nombreProveedor}`,"cantidad":`${resultado.cantidadPedido}`,"producto":`${resultado.nombreProducto}`,"total":`${resultado.totalPedido}`,"subject":"Pedido"})
                                    .then(function(){ 
                                        alertify.success('Se envio un correo a el proveedor');
                                    }, function(err) {
                                        alertify.error('No se logro enviar correo al proveedor, Llamalo!')
                                    });
                            }, 3000);
                        }else{
                            alertify.error('No se logro realizar el pedido');
                        }
                    });
                }else{
                    alertify.error('Este pedido ya se realizo');
                }
            })
        }  
        else{
            alertify.error('El proveedor no ofrece ese producto, tenga en cuenta la categoria');
        } 
     });

    $(document).on('click','.mostrarPedido', function (e) {
    let elemento = $(this)[0];
    let ide = $(elemento).attr('id');
    let arreglo = ide.split('-');
        const datos = {
            idPedido: arreglo[0],
            idProveedor: arreglo[1],
            idProducto: arreglo[2],
            operacion: 'consultarEditar'
        };
      $.post('../../controlador/pedido.controlador.php', datos, function (respuesta) {
        modal(1);
        let datos = JSON.parse(respuesta);
        datos.forEach(dato => { 
            $('#proveedor').val(dato.nombreProveedor); 
            $('#producto').val(dato.nombreProducto); 
            $('#cantidad').val(dato.cantidadPedido); 
            $('#total').val(dato.totalPedido); 
            $('#btnFormu').css("display", "none");
        });
    })
        e.preventDefault(); 
    });

    $(document).on('click','.mostrarProducto', function (e) {
        window.scroll(0, 0);
        let elemento = $(this)[0];
        let ide = $(elemento).attr('id');
        let arreglo = ide.split('-');
            const datos = {
                idProducto: arreglo[0],
                idCategoria: arreglo[1],
                operacion: 'consultarEditar'
            };
        $.post('../../controlador/producto.controlador.php', datos, function (respuesta) {
            modal(1);
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => { 
                $('#producto').val(dato.nombreProducto); 
                $('#producto').attr('indexNumber', dato.idProducto);
                categProducto = dato.idCategoria;
            });
        })
         e.preventDefault(); 
      });
      
      $(document).on('click','.mostrarProveedor', function (e) {
        let elemento = $(this)[0];
        let ide = $(elemento).attr('id');
        let arreglo = ide.split('-');
            const datos = {
                idProveedor: arreglo[0],
                idCategoria: arreglo[1],
                operacion: 'consultarEditar'
            };
        $.post('../../controlador/proveedor.controlador.php', datos, function (respuesta) {
            modal(1);
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => { 
                $('#proveedor').val(dato.nombreProveedor); 
                $('#proveedor').attr('indexNumber', dato.idProducto);
                categProveedor = dato.idCategoria;
            });
        })
         e.preventDefault(); 
      });

      $(document).on('click', '.editar', function (e) {        
        let elemento = $(this)[0].parentElement.parentElement;
        let ide = $(elemento).attr('id');
        let arreglo = ide.split('-');
        const datos = {
            idPedido: arreglo[0],
            idProducto: arreglo[2],
            cantidad: arreglo[3],
            operacion: 'Edito'
        };
        alertify.confirm("Seguro de confirmar este pedido?", function (e) {
            if (e) {
                $.post('../../controlador/pedido.controlador.php',datos, function (respuesta) {
                    modal(0);
                    if (respuesta == '1') {
                        alertify.success('Se confirmo el producto con exito!!');
                    }else{
                        alertify.error('Error no se logro confirmar el producto');
                    }
                    
                })
            }
            seleccion('pedidos');
        });
        e.preventDefault();
    });
      
    function modal(tipo) {
        if (tipo == 1) {
            document.querySelector('#formulario').style.display = 'block';
            $('#divTabla').attr('class',"col-md-8");
            $('#nuevo').val('visible');
            $('#nuevo').html('-');   
            
        }else{
            document.querySelector('#formulario').style.display = 'none';
            $('#nuevo').val('oculto');
            $('#nuevo').html('+');
            $('#divTabla').attr('class',"col-md-11");
            $('#producto').val('');
            $('#proveedor').val('');
            $('#cantidad').val('');
            $('#total').val('');
            $('#btnFormu').css("display", "block");
        }
        
    }

});