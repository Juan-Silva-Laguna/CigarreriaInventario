<?php
require_once('../Modelo/usuario.modelo.php');
require_once('../Entidad/usuario.entidad.php');
$user= $_POST['user'];

$userE = new \entidadUser\User();
$userE->setEmail($user);
$userM = new \modeloUser\User($userE);
$mensaje = $userM->recuperar();

unset($userE);
unset($userM);
echo json_encode($mensaje);
?>