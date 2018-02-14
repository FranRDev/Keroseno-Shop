<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Francisco Rodríguez García">
    <link rel="icon" href="">

    <title>Keroseno Shop</title>
    
    <!-- API Google reCAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Núcleo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- CSS personalizado para esta página -->
    <style type="text/css">
        body {
            padding-top: 5rem;
        }
        .titulo-formulario {
            padding: 2rem 1.5rem;
            text-align: center;
        }
    </style>

</head>

<body>
    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Keroseno Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Enlace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Deshabilitado</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Accion</a>
                        <a class="dropdown-item" href="#">Otra accion</a>
                        <a class="dropdown-item" href="#">Alguna otra aqui</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>

    <!-- CONTENEDOR -->
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
        
        <div class="titulo-formulario">
            
        <?php
        if ($resultado) {
        ?>

            <h1>¡Enhorabuena!</h1>
            <p class="lead">Te has registrado correctamente.</p>
        
        <?php
        } else {
        ?>

            <h1>¡Lo sentimos!</h1>
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
    <!-- FIN DEL CONTENEDOR -->

    <!-- Núcleo JavaScript de Bootstrap ================================================== -->
    <!-- Colocado al final del documento para que las páginas se carguen más rápido -->
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- JQuery Validation -->
    <script language="javascript" type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- IE10 truco de viewport para error en Surface/escritorio Windows 8 -->
    <script>
        (function() {
            'use strict'

            if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var msViewportStyle = document.createElement('style')
                msViewportStyle.appendChild(
                    document.createTextNode(
                        '@-ms-viewport{width:auto!important}'
                    )
                )
                document.head.appendChild(msViewportStyle)
            }
        }())
    </script>
</body>
</html>