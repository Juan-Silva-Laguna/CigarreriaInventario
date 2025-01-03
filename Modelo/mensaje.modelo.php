<?php
namespace modeloMensaje;
use PDO;

include_once("../entidad/mensaje.entidad.php");
include_once("../entorno/conexion.php");
class Mensaje{
   private $idMensaje;
   private $emisor;
   private $receptor;
   private $mensaje;
   private $estadoMensaje;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadMensaje\Mensaje $MensajeE)
    {
        $this->conexion = new \Conexion();
        $this->idMensaje=$MensajeE->getIdMensaje();  
        $this->emisor=$MensajeE->getEmisor();  
        $this->receptor=$MensajeE->getReceptor();  
        $this->mensaje=$MensajeE->getMensaje();  
        $this->estadoMensaje=$MensajeE->getEstadoMensaje();  
    }

    public function enviarMensaje()
    {
       $this->consulta="INSERT INTO mensajes VALUES(null, '$this->emisor', '$this->receptor', '$this->mensaje', '$this->estadoMensaje')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       $this->retorno=[];
       if($this->resultado->rowCount()>=1){
         $this->retorno='Se envio el mensaje';
         }
         else{
            $this->retorno='No se envio el mensaje';
         }
         return $this->retorno; 
   }

    public function mostrarChat()
    {
       $this->consulta="SELECT * FROM `mensajes` WHERE emisor=$this->emisor AND receptor=$this->receptor OR emisor=$this->receptor AND receptor=$this->emisor";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function consultarEditar()
    {
       $this->consulta="SELECT Mensajes.emisorMensaje, Mensajes.receptorMensaje, proveedores.nombreProveedor, productos.nombreProducto FROM Mensajes
       INNER JOIN proveedores ON Mensajes.idProveedor=$this->idProveedor AND proveedores.idProveedor=$this->idProveedor
       INNER JOIN productos ON Mensajes.estadoMensaje=$this->estadoMensaje AND productos.estadoMensaje=$this->estadoMensaje WHERE Mensajes.idMensaje=$this->idMensaje";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cantidadMensajes()
    {
       $this->consulta="SELECT emisor, receptor FROM mensajes WHERE estadoMensaje=0 AND receptor=$this->receptor";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizaEstado()
    {
       $this->consulta="UPDATE mensajes SET estadoMensaje=1 WHERE estadoMensaje=0 AND emisor=$this->receptor AND receptor=$this->emisor";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
    }    
}

?>