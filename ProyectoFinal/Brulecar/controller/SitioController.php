<?php

class SitioController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
    }
     
    public function index(){
        $this->view("index",array());
    }
    
    public function contact(){
         
        //Creamos el objeto usuario
        $usuario=new Usuario();
         
        //Conseguimos todos los usuarios
        $allusers=$usuario->getAll();
        
        //Cargamos la vista contact y le pasamos valores
        $this->view("contact", array());
    }
    /**
     * Acción que devuelve la vista comprar.
     */
    public function comprar(){
        $objcoches = new CochesModel();
        $maxprecio = $objcoches->maxprecio();
        $kmmax = $objcoches->maxkm();
        $coches = $objcoches->ObtenerCoches();

        $this->view("comprar", array(
            'maxprecio' => $maxprecio->maximo,
            'kmmax' => $kmmax->maximo,
            'coches' => $coches
        ));
    }
    public function vender(){
                 
        //Cargamos la vista vender y le pasamos valores
        $this->view("vender", array());
    }

    public function loginregister(){
        if(isset($_SESSION['login']) && $_SESSION['login']){
            $objcoches = new  CochesModel();
            $coches = $objcoches->ObtenerCochesPorUsuario($_SESSION['iduser']);

            $this->view("saludousuario", array(
                'nombre' => $_SESSION['usuario'],
                'email' => $_SESSION['email'],
                'telefono' => $_SESSION['telefono'],
                'dni' => $_SESSION['dni'],
                'coches' => $coches
            ));
        }else{
            $this->view("loginregister", array());
        }
    }


    public function register(){
        $result = new stdClass();
        $result->status = false;
        $result->message = "Error inesperado";

        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $nombre = $_POST['nombre'];

        $objUsuario = new Usuario();
        $objUsuario->setDni($dni);
        $objUsuario->setEmail($email);
        $objUsuario->setUsuario($usuario);
        $objUsuario->setNombre($nombre);
        $objUsuario->setTelefono($telefono);
        $objUsuario->setPassword($password);
        
        if($objUsuario->guardar()){
            $result->status = true;
            $result->message = "Usuario guardado";
        }else{
            $result->message = "No se pudo guardar al usuario";
        }
        echo json_encode($result);

    }

    

    public function login(){
        $result = new stdClass();
        $result->status = false;
        $result->message = "Error inesperado";

        $usr = $_POST['user-login'];
        $pwd = $_POST['pwd-login'];

        $objUser = new UsuariosModel();
        $user = $objUser->getForLogin($usr,$pwd);
        if(isset($user)){
            
            $_SESSION['login']      = true;
            $_SESSION['iduser']      = $user->id;
            $_SESSION['usuario']     = $user->usuario;
            $_SESSION['email']       = $user->email;
            $_SESSION['telefono']    = $user->telefono;
            $_SESSION['dni']         = $user->dni;

            $result->status  = true;
            $result->message = "Usuario logueado.";
        }else{
            $result->message = "Usuario no encontrado.";
        }
        
        echo json_encode($result);
    }

    public function logout(){
        session_destroy();
    }


    public function guardacoche(){
        $result = new stdClass();
        $result->status = false;
        $result->message = "Error inesperado";
        $guardado = false;

        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $kilometros = $_POST['kilometros'];
        $fecha_matriculacion = $_POST['fecha_matriculacion'];
        $matricula = $_POST['matricula'];
        $precio = $_POST['precio'];
        $color = $_POST['color'];

      
      
        $objCoche = new Coches();
        $objCoche->setMarca($marca);
        $objCoche->setModelo($modelo);
        $objCoche->setKm($kilometros);
        $objCoche->setColor($color);
        $objCoche->setMatricula($matricula);
        $objCoche->setFecha_matriculacion($fecha_matriculacion);
        $objCoche->setPrecio($precio);
        $objCoche->setId_usuario($_SESSION['iduser']);

        $nombre_imagen = $matricula . ".jpg";
        $name = basename($nombre_imagen);
        $tmp_name = $_FILES['imagen']['tmp_name'];
        if(move_uploaded_file($tmp_name, IMG_CAR_PATH . $name)){   
            $guardado = true;
        }else{
            $result->message = "Error guardando la foto.";
        }
      
        if($guardado){
            if($objCoche->guardar()){
                $result->status = true;
                $result->message = "Coche guardado.";
            }else{
                $result->message = "Error guardando el coche.";
            }
        }

        echo json_encode($result);

    }
    public function buscacoche(){
        $result = new stdClass();
        $result->status = false;
        $result->message = "Error inesperado";
        
        $marca = $_POST['marca'] == '' ? null : $_POST['marca'];
        $modelo = $_POST['modelo'] == '' ? null : $_POST['modelo'];
        $kmmin = $_POST['kmmin'] == '' ? null : $_POST['kmmin'];
        $kmmax = $_POST['kmmax'] == '' ? null : $_POST['kmmax'];
        $pmin = $_POST['pmin'] == '' ? null : $_POST['pmin'];
        $pmax = $_POST['pmax'] == '' ? null : $_POST['pmax'];
        
        $objCoches = new CochesModel();
        $coches = $objCoches->ObtenerCochesFiltrados($kmmin, $kmmax, $pmin, $pmax, $marca, $modelo);
                
        echo json_encode($coches);
    }


        
    public function enviarmail(){
            // múltiples recipientes
            $para  = $_POST['email'];
            // asunto
            $asunto = 'contacto';
            // mensaje
            $mensaje = $_POST['mensaje'];
            // Para enviar correo HTML, la cabecera Content-type debe definirse
            $cabeceras  = 'MIME-Version: 1.0';
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1';
            // Cabeceras adicionales
            $cabeceras .= $_POST['nombre'];
            echo "<br>";
            $cabeceras .= 'From: adridzeko@gmail.com'."\r\n"
            . "X-Mailer: PHP/".phpversion();
            // Enviarlo
            if(mail($para, $asunto, $mensaje, $cabeceras)){
                echo "Mensaje enviado";
            }else{
                echo "Ha ocurrido un error al enviar el mensaje";
            }
            /**require_once 'core/mailer/PHPMailer.php';
            require_once 'core/mailer/Exception.php';
            require_once 'core/mailer/OAuth.php';
            require_once 'core/mailer/OAuthTokenProvider.php';
            require_once 'core/mailer/POP3.php';
            require_once 'core/mailer/SMTP.php';
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug  = 0;
            //Ahora definimos gmail como servidor que aloja nuestro SMTP
            $mail->Host       = 'smtp.gmail.com';
            //El puerto será el 587 ya que usamos encriptación TLS
            $mail->Port       = 465;
            //Definmos la seguridad como TLS
            $mail->SMTPSecure = 'ssl';
            //Tenemos que usar gmail autenticados, así que esto a TRUE
            $mail->SMTPAuth   = true;
            //Definimos la cuenta que vamos a usar. Dirección completa de la misma
            $mail->Username   = "adridzeko@gmail.com";
            //Introducimos nuestra contraseña de gmail
            $mail->Password   = "fcbarcelona4";
            $mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;
            //Definimos el remitente (dirección y, opcionalmente, nombre)
            $mail->SetFrom('adridzeko@gmail.com', 'Brulecar');
            //Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
            $mail->AddAddress($_POST['email'],$_POST['nombre'],$_POST['apellidos']);
                    //Definimos el tema del email
            $mail->Subject = 'Informacion Brulecar';
            //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
            $mail->Body = $_POST['mensaje'];
            //Enviamos el correo
            if(!$mail->Send()) {
                echo "Error: " . $mail->ErrorInfo;
            } else {
                echo "Mensaje enviado";
            }**/


    }

    public function comprarcoche(){
        $return = new stdClass();
        $return->status = false;
        $return->message = "Error inesperado al comprar el coche";

        if(!$_SESSION['login']){
            $return->message = "Tienes que estar logueado para comprar";
            echo json_encode($return);
        }

        $id = $_POST['id'];
        $objCoche = new CochesModel();
        $coche = $objCoche->deshabilitarCoche($id);

        if(!$coche){
            $return->message="Error al deshabilitar el coche.";
            echo json_encode($return);
        }
        $objContrato = new Contratos();  
        $objContrato->setId_Usuario($_SESSION['iduser']);
        $objContrato->setId_Coche($id);
        $objContrato->setFecha(date("Y-m-d"));

            $return->status=true;
            $return->message="Contrato realizado.";
            $return->sql = $objContrato->guardar();
        echo json_encode($return);
    }
}
?>
