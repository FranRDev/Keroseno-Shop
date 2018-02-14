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
        .error {
            color: crimson;
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
                <li class="breadcrumb-item active">Modificar</li>
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
                    <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                    <?php
                    $hay_error = true;
                    
                // Si hay conexión.
                } else {
                    
                    // Se obtienen el ID por GET.
                    $id_articulo = $_GET["id"];
                    
                    // Se obtienen el total de IDs.
                    $consulta = "SELECT COUNT(ID) FROM ARTICULO";
                    
                    $resultado = mysqli_query($enlace, $consulta);
                    
                    $fila = mysqli_fetch_row($resultado);

                    // Si el ID no es mayor que el total.
                    if ($id_articulo <= $fila[0]) {
                        
                        // Se obtienen los datos de un artículo concreto por el ID.
                        $consulta2 = "SELECT * FROM ARTICULO WHERE ID = $id_articulo";

                        $resultado2 = mysqli_query($enlace, $consulta2);
                        
                        // Se obtienen las subfamilias.
                        $consulta3 = "SELECT ID, DESCRIPCION FROM SUBFAMILIA";
                        
                        $resultado3 = mysqli_query($enlace, $consulta3);
                        
                        // Si hay resultado.
                        if ($resultado3) {
                            ?>
                            <h1>Artículos</h1>
                            <p class="lead">Modifica un artículo.</p>
                            <?php
                            $fila = mysqli_fetch_row($resultado2);
                            
                        // Si no hay resultado.
                        } else {
                            ?>
                            <h1>¡Lo sentimos! :(</h1>
                            <p class="lead">Antes tiene que crear al menos una subfamilia.</p>
                            <?php
                            $hay_error = true;
                        }
                        
                    // Si el ID es mayor que el total.
                    } else {
                        ?>
                        <h1>¡Lo sentimos! :(</h1>
                        <p class="lead">El ID del artículo no existe.</p>
                        <?php
                        $hay_error = true;
                    }
                }
                ?>
            </div>
            <!-- Fin mensaje --->
            
            <?php
            if (!$hay_error) {
                ?>
                <!-------------------------------------- Formulario para modificar un artículo ------------------------------------->
                <form id="formulario_modificar_articulo" action="./modificar_articulo.php?id=<?php echo $id_articulo ?>" method="post" enctype="multipart/form-data">
                    <!-- ID -->
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" class="form-control" name="id" id="id" value="<?php echo $id_articulo ?>" disabled>
                    </div>
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce el nombre del artículo" value="<?php echo $fila[1] ?>">
                    </div>
                    <!-- Imagen -->
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <br/>
                        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/jpg,image/jpeg,image/png,image/gif">
                    </div>
                    <!-- Existencias -->
                    <div class="form-group">
                        <label for="existencias">Existencias</label>
                        <input type="number" class="form-control" name="existencias" id="existencias" placeholder="Introduce las existencias del artículo" value="<?php echo $fila[3] ?>">
                    </div>
                    <!-- Precio -->
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" placeholder="Introduce el precio del producto" value="<?php echo $fila[4] ?>">
                    </div>
                    <!-- Descripción -->
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Introduce la descripción del artículo" value="<?php echo $fila[5] ?>">
                    </div>
                    <!-- Subfamilia -->
                    <div class="form-group">
                        <label for="subfamilia">Subfamilia</label>
                        <select name="subfamilia" id="subfamilia">
                            <?php
                            // Mientras haya filas.
                            while ($fila2 = mysqli_fetch_row($resultado3)) {
                                
                                // Si la fila es la subfamilia actual del artículo, la selecciona.
                                if ($fila[6] == $fila2[0]) {
                                    echo "<option value=".$fila2[0]." selected>$fila2[1]</option>";
                                    
                                // Si no, la añade sin más a la lista.
                                } else {
                                    echo "<option value=".$fila2[0].">$fila2[1]</option>";
                                }
                            }

                            // Se liberan los resultados de la memoria.
                            mysqli_free_result($resultado);
                            mysqli_free_result($resultado2);
                            mysqli_free_result($resultado3);

                            // Se cierra la conexión con la base de datos.
                            mysqli_close($enlace);
                            ?>
                        </select>
                    </div>
                    <!-- Reestablecer formulario -->
                    <button type="reset" class="btn btn-secondary">REESTABLECER</button>
                    <!-- Enviar formulario -->
                    <button type="submit" class="btn btn-primary">MODIFICAR</button>
                    <p><br></p>
                </form>
                <!------------------------------------ Fin formulario para modificar un artículo ----------------------------------->
                <?php
            }
            ?>
        </div>
        
        <!----------- PIE ----------->
        <!-- Está dentro de contenido para que lo pueda abarcar el boton de desplazar hacia arriba -->
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
    <script src="js/sb-admin-datatables.min.js"></script>
    <script language="javascript" type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
    
    <!-- Validación de formulario con JQuery Validate -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#formulario_modificar_articulo").validate({
                rules: {
                    id: {
                    },
                    nombre: {
                        required: true,
                        minlength: 1,
                        maxlength: 200
                    },
                    imagen: {
                        required: true,
                        accept: "image/*"
                    },
                    existencias: {
                        required: true,
                        minlength: 1,
                        maxlength: 6,
                        number: true
                    },
                    precio: {
                        required: true,
                        minlength: 1,
                        maxlength: 6,
                        number: true
                    },
                    descripcion: {
                        required: true,
                        minlength: 1,
                        maxlength: 1000
                    },
                    subfamilia: {
                        required: true,
                        minlength: 1,
                        maxlength: 11,
                        number: true
                    }
                },
                messages: {
                    nombre: {
                        required: "Debe introducir el nombre del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    imagen: {
                        required: "Debe seleccionar una imagen del artículo.",
                        accept: "El archivo debe ser una imagen."
                    },
                    existencias: {
                        required: "Debe introducir el número de existencias del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres."),
                        number: "El valor introducido debe ser un número."
                    },
                    precio: {
                        required: "Debe introducir el precio del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres."),
                        number: "El valor introducido debe ser un número."
                    },
                    descripcion: {
                        required: "Debe introducir la descripción del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    subfamilia: {
                        required: "Debe seleccionar una subfamilia.",
                        minlength: jQuery.validator.format(" Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format(" No introduzcas más de {0} caracteres.")
                    }
                }
            });
        });
    </script>
    
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