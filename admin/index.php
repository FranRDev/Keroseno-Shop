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
            <div class="mensaje_index">
                <h1>¡Bienvenido administrador/a!</h1>
                <p class="lead">Soy tu panel de administración, no la líes mucho :)</p>
            </div>
            <!-- Fin mensaje --->
            
        </div>
        
        <?php include("includes/pie.php"); ?>
        
        <?php include("includes/desconexion.php"); ?>
        
    </div>
    <!----- FIN CONTENIDO ------>
    
    <?php include("includes/javascript.php"); ?>
    
</body>

</html>