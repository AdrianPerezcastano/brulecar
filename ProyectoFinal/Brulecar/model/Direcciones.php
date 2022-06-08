<?php
class Direcciones extends EntidadBase{
    private $id;
    private $id_usuario;
    private $direccion;
    private $municipio;
    private $provincia;
    private $cp;
    
     
    public function __construct() {
        $table="direcciones";
        parent::__construct($table);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->dni = $id;
    }

    public function getId_Usuario() {
        return $this->id_usuario;
    }
 
    public function setId_Usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getDireccion() {
        return $this->direccion;
    }
 
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
     
    public function getMunicipio() {
        return $this->municipio;
    }
 
    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function getProvincia() {
        return $this->provincia;
    }
 
    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function getCp() {
        return $this->cp;
    }
 
    public function setCp($cp) {
        $this->cp = $cp;
    }
 
    public function guardar(){
        $query="INSERT INTO contratos (id,id_usuario,direccion,municipio,provincia, cp)
                VALUES(NULL,
                       '".$this->id."',
                       '".$this->id_usuario."',
                       '".$this->direccion."',
                       '".$this->municipio."',
                       '".$this->provincia."',
                       '".$this->cp."');";

        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
 
}
?>