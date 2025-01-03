<?php
require_once('../Modelo/usuario.modelo.php');
require_once('../Entidad/usuario.entidad.php');
$user= $_POST['user'];
$password= $_POST['password'];
$rol= $_POST['rol'];

$userE = new \entidadUser\User();
$userE->setEmail($user);
$userE->setPassword($password);
$userE->setTypeUser($rol);
$userM = new \modeloUser\User($userE);
$mensaje = $userM->validate();

unset($userE);
unset($userM);
echo json_encode($mensaje);
?>