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
    
    $('#frmProveedor').submit(function (e) {
        e.preventDefault();         
        let datos = {};
        if ($('#btnFormu').html() == 'Crear Proveedor') {
            datos = {
                nombre: $('#nombre').val(),
                numero: $('#numero').val(),
                correo: $('#correo').val(),
                categoria: $('#categ [value="' + $('#categoria').val() + '"]').data('indexNumber'),
                operacion: 'Creo'
            };
        }
        else if ($('#btnFormu').html() == 'Editar Proveedor') {
            datos = {
                id: $('#idProveedor').val(),
                nombre: $('#nombre').val(),
                numero: $('#numero').val(),
                correo: $('#correo').val(),
                categoria: $('#categ [value="' + $('#categoria').val() + '"]').data('indexNumber'),
                operacion: 'Edito'
            };
        }
        $.post('../../controlador/proveedor.controlador.php', datos, function (respuesta) {
            if (respuesta == '1') {
                alertify.success(`Se ${datos.operacion} el proveedor con exito!!`);
                
            }else{
                alertify.error(`Error: no se ${datos.operacion} el proveedor`);
            }
            modal(0);
            read();
         })
       
     });

    function read(){   
        let operacion = 'Consultar'; 
        $('#tableProveedor').dataTable().fnDestroy();
        $.post('../../controlador/proveedor.controlador.php', {operacion}, function (respuesta) {
            var table = null;                 
            $.each(JSON.parse(respuesta), function(index, val) {
                table += '<tr class="editaProveedor" id='+val.idProveedor+'-'+val.idCategoria+'>';                
                table += '<td>'+val.nombreCategoria+'</td>';
                table += '<td>'+val.nombreProveedor+'</td>';
                table += '<td>'+val.celularProveedor+'</td>';
                table += '<td>'+val.correoProveedor+'</td>';
                table += '<td><button type="button" class="eliminar btn btn-danger" >Eliminar</button> </td>';
                table += '</tr>';
            });
            
            $('#tableProveedorBody').html(table);
            $('#tableProveedor').dataTable();
        })
        .fail(function(){
            alertify.error('No hay datos en la tabla');
        })
        
    }



    $(document).on('click','.editaProveedor', function (e) {
        window.scroll(0, 0);
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
              $('#idProveedor').val(dato.idProveedor);
              $('#nombre').val(dato.nombreProveedor);
              $('#numero').val(dato.celularProveedor);
              $('#correo').val(dato.correoProveedor);
              $('#categoria').val(dato.nombreCategoria);
              $('#categoria').attr('indexNumber', dato.idCategoria);
              $('#btnFormu').html('Editar Proveedor');
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
        alertify.confirm("Esta seguro de eliminar a este proveedor?", function (e) {
            if (e) {
                $.post('../../controlador/proveedor.controlador.php',datos, function (respuesta) {
                    modal(0);
                    if (respuesta == '1') {
                        alertify.success('Se elimino el proveedor con exito!!');
                    }else{
                        alertify.error('Error no se logro eliminar el proveedor');
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
            $('#nombre').val('');
            $('#celular').val('');
            $('#idProveedor').val('');
            $('#correo').val('');
            $('#categoria').val('');
            $('#btnFormu').html('Crear Proveedor');
        }else{
            document.querySelector('#formulario').style.display = 'none';
            $('#nuevo').val('oculto');
            $('#nuevo').html('+');
            $('#divTabla').attr('class',"col-md-11");
        }
        
    }

});