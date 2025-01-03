<?php
namespace modeloProveedor;
use PDO;

include_once("../entidad/proveedor.entidad.php");
include_once("../entorno/conexion.php");
class Proveedor{
    private $idProveedor;
    private $nombreProveedor;
    private $celulardProveedor;
    private $correoProveedor;
    private $idCategoria;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadProveedor\Proveedor $ProveedorE)
    {
        $this->conexion = new \Conexion();
        $this->idProveedor=$ProveedorE->getIdProveedor();  
        $this->nombreProveedor=$ProveedorE->getNombreProveedor();  
        $this->celularProveedor=$ProveedorE->getCelularProveedor();  
        $this->correoProveedor=$ProveedorE->getCorreoProveedor();  
        $this->idCategoria=$ProveedorE->getIdCategoria();  
    }

    public function crearProveedor()
    {
       $this->consulta="INSERT INTO proveedores VALUES(null, '$this->nombreProveedor', '$this->celularProveedor', '$this->correoProveedor', '$this->idCategoria')";
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

    public function mostrarProveedor()
    {
       $this->consulta="SELECT * FROM proveedores INNER JOIN categorias ON proveedores.idCategoria=categorias.idCategoria";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarProveedor()
    {
       $this->consulta="DELETE FROM proveedores WHERE idProveedor='$this->idProveedor'";
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
       $this->consulta="SELECT * FROM proveedores INNER JOIN categorias ON proveedores.idProveedor='$this->idProveedor' AND proveedores.idCategoria='$this->idCategoria' AND categorias.idCategoria='$this->idCategoria'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarProveedor()
    {
         $this->consulta="UPDATE proveedores SET nombreProveedor='$this->nombreProveedor', celularProveedor=$this->celularProveedor, correoProveedor='$this->correoProveedor', idCategoria=$this->idCategoria WHERE idProveedor=$this->idProveedor";
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