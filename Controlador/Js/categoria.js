$(document).ready(function(){
    read();
    $(document).on('click','#nuevo', function (e) {
        if ($('#nuevo').val()=='oculto') {
            modal(1);
        } else if ($('#nuevo').val()=='visible') {
            modal(0);
        }
        
      });
      
    $('#frmCategoria').submit(function (e) {
        e.preventDefault();
        let datos = {};
        if ($('#btnFormu').html() == 'Crear Categoria') {
            datos = {
                nombre: $('#nombreCategoria').val(),
                id: $('#idCategoria').val(),
                operacion: 'Creo'
            };
        }
        else if ($('#btnFormu').html() == 'Editar Categoria') {
            datos = {
                nombre: $('#nombreCategoria').val(),
                id: $('#idCategoria').val(),
                operacion: 'Edito'
            };
        }
        $.post('../../controlador/categoria.controlador.php', datos, function (respuesta) {
            if (respuesta == '1') {
                alertify.success(`Se ${datos.operacion} la Categoria con exito!!`);
                
            }else{
                alertify.error(`Error: no se ${datos.operacion} la categoria`);
            }
            modal(0);
         })
       read();
     });

    function read(){        
        $('#tableCategoria').dataTable().fnDestroy();
        let operacion = 'Consultar';   
        $.post('../../controlador/categoria.controlador.php', {operacion}, function (respuesta) {
            var table = null;                 
            $.each(JSON.parse(respuesta), function(index, val) {
                table += '<tr class="editaCategoria" id='+val.idCategoria+'>';
                table += '<th>'+(index+1)+'</th>';
                table += '<td>'+val.nombreCategoria+'</td>';
                table += '<td><button type="button" class="eliminar btn btn-danger" >Eliminar</button> </td>';
                table += '</tr>';
            });
            
            $('#tableCategoriaBody').html(table);
            $('#tableCategoria').dataTable();
        })
        .fail(function(){
            alertify.error('No hay datos en la tabla');
        })
    }
    $(document).on('click','.editaCategoria', function (e) {
        window.scroll(0, 0);
        let elemento = $(this)[0];
        let ide = $(elemento).attr('id');
            const datos = {
                id: ide,
                operacion: 'consultarEditar'
            };
        $.post('../../controlador/categoria.controlador.php', datos, function (respuesta) {
            modal(1);
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => {
              $('#nombreCategoria').val(dato.nombreCategoria);
              $('#idCategoria').val(dato.idCategoria);
              $('#btnFormu').html('Editar Categoria');
            });
            
            
        })
         e.preventDefault(); 
      });

    $(document).on('click', '.eliminar', function (e) {
        
        let elemento = $(this)[0].parentElement.parentElement;
                let ide = $(elemento).attr('id');
                const datos = {
                    id: ide,
                    operacion: 'Eliminar'
                };
        alertify.confirm("Esta seguro de realizar los cambios", function (e) {
            
            if (e) {
                
                $.post('../../controlador/categoria.controlador.php',datos, function (respuesta) {
                    modal(0);
                    if (respuesta == '1') {
                        alertify.success('Se elimino la Categoria con exito!!');
                    }else{
                        alertify.error('Error no se logro eliminar la Categoria');
                    }
                    read();
                   
                })
            }else {
                alertify.error('Hubo un error al actualizar los datos');
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
            $('#nombreCategoria').val('');
            $('#idCategoria').val('');
            $('#btnFormu').html('Crear Categoria');
        }else{
            document.querySelector('#formulario').style.display = 'none';
            $('#nuevo').val('oculto');
            $('#nuevo').html('+');
            $('#divTabla').attr('class',"col-md-11");
        }
        
    }

});