<?php
class Coches extends EntidadBase{
    // Campos de la tabla
    private $id;
    private $matricula;
    private $modelo;
    private $marca;
    private $color;
    private $km;
    private $fecha_matriculacion;
    private $precio;
    private $id_usuario;
    private $habilitado;
    
     
    public function __construct() {
        $table="coches";
        parent::__construct($table);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }

    public function getMatricula() {
        return $this->matricula;
    }
 
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getModelo() {
        return $this->modelo;
    }
 
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
     
    public function getMarca() {
        return $this->marca;
    }
 
    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getColor() {
        return $this->color;
    }
 
    public function setColor($color) {
        $this->color = $color;
    }
 
    public function getKm() {
        return $this->km;
    }
 
    public function setKm($km) {
        $this->km = $km;
    }
 
    public function getFecha_matriculacion() {
        return $this->fecha_matriculacionpo;
    }
 
    public function setFecha_matriculacion($fecha_matriculacion) {
        $this->fecha_matriculacion = $fecha_matriculacion;
    }
    public function getPrecio() {
        return $this->precio;
    }
 
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
 
    public function getId_usuario() {
        return $this->id_usuario;
    }
 
    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getHabilitado() {
        return $this->habilitado;
    }
 
    public function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }
    
    public function guardar(){
        $query="INSERT INTO coches (matricula,modelo,marca,color,km,fecha_matriculacion,precio, id_usuario, habilitado)
                VALUES('".$this->matricula."',
                       '".$this->modelo."',
                       '".$this->marca."',
                       '".$this->color."',
                       '".$this->km."',
                       '".$this->fecha_matriculacion."',
                       '".$this->precio."',
                       '".$this->id_usuario."',
                       true);";

        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
 
}
?>