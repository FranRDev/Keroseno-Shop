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
</head>

<body>
    <?php include("includes/navegacion.php"); ?>

    <!-- Contendor -->
    <div class="container">
        <div class="mensaje">
            <h1>Iniciar sesión</h1>
        </div>
        
        <!-- Formulario de registro -->
        <form id="formulario_identificacion" action="identificacion.php" method="post" enctype="multipart/form-data">
            
            <?php
            if ($_GET["var"] == 1) {
                ?>
                <div class="alert alert-danger">
                    No existe ningún usuario con ese correo electrónico. 😕
                </div>
                <?php

            } elseif ($_GET["var"] == 2) {
                ?>
                <div class="alert alert-danger">
                    La contraseña es incorrecta. 😕
                </div>
                <?php
            }
            ?>
            
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
            
            <!-- Limpiar formulario -->
            <button type="reset" class="btn btn-secondary">LIMPIAR</button>
            
            <!-- Enviar formulario -->
            <button type="submit" class="btn btn-primary">INICIAR SESIÓN</button>
            
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
            $("#formulario_identificacion").validate({
                rules: {
                    correo: {
                        required: true,
                        email: true
                    },
                    clave: {
                        required: true,
                        minlength: 8,
                        maxlength: 50
                    }
                },
                messages: {
                    correo: {
                        required: "Debes introducir un correo electrónico.",
                        email: "Debes introducir un correo electrónico válido."
                    },
                    clave: {
                        required: "Debes introducir una contraseña.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    }
                }
            });
        });
    </script>
    
</body>

</html>