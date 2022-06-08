<?php
class Contratos extends EntidadBase{
    private $id;
    private $id_usuario;
    private $id_coche;
    private $fecha;    
     
    public function __construct() {
        $table="contratos";
        parent::__construct($table);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }

    public function getId_Usuario() {
        return $this->id_usuario;
    }
 
    public function setId_Usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getId_Coche() {
        return $this->id_coche;
    }
 
    public function setId_Coche($id_coche) {
        $this->id_coche = $id_coche;
    }
     
    public function getFecha() {
        return $this->fecha;
    }
 
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

 
    public function guardar(){
        $query="INSERT INTO contratos (id_usuario,id_coches,fecha_contrato) 
                VALUES ('".$this->id_usuario."',
                       '".$this->id_coche."',
                       '".$this->fecha."');";

        $save=$this->db()->query($query);
        //return $this->db()->error;
        return $save;
    }
    
}
?>