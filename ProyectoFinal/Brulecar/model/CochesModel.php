<?php
class CochesModel extends ModeloBase{
    private $table;
     
    public function __construct(){
        $this->table="coches";
        parent::__construct($this->table);
    }
     
    public function ObtenerCochesPorUsuario($usuario){
        $query="SELECT matricula, modelo, marca, color, km, fecha_matriculacion, precio, habilitado FROM coches WHERE id_usuario = $usuario";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }

    public function maxprecio(){
        $query = "select max(precio) as maximo from " . $this->table . " where habilitado=true";
        $return=$this->ejecutarSql($query);
        return $return;
    }

    public function maxkm(){
        $query = "select max(km) as maximo from " . $this->table . " where habilitado=true";
        $return=$this->ejecutarSql($query);
        return $return;
    }

    public function ObtenerCoches(){
        $query="SELECT id, matricula, modelo, marca, color, km, fecha_matriculacion, precio FROM " . $this->table . " where habilitado = true";
        $return=$this->ejecutarSql($query);
        return $return;
    }

    public function ObtenerCochesFiltrados($kmMin=null, $kmMax=null, $precioMin=null, $precioMax=null, $marca = null, $modelo = null){

        $where = ' where habilitado = true';

        if(isset($kmMin) && isset($kmMax)){
            $where .= " and (km between $kmMin and $kmMax)";
        }

        if(isset($precioMin) && isset($precioMax)){
            $where .= " and (precio between $precioMin and $precioMax)";
        }
   
        if(isset($marca)){
            $where .= " and marca like '%$marca%'";
        }

        if(isset($modelo)){
            $where .= " and modelo like '%$modelo%'";
        }

        $query="SELECT id, matricula, modelo, marca, color, km, fecha_matriculacion, precio FROM " . $this->table;
        $return=$this->ejecutarSql($query . $where);
        return $return;
    }
    
    public function deshabilitarCoche($id){
        $query="UPDATE " . $this->table . " set habilitado=false where id=" . $id;
        $return=$this->ejecutarSqlUpdate($query);
        return $return;
    }
}
?>