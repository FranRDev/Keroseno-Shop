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
        <div class="card card-register mx-auto mt-5">
            
            <div class="card-header header-center">
                <h4>Keroseno Shop</h4>
                <h3>RREGISTRAR ADMIN</h3>
            </div>
            
            <div class="card-body">
                <form>
                    
                    <div class="form-group">
                        <label for="exampleInputName">Nombre</label>
                        <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Introduce el nombre">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo electrónico</label>
                        <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Introduce el correo electrónico">
                    </div>
                    
                    <div class="form-group">
                        <div class="form-row">
                            
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Introduce la contraseña">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="exampleConfirmPassword">Confirmar contraseña</label>
                                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Repite la contraseña">
                            </div>
                            
                        </div>
                    </div>
                    <a class="btn btn-primary btn-block" href="login.html">REGISTRARSE</a>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="index.php">Volver al panel de administración</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("includes/javascript.php"); ?>

</body>

</html>