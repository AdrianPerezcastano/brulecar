<div class="contenido-web">
  <div class="row g-3">
    <div class="col-12 mb-2">
      <h2 class="parrafo-comprar">Encuentra tú coche más rápido</h2>
    </div>
    <div class="col-md-6 col-12 mb-2">
        <label for="marca" class="form-label"><b>Marca</b></label>
        <input type="text" id="marca" name="marca" class="form-control" placeholder="Marca" onKeyUp="buscaCoche()">
    </div>
    <div class="col-md-6 col-12 mb-2">
      <label for="modelo" class="form-label"><b>Modelo</b></label>
      <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo" onKeyUp="buscaCoche()">
    </div>
    <div class="col-md-6 col-12 mb-2">
        <label for="km-min" class="form-label"><b>Kilometros Mínimo</b></label>
        <input type="text" name="km-min" id="km-min" class="form-control" placeholder="KM Minimo" value="0" onKeyUp="buscaCoche()">
    </div>
    <div class="col-md-6 col-12 mb-2">
        <label for="km-max" class="form-label"><b>Kilometros Máximo</b></label>
        <input type="text" name="km-max" id="km-max" class="form-control" placeholder="KM Máximo" value="<?php echo $kmmax; ?>" onKeyUp="buscaCoche()">
    </div>
    <div class="col-md-6 col-12 mb-2">
        <label for="precio" class="form-label"><b>Precio Mínimo</b></label>
        <input type="text" name="precio-min" id="precio-min" class="form-control" placeholder="Precio mínimo" value="0" onKeyUp="buscaCoche()">
    </div>
    <div class="col-md-6 col-12 mb-2">
        <label for="precio" class="form-label"><b>Precio Máximo</b></label>
        <input type="text" name="precio-max" id="precio-max" class="form-control" placeholder="Precio máximo" value="<?php echo $maxprecio; ?>" onKeyUp="buscaCoche()">
    </div>
  </div>

  <hr>
  <div id="resultado-busqueda">
    <?php
    if(!isset($coches) || empty($coches)){
      echo "<h3>No se han encontrado coches</h3>";
    }else{
      foreach($coches as $coche){
        echo "<div class='coche' id='coche_".$coche->id."'>";
          echo "<div class='capa-img'>";
            echo "<img src='".IMG_CAR_WEB. $coche->matricula . ".jpg' class='imagen'/>";
          echo "</div>";
          echo "<div class='info-coche'>";
            echo "Modelo: <span>" . $coche->modelo . "</span> <br>";
            echo "Marca: <span>" . $coche->marca . "</span><br>";
            echo "Color: <span>" . $coche->color . "</span><br>";
            echo "Matrícula: <span>" . $coche->matricula . "</span><br>";
            echo "Km: <span>" . $coche->km . "</span><br>";
            echo "Fecha matriculación: <span>" . $coche->fecha_matriculacion . "</span><br>";
          echo "</div>";
          echo "<div class='text-end color-black'>";
            echo "<span>Precio</span>: <span class='fs-4'>" . $coche->precio . " €</span>"; 
          echo "</div>";
          echo "<div class=''>";
            echo "<input type='button' class='btn btn-success' onClick='realizarCompra(".$coche->id.")' value='Comprar'>";
          echo "</div>";
        echo "</div>";
      }
    }
    ?>
  </div>
</div>