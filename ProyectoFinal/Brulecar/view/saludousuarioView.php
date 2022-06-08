<div class="contenido-web">
    <?php
    echo "<h1 class=parrafo-inicial>Bienvenido: " . $nombre . "<h1>";
    ?>
    <h2>Tus datos personales</h2>
    <hr>
    Nombre: <?= $nombre ?> <br>
    Email: <?= $email ?> <br>
    Telefono: <?= $telefono ?> <br><br><br>

    <div class="cerrar-sesion">
        <input class="btn btn-success" type="button" onClick="logout()" value="Cerrar sesión">
    </div>

    <h2>Tus coches en venta</h2>
    <hr>

    <?php
    if(!isset($coches) || empty($coches)){
        echo "<h4>No tienes coches guardados.</h4>";
        echo "<p>¿Quieres vender algún coche? - <a href='".HOME_PATH."?action=vender'>Subir coche</a></p>";
    }else{
    ?>
    <table class= "table table-striped"> 
        <tr> 
            <th>Matricula</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Color</th>
            <th>KM</th>
            <th>Fecha Matriculación</th>
            <th>Precio</th>
        </tr>
    <?php
        foreach($coches as $coche){
            echo "<tr> 
            <td>$coche->matricula</td>
            <td>$coche->modelo</td>
            <td>$coche->marca</td>
            <td>$coche->color</td>
            <td>$coche->km</td>
            <td>$coche->fecha_matriculacion</td>
            <td>$coche->precio</td>
            </tr>";
        }
    }
    ?>
    </table>
    
</div>