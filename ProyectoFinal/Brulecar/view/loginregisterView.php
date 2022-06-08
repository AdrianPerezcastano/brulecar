<div class="contenido-web">
  <div class="row g-3">
      <div class="col-12 mb-2">
      <p class="parrafo-principal-login">Inicia sesión, si no tiene cuenta, regístrese.</p>
      <hr>
        <h1 class="titulo-login">Login</h1>
      </div>
    <div class="col-md-6 col-12 mb-2">
      <label for="user-login" class="form-label"><b>Nombre de Usuario</b></label>
      <input type="text" class="form-control" placeholder="Nombre de Usuario" name="user-login" id="user-login" required>
    </div>
    <div class="col-md-6 col-12 mb-2">
      <label for="pwd-login" class="form-label"><b>Password</b></label>
      <input type="password" class="form-control" placeholder="Password" name="pwd-login" id="pwd-login" required>
    </div>
    <div class="col-12 mb-2">
      <button type="button" onClick="login()" class="btn btn-success">Login</button>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-12 mb-2">
      <h1 class="titulo-register">Registrarse</h1>
    </div>

    <div class="col-md-6 col-12 mb-2">
      <label for="email" class="form-label"><b>Email</b></label>
      <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" required>
    </div>

    <div class="col-md-6 col-12 mb-2">
      <label for="usuario" class="form-label"><b>Nombre de usuario</b></label>
      <input type="text" class="form-control" placeholder="Nombre" name="nusuario" id="nusuario" required>
    </div>

    <div class="col-md-6 col-12 mb-2">
      <label for="psw" class="form-label"><b>Password</b></label>
      <input type="password" class="form-control" placeholder="Password" name="psw" id="psw" required>
    </div>

    <div class="col-md-6 col-12 mb-2">
      <label for="dni" class="form-label"><b>DNI</b></label>
      <input type="text" class="form-control" placeholder="Dni" name="dni" id="dni" required>
    </div>
    <div class="col-md-6 col-12 mb-2">
      <label for="teléfono" class="form-label"><b>Teléfono</b></label>
      <input type="text" class="form-control" placeholder="Teléfono" name="telefono" id="telefono" required>
    </div>
    <div class="col-md-6 col-12 mb-2">
      <label for="usuario" class="form-label"><b>Nombre completo</b></label>
      <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" required>
    </div>
    <div class=" col-12 mb-3">
      <button type="button" onClick="registro()" class="btn btn-success">Registro</button>
    </div>
</div>
 