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
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
    <?php include("includes/navegacion.php"); ?>
    
    <!------- CONTENIDO -------->
    <div class="content-wrapper">
        <div class="container-fluid">
            
            <!------- Ruta ------->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Inicio</li>
            </ol>
            <!----- Fin ruta ----->
            
            <!---- Mensaje ----->
            <?php
            if ($_GET["var"] == 1) {
                ?>
                <div class="alert alert-success">
                    <h2>¡Enhorabuena! 😢</h2>
                    <p>Has registrado un administrador correctamente.</p>
                </div>
                <?php
                
            } elseif ($_GET["var"] == 2) {
                ?>
                <div class="alert alert-danger">
                    <h2>¡Lo siento! 😢</h2>
                    <p>Ha habido un fallo en el registro.</p>
                </div>
                <?php
                
            } elseif ($_GET["var"] == 3) {
                ?>
                <div class="alert alert-danger">
                    <h2>¡Lo siento! 😢</h2>
                    <p>Parece que hay un error de conexión con la base de datos.</p>
                </div>
                <?php
                
            } elseif ($_GET["var"] == 4) {
                ?>
                <div class="alert alert-warning">
                    <h2>¡Opsss! 😐</h2>
                    <p>Parece que estás intentando acceder a una página que no existe.</p>
                    <p>¿O eso ya lo sabías, pillín(a)? 😏</p>
                </div>
                <?php
                
            } else {
                ?>
                <div class="mensaje_index">
                    <h1>¡Bienvenido administrador(a)!</h1>
                    <p class="lead">Soy tu panel de administración, no la líes mucho 😄</p>
                </div>
                <?php
            }
            ?>
            <!-- Fin mensaje --->
            
        </div>
        
        <?php include("includes/pie.php"); ?>
        
        <?php include("includes/desconexion.php"); ?>
        
    </div>
    <!----- FIN CONTENIDO ------>
    
    <?php include("includes/javascript.php"); ?>
    
</body>

</html>