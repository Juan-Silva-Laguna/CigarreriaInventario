$(document).ready(function(){   
    // Iniciar sesión
    $("#btn_iniciar").click (function (ev){

        // recibir datos del formulario
        var oData = new FormData(document.forms.namedItem("form_login"));

        var oReq = new XMLHttpRequest();
        oReq.open("POST", "./../../modelo/login.php", true);
        oReq.onload = function(oEvent) {
            
            var datos = JSON.parse(oReq.response);

            if(oReq.status == 200) {
                if(datos.ok != true){
                    alert(datos.mensaje);
                    document.forms.namedItem("form_login").reset();
                }
                else{
                    if(datos.rol == 1){
                        location.href = '../Bienvenido.php';
                    }
                    else if(datos.rol == 2){
                        location.href = 'vendedor/vendedor.php';
                    }
                }
            } else {
                alert("Error " + oReq.status );
            }
        };

        oReq.send(oData);
        ev.preventDefault();
    }); // fin función iniciar sesión
   
});