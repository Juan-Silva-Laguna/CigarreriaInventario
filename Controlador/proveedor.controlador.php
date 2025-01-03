<?php
include_once("../entidad/proveedor.entidad.php");
include_once("../modelo/proveedor.modelo.php");
$operacion= $_POST['operacion'];
$ProveedorE = new \entidadProveedor\Proveedor();

if ($operacion == 'Creo') {
    $nombreProveedor= $_POST['nombre'];
    $celularProveedor= $_POST['numero'];
    $correoProveedor = $_POST['correo'];
    $categoriaProveedor= $_POST['categoria'];
    $ProveedorE->setNombreProveedor($nombreProveedor);
    $ProveedorE->setCelularProveedor($celularProveedor);
    $ProveedorE->setCorreoProveedor($correoProveedor);
    $ProveedorE->setIdCategoria($categoriaProveedor);
    $ProveedorM = new \modeloProveedor\Proveedor($ProveedorE);
    $mensaje = $ProveedorM->crearProveedor();
}
else if ($operacion == 'Consultar'){
    $ProveedorM = new \modeloProveedor\Proveedor($ProveedorE);
    $mensaje = $ProveedorM->mostrarProveedor();
}
else if ($operacion == 'Eliminar'){
    $idProveedor= $_POST['id'];
    $ProveedorE->setIdProveedor($idProveedor);
    $ProveedorM = new \modeloProveedor\Proveedor($ProveedorE);
    $mensaje = $ProveedorM->eliminarProveedor();
}
else if ($operacion == 'consultarEditar'){
    $idProveedor= $_POST['idProveedor'];
    $idCategoria= $_POST['idCategoria'];
    $ProveedorE->setIdProveedor($idProveedor);
    $ProveedorE->setIdCategoria($idCategoria);
    $ProveedorM = new \modeloProveedor\Proveedor($ProveedorE);
    $mensaje = $ProveedorM->consultarEditar();
}
else if ($operacion == 'Edito'){
    $idProveedor= $_POST['id'];
    $nombreProveedor= $_POST['nombre'];
    $celularProveedor= $_POST['numero'];
    $correoProveedor= $_POST['correo'];
    $categoriaProveedor= $_POST['categoria'];
    $ProveedorE->setIdProveedor($idProveedor);
    $ProveedorE->setNombreProveedor($nombreProveedor);
    $ProveedorE->setCelularProveedor($celularProveedor);
    $ProveedorE->setCorreoProveedor($correoProveedor);
    $ProveedorE->setIdCategoria($categoriaProveedor);
    $ProveedorM = new \modeloProveedor\Proveedor($ProveedorE);
    $mensaje = $ProveedorM->editarProveedor();
}

unset($ProveedorE);
unset($ProveedorM);

echo json_encode($mensaje);
?>