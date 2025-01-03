$(document).ready(function(){
    mostrar();   
    let varx, imgx; 
    function mostrar(){
        const user = document.getElementById("usuarioG").value; 
        $.post('../../Controlador/usuario.perfil.php', {user}, function (respuesta) {
            let datos = JSON.parse(respuesta);
            datos.forEach(dato => {
              $('#identificacion').val(dato.numCedula);
              $('#nombre').val(dato.nombreUsuario);
              $('#numero').val(dato.celularUsuario);
              $('#correo').val(dato.correoUsuario);
              $("#foto").attr("src", dato.urlFoto);
              $('#password').val('hola-mundo123');
              varx = dato.password;
              imgx = dato.urlFoto;
            });
            
        })
        
    }
    
    $(document).on('click','#btnFormu', function (e) {
        alertify.confirm("Esta seguro de realizar los cambios", function (e) {
            if (e) {
                if ($('#password').val() != 'hola-mundo123') {
                    varx = $('#password').val();
                }
                const datos = {
                    identi: $('#identificacion').val(),
                    nombre: $('#nombre').val(),
                    numero: $('#numero').val(),
                    user: $('#correo').val(),
                    foto: $('#foto').val(),
                    pass: varx,
                    operacion: 'actualizar'
                };   
                $.post('../../Controlador/perfil.update.php', datos, function (respuesta) {
                    let json = JSON.parse(respuesta);
                    if (json[1] != "Error") {
                        alertify.success(json[0]);
                        location.onload();
                    }
                    else{
                        alertify.error(json[0]);
                    }
                    mostrar();
                 })
            }else {
                alertify.success('Hubo un error al actualizar los datos');
            }
        });
        e.preventDefault();
    });

    document.getElementById('archivoImage').addEventListener('change', function (e) {
        e.preventDefault();
            let inputFileImage = document.getElementById("archivoImage");
            let file = inputFileImage.files[0];
            let data = new FormData();
            data.append('archivo',file);
            $.ajax({
                url:"../../Controlador/cambiarFoto.php",
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false
            })
            .done(function(respuesta){
                let json = JSON.parse(respuesta);
                if (json[1] != "Error") {
                    alertify.success(json[0]);
                }
                else{
                    alertify.error(json[0]);
                }
                mostrar();
            })
            .fail(function(){
                alertify.error('Existe un error');
            })
	});

});