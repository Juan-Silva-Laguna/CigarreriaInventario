<?php
require_once('../Modelo/vaciarReporte.modelo.php');
$ventaM = new \modeloVaciaR\VaciaR();
$mensaje = $ventaM->vaciarReporte();

unset($ventaM);
echo json_encode($mensaje);
?>