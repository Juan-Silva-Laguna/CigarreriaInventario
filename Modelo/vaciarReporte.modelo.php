<?php
namespace modeloVaciaR;
use PDO;

include_once("../entorno/conexion.php");
class VaciaR{
    private $conexion;
    private $consulta1;
    private $consulta2;
    private $resultado1;
    private $resultado2;
    public function __construct()
    {
        $this->conexion = new \Conexion();
    }
    public function vaciarReporte()
    {
        $this->consulta1="DELETE FROM pedidos WHERE estadoPedido='0'";
        $this->resultado1=$this->conexion->con->prepare($this->consulta1);
        $this->resultado1->execute();

        $this->consulta2="TRUNCATE TABLE ventas";
        $this->resultado2=$this->conexion->con->prepare($this->consulta2);
        $this->resultado2->execute();
    }
}

?>