<?php
namespace modeloVenta;
use PDO;

include_once("../entidad/venta.entidad.php");
include_once("../entorno/conexion.php");
class Venta{
    private $idVenta;
    private $cantidadVenta;
    private $fecha;
    private $producto;
    private $responsable;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadVenta\Venta $VentaE)
    {
        $this->conexion = new \Conexion();
        $this->idVenta=$VentaE->getIdVenta(); 
        $this->cantidadVenta=$VentaE->getCantidadVenta();
        $this->fecha=$VentaE->getFecha();    
        $this->producto=$VentaE->getProducto();  
        $this->responsable=$VentaE->getResponsable();  
    }
    
    public function venderProducto()
    {
       $this->consulta="INSERT INTO ventas (idVenta, cantidadVenta, fechaVenta, numCedula, idProducto) SELECT null, $this->cantidadVenta, '$this->fecha', $this->responsable, $this->producto FROM dual WHERE (SELECT cantidadProducto FROM productos WHERE idProducto=$this->producto AND cantidadProducto >= $this->cantidadVenta)";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
        $quitar = intval($this->cantidadVenta); 
        $this->consulta="UPDATE productos SET cantidadProducto = (SELECT cantidadProducto FROM productos WHERE idProducto=$this->producto)-$quitar WHERE idProducto=$this->producto  AND cantidadProducto >= $quitar";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        $this->retorno=1;
       }
       else{
        $this->retorno=0;
       }
       return $this->retorno;
    }

    public function todo()
    {
       $this->consulta="SELECT ventas.fechaVenta, ventas.cantidadVenta, productos.nombreProducto, productos.precioProducto FROM ventas INNER JOIN productos WHERE ventas.idProducto=productos.idProducto";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deHoy()
    {
       $this->consulta="SELECT ventas.fechaVenta, ventas.cantidadVenta, productos.nombreProducto, productos.precioProducto FROM ventas INNER JOIN productos WHERE ventas.idProducto=productos.idProducto AND  ventas.fechaVenta=(SELECT CURDATE())";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function haceUnaSemana()
    {
       $this->consulta="SELECT ventas.fechaVenta, ventas.cantidadVenta, productos.nombreProducto, productos.precioProducto FROM ventas INNER JOIN productos WHERE ventas.idProducto=productos.idProducto AND ( ventas.fechaVenta BETWEEN (SELECT CURDATE())-6 AND (SELECT CURDATE()))";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function haceUnMes()
    {
       $this->consulta="SELECT ventas.fechaVenta, ventas.cantidadVenta, productos.nombreProducto, productos.precioProducto FROM ventas INNER JOIN productos WHERE ventas.idProducto=productos.idProducto AND ( ventas.fechaVenta BETWEEN (SELECT CURDATE())-30 AND (SELECT CURDATE()))";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }    

    public function mostrarVentas()
    {
       $this->consulta="SELECT ventas.cantidadVenta, ventas.fechaVenta, productos.nombreProducto, productos.precioProducto, usuarios.nombreUsuario FROM ventas
       INNER JOIN usuarios ON ventas.numCedula = usuarios.numCedula
       INNER JOIN productos ON ventas.idProducto = productos.idProducto";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroEmpleado()
    {
       $this->consulta="SELECT ventas.cantidadVenta, ventas.fechaVenta, productos.nombreProducto, productos.precioProducto, usuarios.nombreUsuario FROM ventas
       INNER JOIN usuarios ON ventas.numCedula = usuarios.numCedula
       INNER JOIN productos ON ventas.idProducto = productos.idProducto WHERE usuarios.nombreUsuario LIKE '%$this->responsable%'";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroFecha()
    {
       $this->consulta="SELECT ventas.cantidadVenta, ventas.fechaVenta, productos.nombreProducto, productos.precioProducto, usuarios.nombreUsuario FROM ventas
       INNER JOIN usuarios ON ventas.numCedula = usuarios.numCedula
       INNER JOIN productos ON ventas.idProducto = productos.idProducto WHERE ventas.fechaVenta = '$this->fecha'";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtroAmbas()
    {
       $this->consulta="SELECT ventas.cantidadVenta, ventas.fechaVenta, productos.nombreProducto, productos.precioProducto, usuarios.nombreUsuario FROM ventas
       INNER JOIN usuarios ON ventas.numCedula = usuarios.numCedula
       INNER JOIN productos ON ventas.idProducto = productos.idProducto WHERE usuarios.nombreUsuario LIKE '%$this->responsable%' AND ventas.fechaVenta = '$this->fecha'";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>