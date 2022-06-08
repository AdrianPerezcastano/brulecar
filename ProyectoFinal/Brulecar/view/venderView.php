<div class="contenido-web">
    <div class="row g-3">
        <div class="col-12 mb-2">
            <p class="parrafo-principal-venta">Registre su coche y véndalo</p>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-12 mb-2">
                <label for="marca" class="form-label"><b>Marca</b></label>
                <input type="text" class="form-control" placeholder="Marca" name="marca" id="marca" required>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <label for="modelo" class="form-label"><b>Modelo</b></label>
                <input type="text" class="form-control" placeholder="Modelo" name="modelo" id="modelo" required>
            </div>

            <div class="col-md-6 col-12 mb-2">
                <label for="km" class="form-label"><b>Kilómetros</b></label>
                <input type="int" class="form-control" placeholder="Kilómetros" name="km" id="km" required>
            </div>

            <div class="col-md-6 col-12 mb-2">
                <label for="color" class="form-label"><b>Color</b></label>
                <input type="text" class="form-control" placeholder="Color" name="color" id="color" required>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <label for="f-matriculacion" class="form-label"><b>Fecha de matriculación</b></label>
                <input type="date" class="form-control" name="f-matriculacion" id="f-matriculacion" required>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <label for="matricula" class="form-label"><b>Matrícula</b></label>
                <input type="text" class="form-control" placeholder="Matrícula" name="matricula" id="matricula" required>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <label for="precio" class="form-label"><b>Precio</b></label>
                <input type="text" class="form-control" placeholder="Precio" name="precio" id="precio" required>
            </div>
            <div class="col-md-6 col-12 mb-2">
                <label for="imagen" class="form-label"><b>Imágenes</b></label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg"  class="form-control">
            </div>
            <div class="col-md-6 col-12 mb-2">
                <input type="button" onClick="guardaCoches()" class="btn btn-success" value="Cargar coche">
            </div>
        </div>
    </div>
</div>