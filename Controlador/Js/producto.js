$(document).ready(function(){
    $(document).on('click', '#categoria', function () {
        $('#categoria').val('');
    })
    let operacion = 'Consultar'; 
    //llenamos el datalist de categoria  
    $.post('../../controlador/categoria.controlador.php', {operacion}, function (respuesta) {
        let datos = JSON.parse(respuesta);
        datos.forEach(dato => {
            option = document.createElement("option");
            option.value = dato.nombreCategoria;  
            option.setAttribute('data-index-number',dato.idCategoria);
            document.getElementById('categ').append(option); 
        });
    })

    read();
    $(document).on('click','#nuevo', function (e) {
        if ($('#nuevo').val()=='oculto') {
            modal(1);
        } else if ($('#nuevo').val()=='visible') {
            modal(0);
        }
        
      });
    
    $('#frmProducto').submit(function (e) {
        e.preventDefault();         
        let datos = {};
        if ($('#btnFormu').html() == 'Crear Producto') {
            datos = {
                nombre: $('#producto').val(),
                precio: $('#precio').val(),
                categoria: $('#categ [value="' + $('#categoria').val() + '"]').data('indexNumber'),
                operacion: 'Creo'
            };
        }
        else if ($('#btnFormu').html() == 'Editar Producto') {
            datos = {
                id: $('#idProducto').val(),
                nombre: $('#producto').val(),
                precio: $('#precio').val(),
                categoria: $('#categ [value="' + $('#categoria').val() + '"]').data('indexNumber'),
                operacion: 'Edito'
            };
        }
        $.post('../../controlador/producto.controlador.php', datos, function (respuesta) {
            if (respuesta == '1') {
                alertify.success(`Se ${datos.operacion} el producto con exito!!`);
                
            }else{
                alertify.error(`Error: no se ${datos.operacion} el producto`);
            }
            modal(0);
            read();
         })
       
     });

    function read(){   
        let operacion = 'Consultar'; 
        $('#tableProducto').dataTable().fnDestroy();
        $.post('../../controlador/producto.controlador.php', {operacion}, function (respuesta) {
            var table = null;                 
            $.each(JSON.parse(respuesta), function(index, val) {
                table += '<tr class="editaProducto" id='+val.idProducto+'-'+val.idCategoria+'>';
                table += '<td>'+val.nombreProducto+'</td>';
                table += '<td>'+val.cantidadProducto+'</td>';
                table += '<td>'+val.precioProducto+'</td>';
                table += '<td>'+val.nombreCategoria+'</td>';
                table += '<td><button type="button" class="eliminar btn btn-danger" >Eliminar</button> </td>';
                table += '</tr>';
            });
            
            $('#tableProductoBody').html(table);
            $('#tableProducto').dataTable();
        })
        .fail(function(){
            alertify.error('No hay datos en la tabla');
        })
        
    }



    $(document).on('click','.editaProducto', function (e) {
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
              $('#precio').val(dato.precioProducto);
              $('#idProducto').val(dato.idProducto);
              $('#categoria').val(dato.nombreCategoria);
              $('#categoria').attr('indexNumber', dato.idCategoria);
              $('#btnFormu').html('Editar Producto');
            });
            
            
        })
         e.preventDefault(); 
      });

    $(document).on('click', '.eliminar', function (e) {        
        let elemento = $(this)[0].parentElement.parentElement;
        let ide = $(elemento).attr('id');
        let arreglo = ide.split('-');
        const datos = {
            id: arreglo[0],
            operacion: 'Eliminar'
        };
        alertify.confirm("Esta seguro de realizar los cambios", function (e) {
            if (e) {
                $.post('../../controlador/producto.controlador.php',datos, function (respuesta) {
                    modal(0);
                    if (respuesta == '1') {
                        alertify.success('Se elimino el producto con exito!!');
                    }else{
                        alertify.error('Error no se logro eliminar el producto');
                    }
                    read();
                })
            }
        });
        e.preventDefault();
    });
      

    function modal(tipo) {
        if (tipo == 1) {
            document.querySelector('#formulario').style.display = 'block';
            $('#divTabla').attr('class',"col-md-8");
            $('#nuevo').val('visible');
            $('#nuevo').html('-');   
            $('#producto').val('');
            $('#precio').val('');
            $('#idProducto').val('');
            $('#categoria').val('');
            $('#btnFormu').html('Crear Producto');
        }else{
            document.querySelector('#formulario').style.display = 'none';
            $('#nuevo').val('oculto');
            $('#nuevo').html('+');
            $('#divTabla').attr('class',"col-md-11");
        }
        
    }

});