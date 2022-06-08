<?php
class UsuariosModel extends ModeloBase{
    private $table;
     
    public function __construct(){
        $this->table="usuarios";
        parent::__construct($this->table);
    }
     
    public function getForLogin($usuario, $password){
        
        $query="SELECT * FROM usuarios WHERE usuario='" . $usuario . "' and password='" . $password . "'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;//[0]
    }
}
?>
