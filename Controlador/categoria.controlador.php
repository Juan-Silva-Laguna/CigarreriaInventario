<?php
include_once("../entidad/categoria.entidad.php");
include_once("../modelo/categoria.modelo.php");


$operacion= $_POST['operacion'];
$CategoriaE = new \entidadCategoria\Categoria();

if ($operacion == 'Creo') {
    $nombreCategoria= $_POST['nombre'];
    $CategoriaE->setNombreCategoria($nombreCategoria);
    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->crearCategoria();
}
else if ($operacion == 'Consultar'){
    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->mostrarCategorias();
}
else if ($operacion == 'Eliminar'){
    $idCategoria= $_POST['id'];
    $CategoriaE->setIdCategoria($idCategoria);
    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->eliminarCategoria();
}
else if ($operacion == 'consultarEditar'){
    $idCategoria= $_POST['id'];
    $CategoriaE->setIdCategoria($idCategoria);
    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->consultarEditar();
}
else if ($operacion == 'Edito'){
    $idCategoria= $_POST['id'];
    $nombreCategoria= $_POST['nombre'];
    $CategoriaE->setNombreCategoria($nombreCategoria);
    $CategoriaE->setIdCategoria($idCategoria);
    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->editarCategoria();
}

unset($CategoriaE);
unset($CategoriaM);

echo json_encode($mensaje);
?>