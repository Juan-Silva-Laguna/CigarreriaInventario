$(document).ready(function(){
    let receptor=0;
    mostrarUsuarios();
    function mostrarUsuarios(ide) {
        const operacion = 'Consultar'; 
        $.post('../../Controlador/empleado.controlador.php', {operacion}, function (respuesta) { 
        let templateUser="";             
            $.each(JSON.parse(respuesta), function(index, val) {
                let contador=0;
                let arreglo = val.nombreUsuario.split(' ');                    
                let cont = cantidad();
                cont.forEach(c => {
                    if (val.numCedula == c.emisor) {contador++;}
                });
                
                let foto='';
                if (val.urlFoto !='../../IMG/sinFoto.jpg') {foto=val.urlFoto}else{foto=val.urlFoto}
                templateUser += "<div class='mostrar form-group text-left' id='"+val.numCedula+"' style='cursor: pointer;'><img src='"+foto+"' width='60px' height='40px'> "+arreglo[0]+"<b class='cantMensaje'>"+contador+"</b></div>";     
                document.querySelector('#divPadre').innerHTML =templateUser; 
                $('#'+ide).css('color','#ffc107');
            });
        })
    }

    function cantidad() {
        let operacion = 'cantidadMensajes';
        consulta = $.ajax({
                url: "../../Controlador/mensaje.controlador.php",
                global: false,
                type: "POST",
                data: {operacion},
                dataType: "JSON",
                async:false
            } 
        ).responseText;
        
        return JSON.parse(consulta);
    }
        
    $(document).on('click','.mostrar', function () {            
            let elemento = $(this)[0];
            let id = $(elemento).attr('id');
            receptor = id;
            actualizaEsatdo(id);
            setInterval(() => {                
                mostrarUsuarios(receptor);  
                mostrarChat(receptor);
            }, 1000);
            
            $('#contenedor').css('display','block');
            $('#chat').css('display','block');
        });

        function actualizaEsatdo(iden) {
            let datos = {
                id: iden,
                operacion: 'actualizarEstado'
            }
            $.post('../../controlador/mensaje.controlador.php', datos,)         
                     
            $('#contenedor').css('display','block');
            $('#chat').css('display','block');
        }

        function mostrarChat(identidad) {
            actualizaEsatdo(identidad);
            let datos = {
                id: identidad,
                operacion: 'mostrarChat'
            }
            $.post('../../controlador/mensaje.controlador.php', datos, function (respuesta) {
            let datos = JSON.parse(respuesta);
            let template="<br>";
            datos.forEach(dato => { 
                if (identidad != dato.receptor) {
                    template += "<div class='alert envia'>"+dato.mensaje+"</div>";
                }else{
                    template += "<div class='alert recibe'>"+dato.mensaje+"</div>";
                }
            });
            $('#contenedor').html(template);
            
            if (($('#contenedor').scrollTop()+200) > (document.getElementById('contenedor').scrollHeight - document.getElementById('contenedor').clientHeight)) {
                $('#contenedor').animate({ scrollTop: (document.getElementById('contenedor').scrollHeight - document.getElementById('contenedor').clientHeight)+'px' },0);
                
            }else{
                $('#contenedor').animate({ scrollTop: $('#contenedor').scrollTop()+'px' },50);
            }
            
        })
    }


    $('#frmMensaje').submit(function (e) {        
        e.preventDefault(); 
        if ($('#mensaje').val('') != '') {
            datos = {
                receptor: receptor,
                mensaje: $('#mensaje').val(),
                operacion: 'Envio'
            };
            $.post('../../controlador/mensaje.controlador.php', datos, function (respuesta) {
                $('#mensaje').val('');
            })
            setTimeout(() => {
                $("#contenedor").scrollTop($("#contenedor")[0].scrollHeight);   
            }, 2000);
        }else{
            alertify.error("Por favor escriba un mensaje");
        }
            
     });
    
});