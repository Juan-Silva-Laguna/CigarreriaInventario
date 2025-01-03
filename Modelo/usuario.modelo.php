<?php
namespace modeloUser;
use PDO;

include_once("../Entidad/usuario.entidad.php");
include_once("../Entorno/conexion.php");
class User{
    private $email;
    private $password;
    private $typeUser;
    private $nombre;
    private $celular;
    private $foto;
    private $identi;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadUser\User $userE)
    {
        $this->conexion = new \Conexion();
        $this->email=$userE->getEmail();  
        $this->password=$userE->getPassword();  
        $this->typeUser=$userE->getTypeUser();   
        $this->nombre=$userE->getNombre();  
        $this->celular=$userE->getCelular();  
        $this->foto=$userE->getFoto();   
        $this->identi=$userE->getIdenti();    
    }

    public function validate()
    {
       $this->consulta="SELECT * FROM usuarios WHERE correoUsuario='$this->email' AND rolUsuario='$this->typeUser'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            
           foreach ($this->resultado->fetchAll(PDO::FETCH_ASSOC) as $dato) {
            if (password_verify($this->password, $dato['password']))  {
                session_start();
                $_SESSION['id'] = $dato['numCedula'];
                $_SESSION['nombre'] = $dato['nombreUsuario'];
                $_SESSION['usuario'] = $dato['correoUsuario'];
                $_SESSION['urlImg'] = $dato['urlFoto'];
                $_SESSION['rol'] = $dato['rolUsuario'];
                $this->retorno=['Bienvenido(a) '.$_SESSION['nombre'].' ','alert alert-success', $_SESSION['rol']];
            }
            else{
                $this->retorno=['Clave Incorrecta por favor intente nuevamente','alert alert-danger'];
            }
           }
            
       }
       else{
        $this->retorno=['Hay un error de autenticación por favor vuelva a intentarlo','alert alert-danger'];
       }
       return $this->retorno;
    }

    public function salir()
    {
       session_start();      
       $this->retorno='Hasta Pronto '.$_SESSION['nombre'];
       session_destroy();
       return $this->retorno;
    }

    public function mostrarPerfil()
    {
       $this->consulta="SELECT * FROM usuarios WHERE correoUsuario='$this->email'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarDatos()
    {
        if (strpos($this->password, 'argon2i') === false) {
            $hash = password_hash($this->password, PASSWORD_ARGON2I);
        }else{
            $hash = $this->password;
        }
        
        $this->consulta="UPDATE usuarios SET nombreUsuario='$this->nombre', celularUsuario=$this->celular, correoUsuario='$this->email' , password='$hash' WHERE numCedula='$this->identi'";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        if($this->resultado->rowCount()>=1){
                $this->retorno=['Datos Actualizados Correctamente ','Bien'];
        }
        else{
                $this->retorno=['Error al actualizar los datos ','Error'];
        }
        return $this->retorno;
    }

    public function actualizarFoto()
    {
       $this->consulta="UPDATE usuarios SET urlFoto='$this->foto' WHERE numCedula='$this->identi'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno=['La foto se cambio con exito ','Bien'];
       }
       else{
            $this->retorno=['Error al actualizar los datos ','Error'];
       }
       return $this->retorno;
    }

    public function recuperar()
    {   
       $this->consulta="SELECT nombreUsuario FROM usuarios WHERE correoUsuario='$this->email'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();       
       $this->retorno=[];
       if($this->resultado->rowCount()>=1){
            $todo = '0123456789!#%$/()={}[]*+-<>&abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $longitud = strlen($todo);
            $password = '';
            for($i = 0; $i < 6; $i++) {
                $password .= $todo[mt_rand(0, $longitud - 1)];
            }
            $hash = password_hash($password, PASSWORD_ARGON2I);
            $nombre = '';
            foreach ($this->resultado->fetchAll(PDO::FETCH_ASSOC) as $dato) {$nombre = $dato['nombreUsuario'];}
            $this->consulta="UPDATE usuarios SET password='$hash' WHERE correoUsuario='$this->email'";
            $this->resultado=$this->conexion->con->prepare($this->consulta);
            $this->resultado->execute();
            if($this->resultado->rowCount()>=1){
                array_push($this->retorno, 1, $this->email, 'Señor(a) '.$nombre.' esta es sunueva contraseña ', 'Contraseña: '.$password,
                'No olvide apenas ingrese a el sistema cambiar su contraseña.',$nombre);
            }
            else{
                array_push($this->retorno, 0);
            }
        }
        else{
            array_push($this->retorno, 2, $this->email);
        }
        return $this->retorno;
    }
}
?>