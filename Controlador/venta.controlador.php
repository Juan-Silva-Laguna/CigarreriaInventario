<?php
include_once("../entidad/venta.entidad.php");
include_once("../modelo/venta.modelo.php");
$operacion= $_POST['operacion'];
$VentaE = new \entidadVenta\Venta();


switch ($operacion) {
    case 'Vendio':
        session_start();
        $cantidad= $_POST['cantidad'];
        $producto= $_POST['producto'];
        $responsable= $_SESSION['id'];
        $hoy = getdate();
        $fecha = $hoy['year'].'/'.$hoy['mon'].'/'.$hoy['mday'];
        $VentaE->setCantidadVenta($cantidad);
        $VentaE->setProducto($producto);
        $VentaE->setFecha($fecha);
        $VentaE->setResponsable($responsable);
        $VentaM = new \modeloVenta\Venta($VentaE);
        $mensaje = $VentaM->venderProducto();
        break;
    case 'consultaHoy':
        $VentaM = new \modeloVenta\Venta($VentaE);
        $mensaje = $VentaM->deHoy();
        break;
    case 'consultaSemana':
        $VentaM = new \modeloVenta\Venta($VentaE);
        $mensaje = $VentaM->haceUnaSemana();
        break;
    case 'consultaMes':
        $VentaM = new \modeloVenta\Venta($VentaE);
        $mensaje = $VentaM->haceUnMes();
        break;
    case 'todo':
        $VentaM = new \modeloVenta\Venta($VentaE);
        $mensaje = $VentaM->todo();
        break;
    case 'mostrarVentas':
        $VentaM = new \modeloVenta\Venta($VentaE);
        $mensaje = $VentaM->mostrarVentas();
        break;
    case 'filtro':
        if($_POST['empleado'] != '' && $_POST['fecha'] != ''){
            $fecha= $_POST['fecha'];
            $empleado= $_POST['empleado'];
            $VentaE->setResponsable($empleado);
            $VentaE->setFecha($fecha);
            $VentaM = new \modeloVenta\Venta($VentaE);
            $mensaje = $VentaM->filtroAmbas();
        }else if($_POST['empleado'] != '' && $_POST['fecha'] == ''){
            $empleado= $_POST['empleado'];
            $VentaE->setResponsable($empleado);
            $VentaM = new \modeloVenta\Venta($VentaE);
            $mensaje = $VentaM->filtroEmpleado();
        }else if($_POST['empleado'] == '' && $_POST['fecha'] != ''){
            $fecha= $_POST['fecha'];
            $VentaE->setFecha($fecha);
            $VentaM = new \modeloVenta\Venta($VentaE);
            $mensaje = $VentaM->filtroFecha();
        }
        break;
}

unset($VentaE);
unset($VentaM);

echo json_encode($mensaje);
?>