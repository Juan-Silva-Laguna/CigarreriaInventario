<?php
namespace modeloCategoria;
use PDO;

include_once("../entidad/categoria.entidad.php");
include_once("../entorno/conexion.php");
class Categoria{
    private $idCategoria;
    private $nombreCategoria;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadCategoria\Categoria $CategoriaE)
    {
        $this->conexion = new \Conexion();
        $this->idCategoria=$CategoriaE->getIdCategoria();  
        $this->nombreCategoria=$CategoriaE->getNombreCategoria();  
    }

    public function crearCategoria()
    {
       $this->consulta="INSERT INTO categorias VALUES(null, '$this->nombreCategoria')";
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

    public function mostrarCategorias()
    {
       $this->consulta="SELECT * FROM categorias";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarCategoria()
    {
       $this->consulta="DELETE FROM categorias WHERE idCategoria='$this->idCategoria'";
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
       $this->consulta="SELECT * FROM categorias WHERE idCategoria='$this->idCategoria'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarCategoria()
    {
         $this->consulta="UPDATE categorias SET nombreCategoria='$this->nombreCategoria' WHERE idCategoria='$this->idCategoria'";
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