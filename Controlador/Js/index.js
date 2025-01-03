$(document).ready(function(){

      const user = document.getElementById("usuarioG").value; 
      $.post('../../Controlador/usuario.perfil.php', {user}, function (respuesta) {
          let datos = JSON.parse(respuesta);
          datos.forEach(dato => {
            $('#fotoG').attr('src',dato.urlFoto);
            $('#colorusername').html(dato.correoUsuario);
          });
      })

    $(document).on('click', '#btn_salir', function (e) {  
      e.preventDefault();
      $.ajax({
        url: '../../Controlador/usuario.salir.php',
        type: 'GET',
        success: function (respuesta) {
        let json = JSON.parse(respuesta);
          alertify.warning(json);
          setTimeout(() => {
              $(location).attr('href','../iniciarSesion.php');
          }, 2000);
        }
      }) 
    });
});
