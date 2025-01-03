$(document).ready(function(){
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
            datos = {
                id: $('#identificacion').val(),
                nombre: $('#nombre').val(),
                numero: $('#numero').val(),
                correo: $('#correo').val(),
                operacion: 'Creo'
            };
        
        $.post('../../controlador/empleado.controlador.php', datos, function (retorno) {
            let respuesta = JSON.parse(retorno);
            if (respuesta[0] == '1') {
                alertify.success(`Se ${datos.operacion} el empleado con exito!!`);
                (function(){
                    emailjs.init("user_byEQvmqnhWJ1OiqfrbDSW");
                })();
                setTimeout(() => {
                    emailjs.send("gmail", "datos_de_acceso", {"to_email":respuesta[1],"from_name":"Cigarreria Perez sistema","rol":respuesta[6],"from_email":"Sistema cigarreria perez","intro":respuesta[3],"user":respuesta[4],"enlace":respuesta[7],"pass":"Contraseña: "+respuesta[5],"subject":"Datos de Acceso"})
                    .then(function(){ 
                        alertify.success(`los datos de acceso fueron enviados a el correo de el empleado`);
                    }, function(err) {
                        alertify.warning(`la contrase de ${datos.nombre} es: ${respuesta[5]}`);
                    });
                }, 3000);
            }else{
                alertify.error(`Error: no se ${datos.operacion} el empleado`);
            }
            modal(0);
            read();
         })
       
     });

    function read(){   
        let operacion = 'Consultar'; 
        $('#tableEmpleado').dataTable().fnDestroy();
        $.post('../../controlador/empleado.controlador.php', {operacion}, function (respuesta) {
            var table = null;                 
            $.each(JSON.parse(respuesta), function(index, val) {
                table += '<tr class="consultaEmpleado" id='+val.numCedula+'>';
                table += '<td>'+val.nombreUsuario+'</td>';
                table += '<td>'+val.celularUsuario+'</td>';
                table += '<td><button type="button" class="eliminar btn btn-danger" >Eliminar</button> </td>';
                table += '</tr>';
            });
            
            $('#tableEmpleadoBody').html(table);
            $('#tableEmpleado').dataTable();
        })
        .fail(function(){
            alertify.error('No hay datos en la tabla');
        })
        
    }


    $(document).on('click','.consultaEmpleado', function (e) {
        window.scroll(0, 0);
        let elemento = $(this)[0];
        let ide = $(elemento).attr('id');
            const datos = {
                id: ide,
                operacion: 'consultarEditar'
            };
        $.post('../../controlador/empleado.controlador.php', datos, function (respuesta) {
            modal(1);
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => {
              $('#identificacion').val(dato.numCedula);
              $("#identificacion").prop('disabled', true);
              $('#nombre').val(dato.nombreUsuario);
              $('#numero').val(dato.celularUsuario);
              $('#correo').val(dato.correoUsuario);
              $('#btnFormu').css("display", "none");
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
        alertify.confirm("Esta seguro de retirar a el empleado", function (e) {
            if (e) {
                $.post('../../controlador/empleado.controlador.php',datos, function (respuesta) {
                    modal(0);
                    if (respuesta == '1') {
                        alertify.success('Se retiro el empleado con exito!!');
                    }else{
                        alertify.error('Error no se logro retirar el empleado');
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
            $('#identificacion').val('');
            $("#identificacion").prop('disabled', false);
            $('#nombre').val('');
            $('#numero').val('');
            $('#correo').val('');
            $('#btnFormu').css("display", "block");
        }else{
            document.querySelector('#formulario').style.display = 'none';
            $('#nuevo').val('oculto');
            $('#nuevo').html('+');
            $('#divTabla').attr('class',"col-md-11");
        }
        
    }

});