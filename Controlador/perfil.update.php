<?php
require_once('../Modelo/usuario.modelo.php');
require_once('../Entidad/usuario.entidad.php');

$user= $_POST['user'];
$password= $_POST['pass'];
$nombre= $_POST['nombre'];
$celular= $_POST['numero'];
$identi= $_POST['identi'];
$foto= $_POST['foto'];

    $userE = new \entidadUser\User();
    $userE->setEmail($user);
    $userE->setPassword($password);
    $userE->setNombre($nombre);
    $userE->setCelular($celular);
    $userE->setIdenti($identi);
    $userE->setFoto($foto);
    $userM = new \modeloUser\User($userE);
    $mensaje = $userM->actualizarDatos();

unset($userE);
unset($userM);
echo json_encode($mensaje);
?>