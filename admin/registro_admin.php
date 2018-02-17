<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: formulario_identificacion.php');
    exit();
}
?>
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
        <?php
        $seccion = $_GET["sec"];
        
        #=================================================================================================================
        # 0 --> FORMULARIO REGISTRO ADMIN
        #=================================================================================================================
        if ($seccion == 0) {
            ?>
            <div class="card card-register mx-auto mt-5 mb-5">
            
                <div class="card-header header-center">
                    <h4>Keroseno Shop</h4>
                    <h3>REGISTRAR ADMIN</h3>
                </div>

                <div class="card-body">
                    <form id="registro_admin" action="registro_admin.php?sec=1" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" aria-describedby="nameHelp" placeholder="Introduce el nombre">
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo electrónico</label>
                            <input class="form-control" id="correo" name="correo" type="email" aria-describedby="emailHelp" placeholder="Introduce el correo electrónico">
                        </div>

                        <div class="form-group">
                            <div class="form-row">

                                <div class="col-md-6">
                                    <label for="clave">Contraseña</label>
                                    <input class="form-control" id="clave" name="clave" type="password" placeholder="Introduce la contraseña">
                                </div>

                                <div class="col-md-6">
                                    <label for="clave2">Confirmar contraseña</label>
                                    <input class="form-control" id="clave2" name="clave2" type="password" placeholder="Repite la contraseña">
                                </div>

                            </div>
                        </div>
                        
                        <!-- Limpiar formulario -->
                        <button type="reset" class="btn btn-secondary btn-block">LIMPIAR</button>
                        <!-- Enviar formulario -->
                        <button type="submit" class="btn btn-primary btn-block">REGISTRAR ADMIN</button>
                        
                    </form>
                    
                    <div class="text-center">
                        <a class="d-block small mt-3" href="index.php">Volver al panel de administración</a>
                    </div>
                    
                </div>
            </div>
            <?php
            
        #=================================================================================================================
        # 1 --> TRATAMIENTO FORMULARIO REGISTRO ADMIN
        #=================================================================================================================
        } elseif ($seccion == 1) {
            include '../deshabilitar_mensajes_error.php'; // Se deshabilitan los mensajes de error.
            
            // Se conecta con la base de datos.
            require '../datos_bd.php'; // Si falla el 'require' no sigue.
            $enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

            // Se comprueba la conexión.
            if (mysqli_connect_errno()) {
                echo "<script language=\"javascript\">window.location.href=\"index.php?var=3\";</script>";
                exit();
                
            } else {
                // Se extraen las variables por POST.
                extract($_POST);

                // Se intenta evitar el SQLi.
                $nombre = mysqli_real_escape_string($enlace, $nombre);
                $correo = mysqli_real_escape_string($enlace, $correo);
                $clave = mysqli_real_escape_string($enlace, $clave);
                
                if (empty($nombre) || empty($correo) || empty($clave)) {
                    mysqli_close($enlace); // Se cierra la conexión con la BD.
                    echo "<script language=\"javascript\">window.location.href=\"index.php?var=4\";</script>";
                    exit();
                }

                // Se encripta la contraseña.
                $clave = password_hash($clave, PASSWORD_DEFAULT);

                // Se insertan los datos.
                $insertar = "INSERT INTO ADMIN (NOMBRE, CORREO, CLAVE) VALUES ('$nombre', '$correo', '$clave')";
                $resultado = mysqli_query($enlace, $insertar);
                
                if ($resultado) {
                    mysqli_close($enlace); // Se cierra la conexión con la BD.
                    echo "<script language=\"javascript\">window.location.href=\"index.php?var=1\";</script>";
                    exit();
                    
                } else {
                    mysqli_close($enlace); // Se cierra la conexión con la BD.
                    echo "<script language=\"javascript\">window.location.href=\"index.php?var=2\";</script>";
                    exit();
                }
            }
            
        #=================================================================================================================
        # DEFAULT --> TODO LO DEMÁS, SALE
        #=================================================================================================================
        } else {
            echo "<script language=\"javascript\">window.location.href=\"index.php?var=4\";</script>";
            exit();
        }
        ?>
        
    </div>
    
    <?php include("includes/javascript.php"); ?>
    
    <script language="javascript" type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#registro_admin").validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 1,
                        maxlength: 200
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
                        required: "Debe introducir el nombre del administrador.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    correo: {
                        required: "Debe introducir un correo electrónico.",
                        email: "Debe introducir un correo electrónico válido."
                    },
                    clave: {
                        required: "Debe introducir una contraseña.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    clave2: {
                        required: "Debe repetir la contraseña contraseña.",
                        equalTo: "La contraseña no coincide.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas mas de {0} caracteres.")
                    }
                }
            });
        });
    </script>

</body>

</html>