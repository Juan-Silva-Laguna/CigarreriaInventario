<?php
namespace modeloPedido;
use PDO;

include_once("../entidad/pedido.entidad.php");
include_once("../entorno/conexion.php");
class Pedido{
   private $idPedido;
   private $cantidad;
   private $total;
   private $fecha;
   private $estado;
   private $idProducto;
   private $idProveedor;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadPedido\Pedido $PedidoE)
    {
        $this->conexion = new \Conexion();
        $this->idPedido=$PedidoE->getIdPedido();  
        $this->cantidad=$PedidoE->getCantidad();  
        $this->total=$PedidoE->getTotal();  
        $this->fecha=$PedidoE->getFecha();  
        $this->estado=$PedidoE->getEstado(); 
        $this->idProducto=$PedidoE->getIdProducto();  
        $this->idProveedor=$PedidoE->getIdProveedor();   
    }

    public function reporte()
    {
       $this->consulta="SELECT pedidos.cantidadPedido, pedidos.totalPedido, pedidos.fechaPedido, productos.nombreProducto FROM pedidos
       INNER JOIN productos ON pedidos.idProducto = productos.idProducto  WHERE pedidos.estadoPedido=0";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function crearPedido()
    {
       $this->consulta="INSERT INTO pedidos VALUES(null, '$this->cantidad', '$this->total', '$this->fecha', '$this->estado', '$this->idProducto', '$this->idProveedor')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       $this->retorno=[];
       if($this->resultado->rowCount()>=1){
         $this->consulta="SELECT proveedores.correoProveedor, proveedores.nombreProveedor,  productos.nombreProducto, pedidos.cantidadPedido, pedidos.totalPedido FROM pedidos
         INNER JOIN proveedores ON pedidos.idProveedor=$this->idProveedor AND proveedores.idProveedor=$this->idProveedor
         INNER JOIN productos ON pedidos.idProducto=$this->idProducto AND productos.idProducto=$this->idProducto WHERE pedidos.estadoPedido!=0";            
         $this->resultado=$this->conexion->con->prepare($this->consulta);
         $this->resultado->execute();
         return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
      }
   }

   public function existe()
    {
       $this->consulta="SELECT idPedido FROM pedidos WHERE idProducto=$this->idProducto AND estadoPedido=1";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mostrarPedidos()
    {
       $this->consulta="SELECT pedidos.idPedido, pedidos.cantidadPedido, pedidos.fechaPedido, proveedores.idProveedor, proveedores.nombreProveedor, productos.idProducto, productos.nombreProducto FROM pedidos
       INNER JOIN proveedores ON pedidos.idProveedor = proveedores.idProveedor 
       INNER JOIN productos ON pedidos.idProducto = productos.idProducto  WHERE pedidos.estadoPedido!=0";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function consultarEditar()
    {
       $this->consulta="SELECT pedidos.cantidadPedido, pedidos.totalPedido, proveedores.nombreProveedor, productos.nombreProducto FROM pedidos
       INNER JOIN proveedores ON pedidos.idProveedor=$this->idProveedor AND proveedores.idProveedor=$this->idProveedor
       INNER JOIN productos ON pedidos.idProducto=$this->idProducto AND productos.idProducto=$this->idProducto WHERE pedidos.idPedido=$this->idPedido";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarPedido()
    {
         $this->consulta="UPDATE pedidos INNER JOIN productos ON pedidos.idProducto = productos.idProducto
         SET productos.cantidadProducto = $this->cantidad+(SELECT cantidadProducto FROM productos WHERE idProducto=$this->idProducto), pedidos.estadoPedido = $this->estado WHERE pedidos.idPedido = $this->idPedido";
         $this->resultado=$this->conexion->con->prepare($this->consulta);
         $this->resultado->execute();
         if($this->resultado->rowCount()>=1){
              $this->retorno=1;
         }
         else{
           $this->retorno=0;
         }
         return $this->retorno;       
    }

    
}

?>