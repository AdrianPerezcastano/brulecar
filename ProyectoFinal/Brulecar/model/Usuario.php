<?php
class Usuario extends EntidadBase{
    private $dni;
    private $email;
    private $id;
    private $nombre;
    private $password;
    private $telefono;
    private $usuario;

    
     
    public function __construct() {
        $table="usuarios";
        parent::__construct($table);
    }
     
    public function getDni() {
        return $this->dni;
    }
 
    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getEmail() {
        return $this->email;
    }
 
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPassword() {
        return $this->password;
    }
 
    public function setPassword($password) {
        $this->password = $password;
    }
 
    public function getTelefono() {
        return $this->telefono;
    }
 
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
 
    public function getUsuario() {
        return $this->usuario;
    }
 
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

 
    public function guardar(){
        $query="INSERT INTO usuarios (dni,email,nombre,password,telefono,usuario)
                VALUES('".$this->dni."',
                       '".$this->email."',
                       '".$this->nombre."',
                       '".$this->password."',
                       '".$this->telefono."',
                       '".$this->usuario."');";

        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
 
}
?>
