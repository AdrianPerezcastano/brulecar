function menu() {
    var x = document.getElementById("menu");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }


function login(){
    user = document.getElementById("user-login").value;
    pwd = document.getElementById("pwd-login").value;
    if(user == '' || pwd == ''){
        alert("Tienes que rellenar todos los campos");
        return false;
    }
    $.ajax({
        url: "http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=login",
        type: "post",
        data: {'user-login': user, 'pwd-login': pwd},
        dataType: 'text',
        success: function(result){
            result = $.parseJSON(result);
            if(result.status){
                location.reload();
            }else{
                alert(result.message);
            }
        },
        error: function(result){
            alert(result.message);
        }
    });

}

function registro(){
    email = document.getElementById("email").value;
    usuario = document.getElementById("nusuario").value;
    password = document.getElementById("psw").value;
    dni = document.getElementById("dni").value;
    telefono = document.getElementById("telefono").value;
    nombre = document.getElementById("nombre").value;

    if(email == '' || usuario == '' || password == '' || dni == '' || telefono == '' || nombre == ''){
        alert("Tienes que rellenar todos los campos");
        return false;
    }
    $.ajax({
        url: "http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=register",
        type: "post",
        data: {'email': email, 'usuario': usuario, 'password': password, 'dni': dni, 'telefono': telefono, 'nombre': nombre},
        dataType: 'text',
        success: function(result){
            result = $.parseJSON(result);
            if(result.status){
                document.getElementById("email").value = "";
                document.getElementById("nusuario").value = "";
                document.getElementById("psw").value = "";
                document.getElementById("dni").value = "";
                document.getElementById("telefono").value = "";
                document.getElementById("nombre").value = "";
                alert(result.message);
            }else{
                alert(result.message);
            }
        },
        error: function(result){
            alert(result.message);
        }
    });
}

function logout(){
    $.ajax({
        url: "http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=logout",
        type: "post",
        success: function(){
            location.reload();          
        }
    });
}

function guardaCoches(){
    marca = document.getElementById("marca").value;
    modelo = document.getElementById("modelo").value;
    kilometros = document.getElementById("km").value;
    color = document.getElementById("color").value;
    fecha_matriculacion = document.getElementById("f-matriculacion").value;
    matricula = document.getElementById("matricula").value;
    precio = document.getElementById("precio").value;

    if(marca == '' || modelo == '' || kilometros == '' || color == '' || fecha_matriculacion == '' || matricula == '' || precio == '' || imagen == ''){
        alert("Tienes que rellenar todos los campos");
        return false;
    }
    var formdata = new FormData();
    formdata.append('marca', marca);
    formdata.append('modelo', modelo);
    formdata.append('kilometros', kilometros);
    formdata.append('fecha_matriculacion', fecha_matriculacion);
    formdata.append('matricula', matricula);
    formdata.append('color', color);
    formdata.append('precio', precio);
    formdata.append('imagen', $('#imagen').prop('files')[0]);
    
    $.ajax({
        url: "http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=guardacoche",
        type: "post",
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
            result = $.parseJSON(result);
            alert(result.message);
        },
        error: function(result){
            result = $.parseJSON(result);
            alert(result.message);
        }
    });
} 


function cargarCoches(){
    marca = document.getElementById("marca").value;
    modelo = document.getElementById("modelo").value;
    kilometros = document.getElementById("km").value;
    color = document.getElementById("color").value;
    fecha_matriculacion = document.getElementById("fecha_matriculacion").value;
    matricula = document.getElementById("matricula").value;
    precio = document.getElementById("precio").value;

    if(marca == '' || modelo == '' || kilometros == '' || color == '' || fecha_matriculacion == '' || matricula == '' || precio == '' || imagen == ''){
        alert("Tienes que rellenar todos los campos");
        return false;
    }
    var formdata = new FormData();
    formdata.append('marca', marca);
    formdata.append('modelo', modelo);
    formdata.append('kilometros', kilometros);
    formdata.append('fecha_matriculacion', fecha_matriculacion);
    formdata.append('matricula', matricula);
    formdata.append('color', color);
    formdata.append('precio', precio);
    formdata.append('imagen', $('#imagen').prop('files')[0]);
    
    $.ajax({
        url: "http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=comprar",
        type: "post",
        data: formdata,
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
            result = $.parseJSON(result);
            alert(result.message);
        },
        error: function(result){
            result = $.parseJSON(result);
            alert(result.message);
        }
    });
}

function buscaCoche(){

    marca = document.getElementById("marca").value;
    modelo = document.getElementById("modelo").value;
    kmmin = document.getElementById("km-min").value;
    kmmax = document.getElementById("km-max").value;
    pmin = document.getElementById("precio-min").value;
    pmax = document.getElementById("precio-max").value;

    if ((pmax != '' && pmin == '') || (pmax == '' && pmin != '')){
        alert('Tienes que rellenar ambos precios.');
        return false;
    }

    if ((kmmax != '' && kmmin == '') || (kmmax == '' && kmmin != '')){
        alert('Tienes que rellenar ambos kilometrajes.');
        return false;
    }

    $.ajax({
        url: "http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=buscacoche",
        type: "post",
        data: {'marca': marca, 'modelo': modelo, 'kmmin': kmmin, 'kmmax': kmmax, 'pmin': pmin, 'pmax': pmax},
        dataType: 'text',
        success: function(result){
            contenido = '';
            result = $.parseJSON(result);
            $('#resultado-busqueda').html('');
            if(!result){
                contenido = '<h3>No se han encontrado coches</h3>';
            }else{
                if(result.length == undefined){
                    contenido += "<div class='coche'>";
                        contenido += "<div class='capa-img'>";
                          contenido += "<img src='http://127.0.0.1/curso/ProyectoFinal/Brulecar/img/coches/" + result.matricula + ".jpg' class='imagen'/>";
                        contenido += "</div>";
                        contenido += "<div class='info-coche' id='coche_"+result.id+"'>";
                          contenido += "Modelo: <span>" + result.modelo + "</span> <br>";
                          contenido += "Marca: <span>" + result.marca + "</span><br>";
                          contenido += "Color: <span>" + result.color + "</span><br>";
                          contenido += "Matrícula: <span>" + result.matricula + "</span><br>";
                          contenido += "Km: <span>" + result.km + "</span><br>";
                          contenido += "Fecha matriculación: <span>" + result.fecha_matriculacion + "</span><br>";
                        contenido += "</div>";
                        contenido += "<div class='text-end color-black'>";
                          contenido += "<span>Precio</span>: <span class='fs-4'>" + result.precio + " €</span>"; 
                        contenido += "</div>";
                        contenido += "<div class=''>";
                          contenido += "<input type='button' class='btn-comprar' onClick='realizarCompra("+result.id +")' value='Comprar'>";
                        contenido += "</div>";
                      contenido += "</div>";
                }else{
                    for(var i = 0; i< result.length; i++){
                        contenido += "<div class='coche' id='coche_"+result[i].id+"'>";
                        contenido += "<div class='capa-img'>";
                          contenido += "<img src='http://127.0.0.1/curso/ProyectoFinal/Brulecar/img/coches/" + result[i].matricula + ".jpg' class='imagen'/>";
                        contenido += "</div>";
                        contenido += "<div class='info-coche'>";
                          contenido += "Modelo: <span>" + result[i].modelo + "</span> <br>";
                          contenido += "Marca: <span>" + result[i].marca + "</span><br>";
                          contenido += "Color: <span>" + result[i].color + "</span><br>";
                          contenido += "Matrícula: <span>" + result[i].matricula + "</span><br>";
                          contenido += "Km: <span>" + result[i].km + "</span><br>";
                          contenido += "Fecha matriculación: <span>" + result[i].fecha_matriculacion + "</span><br>";
                        contenido += "</div>";
                        contenido += "<div class='text-end color-black'>";
                          contenido += "<span>Precio</span>: <span class='fs-4'>" + result[i].precio + " €</span>"; 
                        contenido += "</div>";
                        contenido += "<div class=''>";
                          contenido += "<input type='button' class='btn-comprar' onClick='realizarCompra()' value='Comprar'>";
                        contenido += "</div>";
                      contenido += "</div>";
                    }
                }
            }
            $('#resultado-busqueda').html(contenido);
        },
        error: function(result){
            alert(result.message);
        }
    });

}

function enviarmail(){
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    email = document.getElementById("email").value;
    ccaa = document.getElementById("ccaa");
    ccaa = ccaa.options[ccaa.selectedIndex].value;
    mensaje = document.getElementById("mensaje").value;

    if(nombre == '' || apellidos == '' || email == '' || ccaa == '' || mensaje == ''){
        alert("Tienes que rellenar todos los campos");
        return false;
    }
    $.ajax({
        url: "http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=enviarmail",
        type: "post",
        data: {'nombre': nombre, 'apellidos': apellidos, 'email': email, 'ccaa': ccaa, 'mensaje': mensaje},
        dataType: 'text',
        success: function(result){
            alert(result);
        },
        error: function(result){
            alert(result);
        }
    });
}

function realizarCompra(id){
    if(id == '' || id == 0 || id == null){
        alert("Tienes que seleccionar un coche para comprar.");
        return false;
    }

    $.ajax({
        url: "http://127.0.0.1/curso/ProyectoFinal/Brulecar/?action=comprarcoche",
        type: "post",
        data: {'id': id},
        dataType: 'text',
        success: function(result){
            result = $.parseJSON(result);
            alert(result.message);
            if(result.status){
                document.getElementById('coche_' + id).style.display='none';
            }
        },
        error: function(result){
            alert(result.message);
        }
    });

}

