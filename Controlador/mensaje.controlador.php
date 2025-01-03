<?php
include_once("../entidad/mensaje.entidad.php");
include_once("../modelo/mensaje.modelo.php");
$operacion= $_POST['operacion'];
$MensajeE = new \entidadMensaje\Mensaje();

if ($operacion == 'Envio') {
    session_start();
    $receptor= $_POST['receptor'];
    $emisor= $_SESSION['id'];
    $mensaje= $_POST['mensaje'];
    $MensajeE->setReceptor($receptor);
    $MensajeE->setEmisor($emisor);
    $MensajeE->setMensaje($mensaje);
    $MensajeE->setEstadoMensaje(0);
    $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
    $MensajeM->enviarMensaje();
}
else if ($operacion == 'Consultar'){
    $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
    $mensaje = $MensajeM->mostrarMensajes();
}
else if ($operacion == 'mostrarChat'){
    session_start();
    $receptor= $_POST['id'];
    $emisor= $_SESSION['id'];
    $MensajeE->setEmisor($emisor);
    $MensajeE->setReceptor($receptor);
    $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
    $mensaje = $MensajeM->mostrarChat();
}
else if ($operacion == ''){
    $idMensaje= $_POST['id'];
    $MensajeE->setIdMensaje($idMensaje);
    $MensajeE->setIdProducto($idProducto);
    $MensajeE->setCantidad($cantidad);
    $MensajeE->setEstado(0);
    $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
    $mensaje = $MensajeM->editarMensaje();
}else if ($operacion == 'reporte'){
    $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
    $mensaje = $MensajeM->reporte();
}else if ($operacion == 'cantidadMensajes'){
    session_start();
    $receptor= $_SESSION['id'];
    $MensajeE->setReceptor($receptor);
    $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
    $mensaje = $MensajeM->cantidadMensajes();
}else if ($operacion == 'actualizarEstado'){
    session_start();
    $receptor= $_POST['id'];
    $emisor= $_SESSION['id'];
    $MensajeE->setReceptor($receptor);
    $MensajeE->setEmisor($emisor);
    $MensajeM = new \modeloMensaje\Mensaje($MensajeE);
    $MensajeM->actualizaEstado();
}

unset($MensajeE);
unset($MensajeM);

echo json_encode($mensaje);
?>