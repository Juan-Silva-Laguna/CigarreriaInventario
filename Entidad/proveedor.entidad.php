<?php
namespace entidadProveedor;
class Proveedor{
    private $idProveedor;
    private $nombreProveedor;
    private $celularProveedor;
    private $correoProveedor;
    private $idCategoria;

    /**
     * Get the value of idProveedor
     */ 
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set the value of idProveedor
     *
     * @return  self
     */ 
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get the value of nombreProveedor
     */ 
    public function getNombreProveedor()
    {
        return $this->nombreProveedor;
    }

    /**
     * Set the value of nombreProveedor
     *
     * @return  self
     */ 
    public function setNombreProveedor($nombreProveedor)
    {
        $this->nombreProveedor = $nombreProveedor;

        return $this;
    }

    /**
     * Get the value of celularProveedor
     */ 
    public function getCelularProveedor()
    {
        return $this->celularProveedor;
    }

    /**
     * Set the value of celularProveedor
     *
     * @return  self
     */ 
    public function setCelularProveedor($celularProveedor)
    {
        $this->celularProveedor = $celularProveedor;

        return $this;
    }

    /**
     * Get the value of correoProveedor
     */ 
    public function getCorreoProveedor()
    {
        return $this->correoProveedor;
    }

    /**
     * Set the value of correoProveedor
     *
     * @return  self
     */ 
    public function setCorreoProveedor($correoProveedor)
    {
        $this->correoProveedor = $correoProveedor;

        return $this;
    }

    /**
     * Get the value of idCategoria
     */ 
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set the value of idCategoria
     *
     * @return  self
     */ 
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }
}

?>