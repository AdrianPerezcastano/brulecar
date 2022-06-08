<?php
class DireccionesModel extends ModeloBase{
    private $table;
     
    public function __construct(){
        $this->table="direcciones";
        parent::__construct($this->table);
    }
     
}
?>