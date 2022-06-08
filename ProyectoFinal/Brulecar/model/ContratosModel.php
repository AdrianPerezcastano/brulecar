<?php
class ContratosModel extends ModeloBase{
    private $table;
     
    public function __construct(){
        $this->table="contratos";
        parent::__construct($this->table);
    }
     
    public function ObtenerContratos($usuario){
        $query="SELECT matricula, modelo, marca, color, km, fecha_matriculacion, precio, fecha_contrato FROM `contratos` AS c INNER JOIN coches AS co ON c.id_usuario = co.id WHERE c.id_usuario = $usuario";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }

}
?>