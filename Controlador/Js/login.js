$(document).ready(function(){   

    $("#olvido").on( 'change', function() {
        if($('#UserEmail').val() != '') {
            user = $('#UserEmail').val();
            $.post('../Controlador/usuario.recuperarClave.php', {user}, function (retorno) {
                let respuesta = JSON.parse(retorno);
            if (respuesta[0] == '1') {
                (function(){
                    emailjs.init("user_byEQvmqnhWJ1OiqfrbDSW");
                })();
                emailjs.send("gmail", "datos_de_acceso", {"to_email":respuesta[1],"from_name":"Cigarreria Perez sistema","from_email":"Sistema cigarreria perez","intro":respuesta[2],"enlace":respuesta[4],"pass":respuesta[3],"subject":"Recuperando tu contraseña"})
                .then(function(){ 
                    alerta(respuesta[5]+" tu nueva contraseña fue enviada a el correo", "alert alert-success", "nada");
                }, function(err) {
                    console.log(err);
                    alerta(respuesta[1]+" no se logro enviar tu nueva contraseña", "alert alert-danger", "nada");
                });
            }else if (respuesta[0] == '0') {
                alerta(`No se logro restablecer su contraseña, intente mas tarde`, 'alert alert-danger', 'nada');
            }else if(respuesta[0] == '2'){
                alerta(`El ${respuesta[1]} usuario no existe`, 'alert alert-danger', 'nada');
            }
            })
            
        } else {
            alerta("Por favor ingrese unicamente su correo", "alert alert-warning", "nada");
        }
    });

    $(document).on('click', '#btn_iniciar', function () {
        event.preventDefault();
        const datos = {
            user: $('#UserEmail').val(),
            password: $('#UserPass').val(), 
            rol: $('#UserRol').val()
        };
        $.post('../Controlador/usuario.ingresar.php', datos, function (respuesta) {
            let datos = JSON.parse(respuesta);
            alerta(datos[0], datos[1], datos[2]);    
        })
      });
      
    function alerta(mensaje, clases, tipo) {
        document.querySelector('#grupo').style.display = 'none';
        const div = document.createElement('div');
        div.appendChild(document.createTextNode(mensaje));
        div.className = clases;
        
        const divMensaje = document.querySelector('#mensajes');
        divMensaje.appendChild(div);
        if (clases != 'alert alert-danger') {
            setTimeout(() => {
                if (tipo != 'Empleado') {
                    $(location).attr('href','administrador/index.php');
                }else{
                    $(location).attr('href','empleado/index.php');
                }
            }, 4000);
        }
        else{
            setTimeout(() => {
                document.querySelector('#grupo').style.display = 'block';
                document.querySelector('#mensajes div').remove();
                $('#formulario').trigger('reset');
            }, 4000);
        }        
    }

});
