<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Brulecar Venta - Compra de coches</title>
        
        <!-- Ficheros Estilos-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="assets/main.css" rel="stylesheet" type="text/css" />
        <link href="assets/all.min.css" rel="stylesheet" type="text/css" />
        <!-- Ficheros JavaScript -->
        <script type="text/javascript" src="assets/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="assets/all.min.js"></script>
        <script type="text/javascript" src="<?= HOME_PATH ?>assets/main.js"></script>

    </head>
    <body>
        <?php
            $estilo = array(
                'inicio' => !(isset($_GET['action']))?'active':'',
                'comprar' => (isset($_GET['action']) && $_GET['action'] == 'comprar')?'active':'',
                'venta' => (isset($_GET['action']) && $_GET['action'] == 'vender')?'active':'',
                'contacto' => (isset($_GET['action']) && $_GET['action'] == 'contact')?'active':'',
                'login' => (isset($_GET['action']) && $_GET['action'] == 'loginregister')?'active':''
            );
        ?>
        <div class="topnav" id="menu">
            <a class="<?php echo $estilo['inicio'] ?>" href="http://127.0.0.1/curso/ProyectoFinal/Brulecar"><i class="fa fa-fw fa-home"></i> Home</a>
            <?php
                if(isset($_SESSION['login'])){
            ?>
            <a class="<?php echo $estilo['comprar'] ?>" href="http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=comprar"><i class="fa-solid fa-car-rear"></i></i> Comprar</a>
            <a class="<?php echo $estilo['venta'] ?>" href="http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=vender"><i class="fa-solid fa-handshake-simple"></i> Venta</a>
            <?php 
                }
            ?>
            <a class="<?php echo $estilo['contacto'] ?>" href="http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=contact"><i class="fa-solid fa-address-book"></i> Contacto</a>
            <a class="<?php echo $estilo['login'] ?>" href="http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=loginregister"><i class="fa fa-fw fa-user"></i> Login/Register</a>
            <a href="javascript:void(0);" class="icon" onclick="menu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>