<?php
namespace modeloEmpleado;
use PDO;

include_once("../entidad/empleado.entidad.php");
include_once("../entorno/conexion.php");
class Empleado{
    private $idEmpleado;
    private $nombreEmpleado;
    private $cantidadEmpleado;
    private $precioEmpleado;
    private $idCategoria;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadEmpleado\Empleado $EmpleadoE)
    {
        $this->conexion = new \Conexion();
        $this->cedula=$EmpleadoE->getCedula();  
        $this->nombre=$EmpleadoE->getNombre();  
        $this->numero=$EmpleadoE->getNumero();  
        $this->correo=$EmpleadoE->getCorreo();  
    }

    public function crearEmpleado()
    {
      $todo = '0123456789!#%$/()={}[]*+-<>&abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

      $longitud = strlen($todo);
      $password = '';
      for($i = 0; $i < 6; $i++) {
            $password .= $todo[mt_rand(0, $longitud - 1)];
      }
       $hash = password_hash($password, PASSWORD_ARGON2I);
       $this->consulta="INSERT INTO usuarios VALUES('$this->cedula', '$this->nombre', '$this->numero', '$this->correo', '$hash', '../../IMG/sinFoto.jpg', 'Empleado')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       $this->retorno=[];
       if($this->resultado->rowCount()>=1){
         array_push($this->retorno, 1, $this->correo, 'Datos de acceso al Sistema Cigarreria Perez', 'Señor(a) '.$this->nombre.' el presente mensaje es para 
         informarle que su datos de acceso a el sistema Cigarreria Perez son los siguientes:', ' Email: '.$this->correo, 'Contraseña: '.$password,'Rol: Empleado.',
         'Podra ingresar con esos datos en el siguiente enlace: http://localhost/Cigarreria/Vista/IniciarSesion.php');
       }
       else{
         array_push($this->retorno, 0);
       }
       return $this->retorno;
    }

    public function mostrarEmpleados()
    {
       $this->consulta="SELECT * FROM usuarios WHERE numCedula!=$this->cedula";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarEmpleado()
    {
       $this->consulta="DELETE FROM usuarios WHERE numCedula='$this->cedula'";
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
       $this->consulta="SELECT * FROM usuarios WHERE numCedula=$this->cedula";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>