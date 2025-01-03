<?php
include_once("../entidad/producto.entidad.php");
include_once("../modelo/producto.modelo.php");
$operacion= $_POST['operacion'];
$ProductoE = new \entidadProducto\Producto();

if ($operacion == 'Creo') {
    $nombreProducto= $_POST['nombre'];
    $precioProducto= $_POST['precio'];
    $cantidadProducto = 0;
    $categoriaProducto= $_POST['categoria'];
    $ProductoE->setNombreProducto($nombreProducto);
    $ProductoE->setPrecioProducto($precioProducto);
    $ProductoE->setCantidadProducto($cantidadProducto);
    $ProductoE->setIdCategoria($categoriaProducto);
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->crearProducto();
}
else if ($operacion == 'Consultar'){
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->mostrarProductos();
}
else if ($operacion == 'Eliminar'){
    $idProducto= $_POST['id'];
    $ProductoE->setIdProducto($idProducto);
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->eliminarProducto();
}
else if ($operacion == 'consultarEditar'){
    $idProducto= $_POST['idProducto'];
    $idCategoria= $_POST['idCategoria'];
    $ProductoE->setIdProducto($idProducto);
    $ProductoE->setIdCategoria($idCategoria);
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->consultarEditar();
}
else if ($operacion == 'Edito'){
    $idProducto= $_POST['id'];
    $nombreProducto= $_POST['nombre'];
    $precioProducto= $_POST['precio'];
    $categoriaProducto= $_POST['categoria'];
    $ProductoE->setIdProducto($idProducto);
    $ProductoE->setNombreProducto($nombreProducto);
    $ProductoE->setPrecioProducto($precioProducto);
    $ProductoE->setIdCategoria($categoriaProducto);
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->editarProducto();
}else if ($operacion == 'reporte'){
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->reporte();
}else if ($operacion == 'Vendio'){
    $cantidad= $_POST['cantidad'];
    $producto= $_POST['producto'];
    $ProductoE->setCantidadProducto($cantidad);
    $ProductoE->setIdProducto($producto);
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->venderProducto();
}

unset($ProductoE);
unset($ProductoM);

echo json_encode($mensaje);
?>