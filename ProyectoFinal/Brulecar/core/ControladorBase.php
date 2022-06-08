<?php
class ControladorBase{
 
    public function __construct() {
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';
         
        //Incluir todos los modelos
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }
         
    public function view($vista,$datos){
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc}=$valor;
        }
         
        //cargamos header estático para todas las vistas
        require_once 'view/layouts/header.php';
        // cargamos vista a la que estamos llamando
        require_once 'view/'.$vista.'View.php';
        //cargamos footer estático para todas las vistas
        require_once 'view/layouts/footer.php';
    }
     
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        header("Location:index.php?controller=".$controlador."&action=".$accion);
    }
     
 
}
?>
