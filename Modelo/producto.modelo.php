<?php
namespace modeloProducto;
use PDO;

include_once("../entidad/producto.entidad.php");
include_once("../entorno/conexion.php");
class Producto{
    private $idProducto;
    private $nombreProducto;
    private $cantidadProducto;
    private $precioProducto;
    private $idCategoria;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadProducto\Producto $ProductoE)
    {
        $this->conexion = new \Conexion();
        $this->idProducto=$ProductoE->getIdProducto();  
        $this->nombreProducto=$ProductoE->getNombreProducto();  
        $this->cantidadProducto=$ProductoE->getCantidadProducto();  
        $this->precioProducto=$ProductoE->getPrecioProducto();  
        $this->idCategoria=$ProductoE->getIdCategoria();  
    }

    public function reporte()
    {
       $this->consulta="SELECT cantidadProducto, precioProducto, productos.nombreProducto FROM productos WHERE cantidadProducto!=0";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function crearProducto()
    {
       $this->consulta="INSERT INTO productos VALUES(null, '$this->nombreProducto', '$this->cantidadProducto', '$this->precioProducto', '$this->idCategoria')";
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

    public function mostrarProductos()
    {
       $this->consulta="SELECT * FROM productos INNER JOIN categorias ON productos.idCategoria=categorias.idCategoria";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarProducto()
    {
       $this->consulta="DELETE FROM productos WHERE idProducto='$this->idProducto'";
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

    public function consultarEditar()
    {
       $this->consulta="SELECT * FROM productos INNER JOIN categorias ON productos.idProducto='$this->idProducto' AND productos.idCategoria='$this->idCategoria' AND categorias.idCategoria='$this->idCategoria'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarProducto()
    {
         $this->consulta="UPDATE productos SET nombreProducto='$this->nombreProducto', precioProducto=$this->precioProducto, idCategoria=$this->idCategoria WHERE idProducto=$this->idProducto";
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