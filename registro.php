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

    <!-- Contendor -->
    <div class="container">
        <div class="mensaje">
            <h1>Regístrate</h1>
            <p class="lead">Solo necesitas rellenar los siguiente campos.</p>
        </div>
        
        <!-- Formulario de registro -->
        <form id="formulario_registro" action="./insertar_usuario.php" method="post" enctype="multipart/form-data">
            
            <!-- Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce tu nombre">
            </div>
            
            <!-- Apellidos -->
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Introduce tus apellidos">
            </div>
            
            <!-- Dirección -->
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Introduce tu dirección">
            </div>
            
            <!-- Provincia -->
            <div class="form-group">
                <label for="provincia">Provincia</label>
                <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Introduce tu provincia">
            </div>
            
            <!-- Correo electrónico -->
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" class="form-control" name="correo" id="correo" placeholder="Introduce tu correo electrónico">
            </div>
            
            <!-- Contraseña -->
            <div class="form-group">
                <label for="clave">Contraseña</label>
                <input type="password" class="form-control" name="clave" id="clave" placeholder="Introduce la contraseña">
            </div>
            
            <div class="form-group">
                <input type="password" class="form-control" name="clave2" id="clave2" placeholder="Repite la contraseña">
            </div>
            
            <!-- Captcha -->
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LcI0jcUAAAAAEIgPmPBkjMWFN61D3Wm7heuJCjU"></div>
            </div>
            
            <!-- Limpiar formulario -->
            <button type="reset" class="btn btn-secondary">LIMPIAR</button>
            
            <!-- Enviar formulario -->
            <button type="submit" class="btn btn-primary">REGISTRARME</button>
            
            <p><br></p>
        </form>
        <!-- Formulario de registro -->
        
    </div>
    <!-- Fin del contenedor -->
    
    <?php include("includes/pie.php"); ?>
    
    <?php include("includes/javascript.php"); ?>

    <script language="javascript" type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
    
    <!-- Validacion de formulario con JQuery Validate -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#formulario_registro").validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 1,
                        maxlength: 100
                    },
                    apellidos: {
                        required: true,
                        minlength: 1,
                        maxlength: 200
                    },
                    direccion: {
                        required: true,
                        minlength: 1,
                        maxlength: 200
                    },
                    provincia: {
                        required: true,
                        minlength: 1,
                        maxlength: 300
                    },
                    correo: {
                        required: true,
                        email: true
                    },
                    clave: {
                        required: true,
                        minlength: 8,
                        maxlength: 50
                    },
                    clave2: {
                        required: true,
                        minlength: 8,
                        maxlength: 50,
                        equalTo: "#clave"
                    }
                },
                messages: {
                    nombre: {
                        required: "Debes introducir tu nombre.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    apellidos: {
                        required: "Debes introducir tus apellidos.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    direccion: {
                        required: "Debes introducir tu dirección.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    provincia: {
                        required: "Debes introducir tu provincia.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    correo: {
                        required: "Debes introducir un correo electrónico.",
                        email: "Debes introducir un correo electrónico válido."
                    },
                    clave: {
                        required: "Debes introducir una contraseña.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    clave2: {
                        required: "Debes repetir la contraseña.",
                        equalTo: "La contraseña no coincide.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    }
                }
            });
        });
    </script>
    
</body>

</html>