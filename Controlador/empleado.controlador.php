<?php
include_once("../entidad/empleado.entidad.php");
include_once("../modelo/empleado.modelo.php");


$operacion= $_POST['operacion'];
$EmpleadoE = new \entidadEmpleado\Empleado();

if ($operacion == 'Creo') {
    $nombre= $_POST['nombre'];
    $id= $_POST['id'];
    $numero= $_POST['numero'];
    $correo= $_POST['correo'];
    $EmpleadoE->setNombre($nombre);
    $EmpleadoE->setCedula($id);
    $EmpleadoE->setNumero($numero);
    $EmpleadoE->setCorreo($correo);
    $EmpleadoM = new \modeloEmpleado\Empleado($EmpleadoE);
    $mensaje = $EmpleadoM->crearEmpleado();
}
else if ($operacion == 'Consultar'){
    session_start();
    $id = $_SESSION['id'];
    $EmpleadoE->setCedula($id);
    $EmpleadoM = new \modeloEmpleado\Empleado($EmpleadoE);
    $mensaje = $EmpleadoM->mostrarEmpleados();
}
else if ($operacion == 'Eliminar'){
    $idEmpleado= $_POST['id'];
    $EmpleadoE->setCedula($idEmpleado);
    $EmpleadoM = new \modeloEmpleado\Empleado($EmpleadoE);
    $mensaje = $EmpleadoM->eliminarEmpleado();
}
else if ($operacion == 'consultarEditar'){
    $idEmpleado= $_POST['id'];
    $EmpleadoE->setCedula($idEmpleado);
    $EmpleadoM = new \modeloEmpleado\Empleado($EmpleadoE);
    $mensaje = $EmpleadoM->consultarEditar();
}
else if ($operacion == 'Edito'){
    $nombre= $_POST['nombre'];
    $id= $_POST['id'];
    $numero= $_POST['numero'];
    $correo= $_POST['correo'];
    $EmpleadoE->setNombre($nombre);
    $EmpleadoE->setCedula($id);
    $EmpleadoE->setNumero($numero);
    $EmpleadoE->setCorreo($correo);
    $EmpleadoM = new \modeloEmpleado\Empleado($EmpleadoE);
    $mensaje = $EmpleadoM->editarEmpleado();
}

unset($EmpleadoE);
unset($EmpleadoM);

echo json_encode($mensaje);
?>