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
                <h3>RECORDAR CLAVE</h3>
                Función disponible para la próxima versión 😁
            </div>
            
            <div class="card-body">
                <div class="text-center mt-2 mb-4">
                    <h4>¿Has olvidado la contraseña?</h4>
                    <p>Introduce tu correo electrónico y te enviaremos instrucciones sobre cómo puedes reestablecerla.</p>
                </div>
                
                <form>
                    <div class="form-group">
                        <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Introduce el correo electrónico">
                    </div>
                    <a class="btn btn-primary btn-block" href="#">REESTABLECER CONTRASEÑA</a>
                </form>
                
                <div class="text-center">
                    <a class="d-block small mt-3" href="formulario_identificacion.php">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("includes/javascript.php"); ?>
    
</body>

</html>