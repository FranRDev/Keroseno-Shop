<?php
# CONSTANTES #
define("INDEX","index.php");
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
            <?php
            if (isset($_GET["sec"])) {
                $seccion = $_GET["sec"];
                
            } elseif (isset($_POST["sec"])) {
                $seccion = $_POST["sec"];
                
            } else {
                $seccion = -1;
            }
            
            switch ($seccion) {
                
                #=================================================================================================================
                # 0 --> LISTAR ARTÍCULOS
                #=================================================================================================================
                case 0:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
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
                            <h1>¡Lo siento! 😢</h1>
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
                                                            <td><img src = ".'"imagenes_articulos/'.$fila[2].'"'." alt = ".'"'.$fila[2].'"'." height = ".'"'.'100'.'"'." width = ".'"'.'auto'.'"'."></td>
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
                    <?php
                    break;
                    
                #=================================================================================================================
                # 1 --> AÑADIR ARTÍCULO: FORMULARIO
                #=================================================================================================================
                case 1:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
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

                        // Si falla la conexión.
                        if (mysqli_connect_errno()) {
                            ?>
                            <h1>¡Lo siento! 😢</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php
                            $hay_error = true;

                        // Si hay conexión.
                        } else {
                            // Se obtienen el ID y la descripción de las subfamilias.
                            $consulta = "SELECT ID, DESCRIPCION FROM SUBFAMILIA";

                            $resultado = mysqli_query($enlace, $consulta);

                            // Si hay resultado.
                            if ($resultado) {
                                ?>
                                <h1>Artículos</h1>
                                <p class="lead">Añade un artículo.</p>
                                <?php

                            // Si no hay resultado.
                            } else {
                                ?>
                                <h1>¡Lo siento! 😢</h1>
                                <p class="lead">Pero antes tienes que crear al menos una subfamilia.</p>
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
                        <!-------------------------------------- Formulario para añadir un artículo -------------------------------------->
                        <form id="formulario_anhadir_articulo" action="articulo.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="sec" value="2" />
                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce el nombre del artículo">
                            </div>
                            <!-- Imagen -->
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                            </div>
                            <!-- Existencias -->
                            <div class="form-group">
                                <label for="existencias">Existencias</label>
                                <input type="number" class="form-control" name="existencias" id="existencias" placeholder="Introduce las existencias del artículo">
                            </div>
                            <!-- Precio -->
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control" name="precio" id="precio" placeholder="Introduce el precio del artículo">
                            </div>
                            <!-- Descripción -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Introduce la descripción del artículo">
                            </div>
                            <!-- Subfamilia -->
                            <div class="form-group">
                                <label for="subfamilia">Subfamilia</label>
                                <select name="subfamilia" id="subfamilia">
                                    <?php
                                    // Mientras haya filas.
                                    while ($fila = mysqli_fetch_row($resultado)) {

                                        // Se imprime la fila.
                                        echo "<option value=",$fila[0],">$fila[1]</option>";
                                    }

                                    // Libera el resultado de la memoria.
                                    mysqli_free_result($resultado);

                                    // Se cierra la conexión con la base de datos.
                                    mysqli_close($enlace);
                                    ?>
                                </select>
                            </div>
                            <!-- Limpiar formulario -->
                            <button type="reset" class="btn btn-secondary">LIMPIAR</button>
                            <!-- Enviar formulario -->
                            <button type="submit" class="btn btn-primary">AÑADIR</button>
                            <p><br></p>
                        </form>
                        <!------------------------------------ Fin formulario para añadir un artículo ------------------------------------>
                        <?php
                    }
                    ?>
                    <?php
                    break;
                    
                #=================================================================================================================
                # 2 --> AÑADIR ARTÍCULO: TRATAMIENTO DE FORMULARIO
                #=================================================================================================================
                case 2:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
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
                            <h1>¡Lo siento! 😢</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php

                        // Si hay conexión.
                        } else {

                            // Se extraen las variables por POST.
                            extract($_POST);

                            // Si no se ha seleccionado la imagen.
                            if (!isset($_FILES['imagen'])) {
                                ?>
                                <h1>¡Lo siento! 😢</h1>
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
                                    <h1>¡Lo siento! 😢</h1>
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
                                        <h1>¡Enhorabuena! 😄</h1>
                                        <p class="lead">Artículo añadido con éxito.</p>
                                        <?php

                                    // Si no hay resultado.
                                    } else {
                                    ?>
                                        <h1>¡Lo siento! 😢</h1>
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
                    <?php
                    break;
                    
                #=================================================================================================================
                # 3 --> MODIFICAR ARTÍCULO: LISTAR
                #=================================================================================================================
                case 3:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Artículos</li>
                        <li class="breadcrumb-item active">Modificar</li>
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

                        // Se comprueba la conexión.
                        if (mysqli_connect_errno()) {
                            ?>
                            <h1>¡Lo siento! 😢</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php
                            $hay_error = true;

                        } else {
                            ?>
                            <h1>Artículos</h1>
                            <p class="lead">Listado de artículos para modificar.</p>
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
                                                <th>Modificación</th>
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
                                                <th>Modificación</th>
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
                                                            <td><img src = ".'"imagenes_articulos/'.$fila[2].'"'." alt = ".'"'.$fila[2].'"'." height = ".'"'.'100'.'"'." width = ".'"'.'auto'.'"'."></td>
                                                            <td>".$fila[3]."</td>
                                                            <td>".$fila[4]."</td>
                                                            <td>".$fila[5]."</td>
                                                            <td>".$fila2[0]."</td>
                                                            <td><a href='articulo.php?sec=4&id=".$fila[0]."'>Modificar</a></td>
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
                    <?php
                    break;
                    
                #=================================================================================================================
                # 4 --> MODIFICAR ARTÍCULO: FORMULARIO
                #=================================================================================================================
                case 4:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
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
                            <h1>¡Lo siento! 😢</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php
                            $hay_error = true;

                        // Si hay conexión.
                        } else {

                            // Se obtienen el ID por GET.
                            $id_articulo = $_GET["id"];

                            // Se obtienen el total de IDs.
                            $consulta = "SELECT COUNT(ID) FROM ARTICULO";
                            // TODO: Obtener si el ID existe o no.

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
                                    <h1>¡Lo siento! 😢</h1>
                                    <p class="lead">Antes tienes que crear al menos una subfamilia.</p>
                                    <?php
                                    $hay_error = true;
                                }

                            // Si el ID es mayor que el total.
                            } else {
                                ?>
                                <h1>¡Lo siento! 😢</h1>
                                <p class="lead">Pero el ID del artículo no existe.</p>
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
                        <form id="formulario_modificar_articulo" action="articulo.php?sec=5&id=<?php echo $id_articulo ?>" method="post" enctype="multipart/form-data">
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
                    <?php
                    break;
                    
                #=================================================================================================================
                # 5 --> MODIFICAR ARTÍCULO: TRATAMIENTO DE FORMULARIO
                #=================================================================================================================
                case 5:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
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
                            <h1>¡Lo siento! 😢</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php

                        // Si hay conexión.
                        } else {

                            // Se extraen las variables por POST.
                            extract($_POST);

                            // Si no se ha seleccionado la imagen.
                            if (!isset($_FILES['imagen'])) {
                                ?>
                                <h1>¡Lo siento! 😢</h1>
                                <p class="lead">Pero no has seleccionado ninguna imagen.</p>
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
                                    <h1>¡Lo siento! 😢</h1>
                                    <p class="lead">No se ha podido subir la imagen al servidor.</p>
                                    <p class="lead">Asegúrate de que no tenga un nombre demasiado largo o pese demasiado.</p>
                                    <?php

                                // Si la imagen se sube al servidor.
                                } else {

                                    // Se obtienen el ID por GET.
                                    $id_articulo = $_GET["id"];

                                    // Se intenta evitar el SQLi.
                                    $nombre = mysqli_real_escape_string($enlace, $nombre);
                                    $imagen = mysqli_real_escape_string($enlace, $nombre_imagen);
                                    $existencias = mysqli_real_escape_string($enlace, $existencias);
                                    $precio = mysqli_real_escape_string($enlace, $precio);
                                    $descripcion = mysqli_real_escape_string($enlace, $descripcion);
                                    $subfamilia = mysqli_real_escape_string($enlace, $subfamilia);

                                    // Se insertan los datos.
                                    $actualizar = "UPDATE ARTICULO SET NOMBRE = '$nombre', FOTO = '$imagen', STOCK = $existencias, PRECIO = $precio, DESCRIPCION = '$descripcion', ID_SUBFAMILIA = $subfamilia WHERE ID = $id_articulo";

                                    // Se obtiene el resultado de la consulta.
                                    $resultado = mysqli_query($enlace, $actualizar);

                                    // Si hay resultado.
                                    if ($resultado) {
                                        ?>
                                        <h1>¡Enhorabuena! 😄</h1>
                                        <p class="lead">Artículo modificado con éxito.</p>
                                        <?php

                                    // Si no hay resultado.
                                    } else {
                                    ?>
                                        <h1>¡Lo siento! 😢</h1>
                                        <p class="lead">Ha habido un fallo al modificar el artículo.</p>
                                    <?php
                                    }

                                    // Se cierra la conexión con la base de datos.
                                    mysqli_close($enlace);
                                }
                            }
                        }
                        ?>
                    </div>
                    <!-- Fin mensaje --->
                    <?php
                    break;
                
                #=================================================================================================================
                # CUALQUIER OTRO --> AVISO
                #=================================================================================================================
                default:
                    ?>
                        <div class="mensaje">
                            <h1>¡Opsss! 😐</h1>
                            <p class="lead">Parece que estás intentando acceder a una página que no existe.</p>
                            <p class="lead">¿O eso ya lo sabías, pillín/a? 😏</p>
                        </div>
                    <?php
                    break;
            }
            ?>
        </div>
        
        <?php include("includes/pie.php"); ?>
        <?php include("includes/desconexion.php"); ?>
        
    </div>
    <!----- FIN CONTENIDO ------>
    
    <?php
    include("includes/javascript.php");
    include("includes/validar_formulario.php");
    ?>
    
</body>

</html>