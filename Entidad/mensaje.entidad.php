<?php
namespace entidadMensaje;
class Mensaje{
    private $idMensaje;
    private $emisor;
    private $receptor;
    private $mensaje;
    private $estadoMensaje;


    /**
     * Get the value of idMensaje
     */ 
    public function getIdMensaje()
    {
        return $this->idMensaje;
    }

    /**
     * Set the value of idMensaje
     *
     * @return  self
     */ 
    public function setIdMensaje($idMensaje)
    {
        $this->idMensaje = $idMensaje;

        return $this;
    }

    /**
     * Get the value of emisor
     */ 
    public function getEmisor()
    {
        return $this->emisor;
    }

    /**
     * Set the value of emisor
     *
     * @return  self
     */ 
    public function setEmisor($emisor)
    {
        $this->emisor = $emisor;

        return $this;
    }

    /**
     * Get the value of receptor
     */ 
    public function getReceptor()
    {
        return $this->receptor;
    }

    /**
     * Set the value of receptor
     *
     * @return  self
     */ 
    public function setReceptor($receptor)
    {
        $this->receptor = $receptor;

        return $this;
    }

    /**
     * Get the value of mensaje
     */ 
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set the value of mensaje
     *
     * @return  self
     */ 
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get the value of estadoMensaje
     */ 
    public function getEstadoMensaje()
    {
        return $this->estadoMensaje;
    }

    /**
     * Set the value of estadoMensaje
     *
     * @return  self
     */ 
    public function setEstadoMensaje($estadoMensaje)
    {
        $this->estadoMensaje = $estadoMensaje;

        return $this;
    }
}

?>