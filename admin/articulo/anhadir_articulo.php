<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metadatos -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panel de administración de Keroseno Shop">
    <meta name="author" content="Francisco Rodríguez García">
    
    <!-- Título y favicon -->
    <title>Admin Keroseno Shop</title>
    <link rel="icon" href="">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 5rem;
        }
        .mensaje {
            padding: 2rem 1.5rem;
            text-align: center;
        }
    </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
    <!---------------------------- BARRA DE NAVEGACIÓN ---------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="./index.html">Admin Keroseno Shop</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            
            <!-------------------- Barra vertical --------------------->
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                
                <!----------------------------------- Artículos ------------------------------------>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-th-list"></i>
                        <span class="nav-link-text">Artículos</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="./listar_articulos.php"><i class="fa fa-fw fa-list"></i>Listar</a>
                        </li>
                        <li>
                            <a href="./listar_articulos_pdf.php"><i class="fa fa-fw fa-file-pdf-o"></i>Listar PDF</a>
                        </li>
                        <li>
                            <a href="./formulario_anhadir_articulo.php"><i class="fa fa-fw fa-plus"></i>Añadir</a>
                        </li>
                        <li>
                            <a href="./lista_modificar_articulos.php"><i class="fa fa-fw fa-edit"></i>Modificar</a>
                        </li>
                    </ul>
                </li>
                <!--------------------------------- Fin artículos ---------------------------------->
                
                <!------------------------------------ Familias --------------------------------------->
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-tag"></i>
                        <span class="nav-link-text">Familias</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <li>
                            <a href="./listar_familias.php"><i class="fa fa-fw fa-list"></i>Listar</a>
                        </li>
                        <li>
                            <a href="./listar_familias_pdf.php"><i class="fa fa-fw fa-file-pdf-o"></i>Listar PDF</a>
                        </li>
                        <li>
                            <a href="./formulario_anhadir_familia.php"><i class="fa fa-fw fa-plus"></i>Añadir</a>
                        </li>
                        <li>
                            <a href="./lista_modificar_familias.php"><i class="fa fa-fw fa-edit"></i>Modificar</a>
                        </li>
                    </ul>
                </li>
                <!---------------------------------- Fin familias ------------------------------------->
                
                <!---------------------------------- Subfamilias ------------------------------------>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-tags"></i>
                        <span class="nav-link-text">Subfamilias</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseMulti">
                        <li>
                            <a href="./listar_subfamilias.php"><i class="fa fa-fw fa-list"></i>Listar</a>
                        </li>
                        <li>
                            <a href="./listar_subfamilias_pdf.php"><i class="fa fa-fw fa-file-pdf-o"></i>Listar PDF</a>
                        </li>
                        <li>
                            <a href="./formulario_anhadir_subfamilia.php"><i class="fa fa-fw fa-plus"></i>Añadir</a>
                        </li>
                        <li>
                            <a href="./lista_modificar_subfamilias.php"><i class="fa fa-fw fa-edit"></i>Modificar</a>
                        </li>
                    </ul>
                </li>
                <!-------------------------------- Fin subfamilias ---------------------------------->
                
                <!----------------------------- Visitar página ------------------------------->
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                    <a class="nav-link" href="../index.html">
                        <i class="fa fa-fw fa-globe"></i>
                        <span class="nav-link-text">Visitar página</span>
                    </a>
                </li>
                <!--------------------------- Fin visitar página ----------------------------->
                
            </ul>
            <!------------------ Fin barra vertical ------------------->
            
            <!---- Botón cerrar/abrir menú vertical ---->
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <!-- Fin botón cerrar/abrir menú vertical -->
            
            <ul class="navbar-nav ml-auto">
                
                <!---- Botón buscar ---->
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>
                <!-- Fin botón buscar -->
                
                <!---- Botón desconectarse ---->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Desconectarse</a>
                </li>
                <!-- Fin botón desconectarse -->
                
            </ul>
        </div>
    </nav>
    <!-------------------------- FIN BARRA DE NAVEGACIÓN -------------------------->
    
    <!------- CONTENIDO -------->
    <div class="content-wrapper">
        <div class="container-fluid">
            
            <!------- Ruta ------->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.html">Inicio</a></li>
                <li class="breadcrumb-item">Artículos</li>
                <li class="breadcrumb-item active">Añadir</li>
            </ol>
            <!----- Fin ruta ----->
            
            <!---- Mensaje ----->
            <div class="mensaje">
                <?php
                // Se deshabilitan los mensajes de error.
                include '../deshabilitar_mensajes_error.php';

                // Se conecta con la base de datos.
                include '../datos_bd.php';
                $enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

                // Si hay error de conexión.
                if (mysqli_connect_errno()) {
                    ?>
                    <h1>¡Lo sentimos! :(</h1>
                    <p class="lead">Parece ser que hay un error de conexión con la base de datos.</p>
                    <?php
                
                // Si hay conexión.
                } else {
                    
                    // Se extraen las variables por POST.
                    extract($_POST);

                    // Si no se ha seleccionado la imagen.
                    if (!isset($_FILES['imagen'])) {
                        ?>
                        <h1>¡Error! :(</h1>
                        <p class="lead">No has seleccionado ninguna imagen.</p>
                        <?php
                        
                    // Si se ha seleccionado la imagen.
                    } else {

                        // Se guarda el nombre original de la imagen.
                        $nombre_original = $_FILES['imagen']['name'];
                        
                        // Se guarda el directorio al que se subirá la imagen.
                        $directorio_subida = $_SERVER['DOCUMENT_ROOT'].'/admin/imagenes_articulos/';
                        
                        // Se guarda la fecha y hora actual.
                        $fecha_actual = date('YmdHis');
                        
                        // Se guarda el nuevo nombre de la imagen.
                        $nombre_imagen = $fecha_actual."_".$nombre_original;
                        
                        // Se guarda la ruta completa donde será subida la imagen.
                        $ruta_imagen = $directorio_subida.$nombre_imagen;
                        
                        $resultado_subida = move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen);
                        
                        // Si la imagen no se sube al servidor.
                        if (!$resultado_subida) {
                            ?>
                            <h1>¡Lo sentimos! :(</h1>
                            <p class="lead">No se ha podido subir la imagen al servidor.</p>
                            <p class="lead">Asegúrate de que no tenga un nombre demasiado largo o pese demasiado.</p>
                            <?php
                            
                        // Si la imagen se sube al servidor.
                        } else {
                            
                            // Se intenta evitar el SQLi.
                            $nombre = mysqli_real_escape_string($enlace, $nombre);
                            $imagen = mysqli_real_escape_string($enlace, $nombre_imagen);
                            $existencias = mysqli_real_escape_string($enlace, $existencias);
                            $precio = mysqli_real_escape_string($enlace, $precio);
                            $descripcion = mysqli_real_escape_string($enlace, $descripcion);
                            $subfamilia = mysqli_real_escape_string($enlace, $subfamilia);

                            // Se insertan los datos.
                            $insertar = "INSERT INTO ARTICULO (NOMBRE, FOTO, STOCK, PRECIO, DESCRIPCION, ID_SUBFAMILIA) VALUES ('$nombre', '$imagen', $existencias, $precio, '$descripcion', $subfamilia)";

                            // Se obtiene el resultado de la consulta.
                            $resultado = mysqli_query($enlace, $insertar);

                            // Si hay resultado.
                            if ($resultado) {
                                ?>
                                <h1>¡Enhorabuena! :)</h1>
                                <p class="lead">Artículo añadido con éxito.</p>
                                <?php

                            // Si no hay resultado.
                            } else {
                            ?>
                                <h1>¡Lo sentimos! :(</h1>
                                <p class="lead">Ha habido un fallo al añadir el artículo.</p>
                            <?php
                            }
                            
                            // Se libera el resultado de la memoria.
                            mysqli_free_result($resultado);

                            // Se cierra la conexión con la base de datos.
                            mysqli_close($enlace);
                        }
                    }
                }
                ?>
            </div>
            <!-- Fin mensaje --->
        </div>
        
        <!----------- PIE ----------->
        <!-- Está dentro de contenido para que lo pueda abarcar el botón de desplazar hacia arriba -->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Keroseno Shop 2017</small>
                </div>
            </div>
        </footer>
        <!--------- FIN PIE --------->
        
        <!----------- Desplazar hacia arriba ------------>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--------- Fin desplazar hacia arriba ---------->
        
        <!------------------------------------------------------ DESCONEXIÓN ------------------------------------------------------->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Vas a salir? :(</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecciona "Desconectar" para cerrar la sesión actual.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="formulario_identificacion.html">Desconectar</a>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------------------------------------- FIN DESCONEXIÓN ----------------------------------------------------->
    </div>
    <!----- FIN CONTENIDO ------>
    
    <!-- JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin.min.js"></script>
    
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