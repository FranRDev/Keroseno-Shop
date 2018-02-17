<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/cabecera.php"); ?>
    
    <!-- API Google reCAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <?php include("includes/navegacion.php"); ?>

    <!-- Contenido -->
    <div class="container">
        <!-- Codigo PHP -->
        <?php
        // Se deshabilitan los mensajes de error.
        include 'deshabilitar_mensajes_error.php';
        
        // -------------------------------------------------- CAPTCHA -------------------------------------------------- //
        
        // Llave secreta de Google reCaptcha.
        $llave_secreta = "6LcI0jcUAAAAAAN_Rj-zXAUto18-c95GgfscDliQ";
        
        // Variable del captcha.
        $captcha = $_POST["g-recaptcha-response"];
        
        // API de verificación del captcha.
        $api_verificacion = "https://www.google.com/recaptcha/api/siteverify";

        $mensaje_a_google = $api_verificacion."?secret=".$llave_secreta."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
        
        if ($_POST["g-recaptcha-response"]) {
            
            $datos_json = curl_init($mensaje_a_google);

            curl_setopt($datos_json, CURLOPT_RETURNTRANSFER, true);
            
            $datos_json = curl_exec($datos_json);

            $obtener_Google = json_decode($datos_json, true);
            
            $resultado_captcha = $obtener_Google['success'];
            
        } else {
            ?>

            <div class="titulo-formulario">
                <h1>¡Error!</h1>
                <p class="lead">No te olvides del captcha.</p>
            </div>

            <?php
             exit();
        }
        
        // -------------------------------------------------- FIN CAPTCHA -------------------------------------------------- //
        
        // -------------------------------------------------- BASE DE DATOS -------------------------------------------------- //
        
        // Se conecta con la base de datos.
        require 'datos_bd.php'; // Si falla el 'require' no sigue.
        $enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

        // Se comprueba la conexión.
        if (mysqli_connect_errno()) {
            printf("Fallo de conexión. Error %s.\n", mysqli_connect_error());
            exit();
        }
        
        // Se extraen las variables por POST.
        extract($_POST);

        // Se intenta evitar el SQLi.
        $nombre = mysqli_real_escape_string($enlace, $nombre);
        $apellidos = mysqli_real_escape_string($enlace, $apellidos);
        $direccion = mysqli_real_escape_string($enlace, $direccion);
        $provincia = mysqli_real_escape_string($enlace, $provincia);
        $correo = mysqli_real_escape_string($enlace, $correo);
        
        // Se encripta la contraseña.
        $clave = password_hash($clave, PASSWORD_DEFAULT);

        // Se insertan los datos.
        $insertar = "INSERT INTO USUARIO (NOMBRE, APELLIDOS, DIRECCION, PROVINCIA, CORREO, CLAVE) VALUES ('$nombre', '$apellidos', '$direccion', '$provincia', '$correo', '$clave')";

        $resultado = mysqli_query($enlace, $insertar);
        ?>
        
        <div class="mensaje">
            
        <?php
        if ($resultado) {
        ?>

            <h1>¡Enhorabuena!</h1>
            <p class="lead">Te has registrado correctamente.</p>
        
        <?php
        } else {
        ?>

            <h1>¡Lo siento!</h1>
            <p class="lead">Ha habido un fallo en el registro.</p>
            
        <?php
        }
        ?>
            
        </div>
        
        <?php
        mysqli_close($enlace);
        
        // -------------------------------------------------- FIN BASE DE DATOS -------------------------------------------------- //
        ?>
    </div>
    <!-- Fin del contenido -->

    <?php include("includes/pie.php"); ?>

    <?php include("includes/javascript.php"); ?>
    
</body>
    
</html>