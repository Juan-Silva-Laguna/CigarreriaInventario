<?php
    require_once('../Modelo/usuario.modelo.php');
    require_once('../Entidad/usuario.entidad.php');
    session_start();
    $imgx = $_SESSION['urlImg'];
    $id = $_SESSION['id'];


    $quitarFoto = '../Vista'.$imgx;
    if ($imgx != '../../IMG/sinFoto.jpg') {
        @opendir($quitarFoto);
        unlink($quitarFoto);
    }
      
    
    if(@$_FILES['archivo']['error']>0){
        $mensaje = ['Error de imagen','Error'];
    }
    else {
        $ruta = '../Vista/fotoPerfil/';
        @opendir($ruta);
        $archivo = $ruta.@$_FILES['archivo']['name'];            
        $resultado = @copy(@$_FILES['archivo']['tmp_name'], $archivo);
            if($resultado){
                $remplazo = strpos($archivo, "Vista");
                $urlFoto = substr($archivo, ($remplazo+5));
                $_SESSION['urlImg'] = $urlFoto;
                $userE = new \entidadUser\User();
                $userE->setFoto('..'.$urlFoto);
                $userE->setIdenti($id);
                $userM = new \modeloUser\User($userE);
                $mensaje =$userM->actualizarFoto();
                unset($userE);
                unset($userM);
            }
            else {
                $mensaje = ['Esta imagen no se puede guardar','Error'];
            }
    }

    echo json_encode($mensaje);

?>