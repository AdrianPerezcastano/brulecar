<div class="contenido-web">
  <div class="row g-3">
      <div class="col-12 mb-2">
      <p class="parrafo-principal-contacto">Para cualquier consulta póngase en contacto con nosotros a través de este formulario</p>
      <hr>
      </div>

    <div class="col-md-6 col-12 mb-2">
      <label for="nombre" class="form-label"><b>Nombre</b></label>
      <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" required>
    </div>

    <div class="col-md-6 col-12 mb-2">
      <label for="apellidos" class="form-label"><b>Apellidos</b></label>
      <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" id="apellidos" required>
    </div>

    <div class="col-md-6 col-12 mb-2">
      <label for="email" class="form-label"><b>Correo electrónico</b></label>
      <input type="email" class="form-control" placeholder="Correo electrónico" name="email" id="email" required>
    </div>

    <div class="col-md-6 col-12 mb-2">
      <label for="ccaa" class="form-label"><b>CCAA</b></label>
      <select class="form-control" name="ccaa" id="ccaa" required>
        <option value="Madrid">Madrid</option>
        <option value="Catalunya">Cataluña</option>
        <option value="Galicia">Galicia</option>
        <option value="País Vasco">Pais Vasco</option>
        <option value="Andalucía">Andalucía</option>
        <option value="Islas Canarias">Islas Canarias</option>
        <option value="Islas Baleares">Islas Baleares</option>
        <option value="Castilla-La Mancha">Castilla-La Mancha</option>
        <option value="Castilla y León">Castilla y León</option>
      </select>  
    </div>
    <div class="col-12 mb-2">
      <label for="mensaje" class="form-label"><b>Mensaje</b></label><br>
      <textarea rows="5" cols="76" id="mensaje"></textarea>
    </div>
    </div>
    <div class="boton-contacto">
      <button type="button" class="btn btn-success" onClick="enviarmail()">Enviar</button>
    </div>
</div>
        