<?php
namespace entidadVenta;
class Venta{
    private $idVenta;
    private $cantidadVenta;
    private $fecha;
    private $producto;
    private $responsable;


    /**
     * Get the value of idVenta
     */ 
    public function getIdVenta()
    {
        return $this->idVenta;
    }

    /**
     * Set the value of idVenta
     *
     * @return  self
     */ 
    public function setIdVenta($idVenta)
    {
        $this->idVenta = $idVenta;

        return $this;
    }

    /**
     * Get the value of cantidadVenta
     */ 
    public function getCantidadVenta()
    {
        return $this->cantidadVenta;
    }

    /**
     * Set the value of cantidadVenta
     *
     * @return  self
     */ 
    public function setCantidadVenta($cantidadVenta)
    {
        $this->cantidadVenta = $cantidadVenta;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of producto
     */ 
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     *
     * @return  self
     */ 
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get the value of responsable
     */ 
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set the value of responsable
     *
     * @return  self
     */ 
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }
}

?>