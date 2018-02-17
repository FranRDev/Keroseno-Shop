<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/cabecera.php"); ?>
    
    <style>
        body {
            background-image: url("res/img/background_admin.jpg");
            background-repeat: no-repeat;
            background-position: top;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            
            <div class="card-header header-center">
                <h4>Keroseno Shop</h4>
                <h3>ADMIN PANEL</h3>
            </div>
            
            <div class="card-body">
                
                <form id="formulario_inicio_sesion" action="identificacion.php" method="post" enctype="multipart/form-data">
                    
                    <?php
                    if ($_GET["var"] == 1) {
                        ?>
                        <div class="alert alert-danger">
                            No existe ningún admin con ese correo electrónico. 😕
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
                    
                    <div class="form-group">
                        <label for="correo">Correo electrónico</label>
                        <input class="form-control" name="correo" id="correo" type="email" aria-describedby="emailHelp" placeholder="Introduce el correo electrónico">
                    </div>
                    
                    <div class="form-group">
                        <label for="clave">Contraseña</label>
                        <input class="form-control" name="clave" id="clave" type="password" placeholder="Introduce la contraseña">
                    </div>
                    
                    <!--<div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Recordar contraseña</label>
                        </div>
                    </div>-->
                    
                    <!-- Limpiar formulario -->
                    <button type="reset" class="btn btn-secondary btn-block">LIMPIAR</button>
                    <!-- Enviar formulario -->
                    <button type="submit" class="btn btn-primary btn-block">INICIAR SESIÓN</button>
                </form>
                
                <div class="text-center">
                    <a class="d-block small mt-3" href="clave_olvidada.php">¿Has olvidado la contraseña?</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("includes/javascript.php"); ?>
    
    <script language="javascript" type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#formulario_inicio_sesion").validate({
                rules: {
                    correo: {
                        required: true,
                        email: true
                    },
                    clave: {
                        required: true,
                        minlength: 8,
                        maxlength: 50
                    },
                },
                messages: {
                    correo: {
                        required: "Debe introducir un correo electrónico.",
                        email: "Debe introducir un correo electrónico válido."
                    },
                    clave: {
                        required: "Debe introducir una contraseña.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                }
            });
        });
    </script>

</body>

</html>