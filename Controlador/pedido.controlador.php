<?php
include_once("../entidad/pedido.entidad.php");
include_once("../modelo/pedido.modelo.php");
$operacion= $_POST['operacion'];
$PedidoE = new \entidadPedido\Pedido();

if ($operacion == 'Creo') {
    $producto= $_POST['producto'];
    $proveedor= $_POST['proveedor'];
    $cantidad= $_POST['cantidad'];
    $total= $_POST['total'];
    $hoy = getdate();
    $fecha = $hoy['year'].'/'.$hoy['mon'].'/'.$hoy['mday'];
    $PedidoE->setIdProducto($producto);
    $PedidoE->setIdProveedor($proveedor);
    $PedidoE->setCantidad($cantidad);
    $PedidoE->setEstado(1);
    $PedidoE->setTotal($total);
    $PedidoE->setFecha($fecha);
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $arreglo = $PedidoM->existe();
    $condicion='';
    foreach ($arreglo as $val) {
        $condicion = $val['idPedido'];
    }
     if ($condicion == '') {
        $mensaje = $PedidoM->crearPedido();
     }else{
        $mensaje = 'X';
     }
}
else if ($operacion == 'Consultar'){
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->mostrarPedidos();
}
else if ($operacion == 'consultarEditar'){
    $pedido= $_POST['idPedido'];
    $producto= $_POST['idProducto'];
    $proveedor= $_POST['idProveedor'];
    $PedidoE->setIdProducto($producto);
    $PedidoE->setIdProveedor($proveedor);
    $PedidoE->setIdPedido($pedido);
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->consultarEditar();
}
else if ($operacion == 'Edito'){
    $idPedido= $_POST['idPedido'];
    $idProducto= $_POST['idProducto'];
    $cantidad= $_POST['cantidad'];
    $PedidoE->setIdPedido($idPedido);
    $PedidoE->setIdProducto($idProducto);
    $PedidoE->setCantidad($cantidad);
    $PedidoE->setEstado(0);
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->editarPedido();
}else if ($operacion == 'reporte'){
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->reporte();
}

unset($PedidoE);
unset($PedidoM);

echo json_encode($mensaje);
?>