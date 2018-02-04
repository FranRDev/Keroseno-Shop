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
            <?php
            $seccion = $_GET["sec"];
            switch ($seccion) {
                case 0:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./index.html">Inicio</a></li>
                        <li class="breadcrumb-item">Artículos</li>
                        <li class="breadcrumb-item active">Listar</li>
                    </ol>
                    <!----- Fin ruta ----->

                    <!---- Mensaje ----->
                    <div class="mensaje">
                        <?php
                        // Se deshabilitan los mensajes de error.
                        include '../deshabilitar_mensajes_error.php';

                        // Se establece la conexión con la base de datos.
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
                            ?>
                            <h1>Artículos</h1>
                            <p class="lead">Listado de artículos.</p>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- Fin mensaje --->

                    <?php
                    if (!$hay_error) {
                        ?>
                        <!------ Tabla ------->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-table"></i> Artículos</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Imagen</th>
                                                <th>Existencias</th>
                                                <th>Precio</th>
                                                <th>Descripción</th>
                                                <th>Subfamilia</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Imagen</th>
                                                <th>Existencias</th>
                                                <th>Precio</th>
                                                <th>Descripción</th>
                                                <th>Subfamilia</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            // Se obtienen todos los artículos.
                                            $consulta = "SELECT * FROM ARTICULO";
                                            $resultado = mysqli_query($enlace, $consulta);

                                            // Si hay resultado.
                                            if ($resultado) {

                                                // Mientras haya filas.
                                                while ($fila = mysqli_fetch_row($resultado)) {

                                                    // Se obtiene el nombre de la subfamilia.
                                                    $consulta2 = "SELECT DESCRIPCION FROM SUBFAMILIA WHERE ID = $fila[6]";
                                                    $resultado2 = mysqli_query($enlace, $consulta2);
                                                    $fila2 = mysqli_fetch_row($resultado2);

                                                    // Se imprime la fila.
                                                    echo "
                                                        <tr>
                                                            <td>".$fila[0]."</td>
                                                            <td>".$fila[1]."</td>
                                                            <td><img src = ".'"./imagenes_articulos/'.$fila[2].'"'." alt = ".'"'.$fila[2].'"'." height = ".'"'.'100'.'"'." width = ".'"'.'auto'.'"'."></td>
                                                            <td>".$fila[3]."</td>
                                                            <td>".$fila[4]."</td>
                                                            <td>".$fila[5]."</td>
                                                            <td>".$fila2[0]."</td>
                                                        </tr>";
                                                }

                                                // Se liberan los resultados de la memoria.
                                                mysqli_free_result($resultado);
                                                mysqli_free_result($resultado2);
                                            }

                                            // Se cierra la conexión con la base de datos.
                                            mysqli_close($enlace);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!---- Fin tabla ----->
                        <?php
                    }
                    ?>
                    </div>
                    <?php
                    break;
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    break;
                case 4:
                    break;
                case 5:
                    break;
                case 6:
                    break;
                default:
                    break;
            }
            ?>
        </div>
        
        <?php include("includes/pie.php"); ?>
        <?php include("includes/desconexion.php"); ?>
        
    </div>
    <!----- FIN CONTENIDO ------>
    
    <?php include("includes/javascript.php"); ?>
    
</body>

</html>