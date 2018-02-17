<?php
session_start();
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
                # 0 --> LISTAR SUBFAMILIA
                #=================================================================================================================
                case 0:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Subfamilias</li>
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

                        // Se hay error de conexión.
                        if (mysqli_connect_errno()) {
                            ?>
                            <h1>¡Lo sentimos! :(</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php
                            $hay_error = true;

                        // Si hay conexión.
                        } else {
                            ?>
                            <h1>Subfamilias</h1>
                            <p class="lead">Listado de subfamilias.</p>
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
                                <i class="fa fa-table"></i> Subfamilias</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descripción</th>
                                                <th>Familia</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descripción</th>
                                                <th>Familia</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            // Se obtienen todos los artículos.
                                            $consulta = "SELECT * FROM SUBFAMILIA";

                                            $resultado = mysqli_query($enlace, $consulta);

                                            // Si hay resultado.
                                            if ($resultado) {

                                                // Mientras haya filas.
                                                while ($fila = mysqli_fetch_row($resultado)) {

                                                    // Se obtiene el nombre de la subfamilia.
                                                    $consulta2 = "SELECT DESCRIPCION FROM FAMILIA WHERE ID = $fila[2]";
                                                    $resultado2 = mysqli_query($enlace, $consulta2);
                                                    $fila2 = mysqli_fetch_row($resultado2);

                                                    // Se imprime la fila.
                                                    echo "
                                                        <tr>
                                                            <td>".$fila[0]."</td>
                                                            <td>".$fila[1]."</td>
                                                            <td>".$fila2[0]."</td>
                                                        </tr>";
                                                }
                                            }

                                            // Se libera el resultado de la memoria.
                                            mysqli_free_result($resultado);

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
                # 1 --> AÑADIR SUBFAMILIA: FORMULARIO
                #=================================================================================================================
                case 1:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Subfamilias</li>
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

                        // Se hay error de conexión.
                        if (mysqli_connect_errno()) {
                            ?>
                            <h1>¡Lo sentimos! :(</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php
                            $hay_error = true;

                        // Si hay conexión.
                        } else {

                            // Se obtienen el ID y la descripción de las subfamilias.
                            $consulta = "SELECT ID, DESCRIPCION FROM FAMILIA";

                            $resultado = mysqli_query($enlace, $consulta);

                            // Si hay resultado.
                            if ($resultado) {
                                ?>
                                <h1>Subfamilia</h1>
                                <p class="lead">Añade una subfamilia.</p>
                                <?php

                            // Si no hay resultado.
                            } else {
                                ?>
                                <h1>¡Lo sentimos! :(</h1>
                                <p class="lead">Antes tiene que crear al menos una familia.</p>
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
                        <!--------------------------------------- Formulario para añadir una subfamilia -------------------------------------->
                        <form id="formulario_anhadir_subfamilia" action="subfamilia.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="sec" value="2" />
                            
                            <!-- Descripción -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Introduce la descripción de la subfamilia">
                            </div>
                            
                            <!-- Familia -->
                            <div class="form-group">
                                <label for="familia">Familia</label>
                                <select name="familia" id="familia">
                                    <?php
                                    // Mientras haya filas.
                                    while ($fila = mysqli_fetch_row($resultado)) {

                                        // Se imprime la fila.
                                        echo "<option value=",$fila[0],">$fila[1]</option>";
                                    }

                                    // Se libera el resultado de la memoria.
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
                        <!------------------------------------- Fin formulario para añadir una subfamilia ------------------------------------>
                        <?php
                    }
                    ?>
                    <?php
                    break;
                    
                #=================================================================================================================
                # 2 --> AÑADIR SUBFAMILIA: TRATAMIENTO DE FORMULARIO
                #=================================================================================================================
                case 2:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Subfamilias</li>
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

                        // Se hay error de conexión.
                        if (mysqli_connect_errno()) {
                            ?>
                            <h1>¡Lo sentimos! :(</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php

                        // Si hay conexión.
                        } else {

                            // Se extraen las variables por POST.
                            extract($_POST);

                            // Se intenta evitar el SQLi.
                            $descripcion = mysqli_real_escape_string($enlace, $descripcion);

                            // Se insertan los datos.
                            $insertar = "INSERT INTO SUBFAMILIA (DESCRIPCION, ID_FAMILIA) VALUES ('$descripcion', $familia)";

                            // Se obtiene el resultado de la consulta.
                            $resultado = mysqli_query($enlace, $insertar);

                            // Si hay resultado.
                            if ($resultado) {
                                ?>
                                <h1>¡Enhorabuena! :)</h1>
                                <p class="lead">Subfamilia añadida con éxito.</p>
                                <?php

                            // Si no hay resultado.
                            } else {
                                ?>
                                <h1>¡Lo sentimos! :(</h1>
                                <p class="lead">Ha habido un fallo al añadir la subfamilia.</p>
                                <?php
                            }

                            // Se libera el resultado de la memoria.
                            mysqli_free_result($resultado);

                            // Se cierra la conexión con la base de datos.
                            mysqli_close($enlace);
                        }
                        ?>
                    </div>
                    <!-- Fin mensaje --->
                    <?php
                    break;
                    
                #=================================================================================================================
                # 3 --> MODIFICAR SUBFAMILIA: LISTAR
                #=================================================================================================================
                case 3:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Subfamilias</li>
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

                        // Se hey error de conexión;
                        if (mysqli_connect_errno()) {
                            ?>
                            <h1>¡Lo sentimos! :(</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php
                            $hay_error = true;

                        // Si hay conexión.
                        } else {
                            ?>
                            <h1>Subfamilias</h1>
                            <p class="lead">Listado de subfamilias para modificar.</p>
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
                                <i class="fa fa-table"></i> Subfamilias</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descripción</th>
                                                <th>Familia</th>
                                                <th>Modificación</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descripción</th>
                                                <th>Familia</th>
                                                <th>Modificación</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            // Se obtienen todos los artículos.
                                            $consulta = "SELECT * FROM SUBFAMILIA";
                                            $resultado = mysqli_query($enlace, $consulta);

                                            // Si hay resultado.
                                            if ($resultado) {

                                                // Mientras haya filas.
                                                while ($fila = mysqli_fetch_row($resultado)) {

                                                    // Se obtiene el nombre de la subfamilia.
                                                    $consulta2 = "SELECT DESCRIPCION FROM FAMILIA WHERE ID = $fila[2]";
                                                    $resultado2 = mysqli_query($enlace, $consulta2);
                                                    $fila2 = mysqli_fetch_row($resultado2);

                                                    // Se imprime la fila.
                                                    echo "
                                                        <tr>
                                                            <td>".$fila[0]."</td>
                                                            <td>".$fila[1]."</td>
                                                            <td>".$fila2[0]."</td>
                                                            <td><a href='subfamilia.php?sec=4&id=".$fila[0]."'>Modificar</a></td>
                                                        </tr>";
                                                }
                                            }

                                            // Se libera el resultado de la memoria.
                                            mysqli_free_result($resultado);

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
                # 4 --> MODIFICAR SUBFAMILIA: FORMULARIO
                #=================================================================================================================
                case 4:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Subfamilias</li>
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

                        // Se hay error de conexión.
                        if (mysqli_connect_errno()) {
                            ?>
                            <h1>¡Lo sentimos! :(</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php
                            $hay_error = true;

                        // Si hay conexión.
                        } else {

                            // Se obtienen el ID por GET.
                            $id_subfamilia = $_GET["id"];
                            
                            // Se obtienen los datos de una subfamilia concreta mediante su ID.
                            $consulta1 = "SELECT * FROM SUBFAMILIA WHERE ID = $id_subfamilia";

                            $resultado1 = mysqli_query($enlace, $consulta1);

                            $fila = mysqli_fetch_row($resultado1);

                            if ($fila > 0) {
                                ?>
                                <h1>Subfamilia</h1>
                                <p class="lead">Modifica una subfamilia.</p>
                                <?php
                                
                                // Se obtienen las familias.
                                $consulta2 = "SELECT ID, DESCRIPCION FROM FAMILIA";

                                $resultado2 = mysqli_query($enlace, $consulta2);
                                
                            } else {
                                ?>
                                <h1>¡Lo sentimos! :(</h1>
                                <p class="lead">El ID de la subfamilia no existe.</p>
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
                        <!--------------------------------------- Formulario para añadir una subfamilia -------------------------------------->
                        <form id="formulario_anhadir_subfamilia" action="subfamilia.php?sec=5&id=<?php echo $id_subfamilia ?>" method="post" enctype="multipart/form-data">
                            <!-- ID -->
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="number" class="form-control" name="id" id="id" value="<?php echo $id_subfamilia ?>" disabled>
                            </div>
                            <!-- Descripción -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Introduce la descripción de la subfamilia" value="<?php echo $fila[1] ?>">
                            </div>
                            <!-- Familia -->
                            <div class="form-group">
                                <label for="familia">Familia</label>
                                <select name="familia" id="familia">
                                    <?php
                                    // Mientras haya filas.
                                    while ($fila2 = mysqli_fetch_row($resultado2)) {

                                        // Si la fila es la subfamilia actual del artículo, la selecciona.
                                        if ($fila[2] == $fila2[0]) {
                                            echo "<option value=".$fila2[0]." selected>$fila2[1]</option>";

                                        // Si no, la añade sin más a la lista.
                                        } else {
                                            echo "<option value=".$fila2[0].">$fila2[1]</option>";
                                        }
                                    }

                                    // Se liberan los resultados de la memoria.
                                    mysqli_free_result($resultado1);
                                    mysqli_free_result($resultado2);

                                    // Se cierra la conexión con la base de datos.
                                    mysqli_close($enlace);
                                    ?>
                                </select>
                            </div>
                            <!-- Limpiar formulario -->
                            <button type="reset" class="btn btn-secondary">REESTABLECER</button>
                            <!-- Enviar formulario -->
                            <button type="submit" class="btn btn-primary">NODIFICAR</button>
                            <p><br></p>
                        </form>
                        <!------------------------------------- Fin formulario para añadir una subfamilia ------------------------------------>
                        <?php
                    }
                    ?>
                    <?php
                    break;
                    
                #=================================================================================================================
                # 5 --> MODIFICAR SUBFAMILIA: TRATAMIENTO DE FORMULARIO
                #=================================================================================================================
                case 5:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Subfamilias</li>
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

                        // Se hay error de conexión.
                        if (mysqli_connect_errno()) {
                            ?>
                            <h1>¡Lo sentimos! :(</h1>
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php

                        // Si hay conexión.
                        } else {

                            // Se extraen las variables por POST.
                            extract($_POST);

                            // Se obtienen el ID por GET.
                            $id_subfamilia = $_GET["id"];

                            // Se intenta evitar el SQLi.
                            $descripcion = mysqli_real_escape_string($enlace, $descripcion);

                            // Se insertan los datos.
                            $insertar = "UPDATE SUBFAMILIA SET DESCRIPCION = '$descripcion', ID_FAMILIA = $familia WHERE ID = $id_subfamilia";

                            // Se obtiene el resultado de la consulta.
                            $resultado = mysqli_query($enlace, $insertar);

                            // Si hay resultado.
                            if ($resultado) {
                                ?>
                                <h1>¡Enhorabuena! :)</h1>
                                <p class="lead">Subfamilia modificada con éxito.</p>
                                <?php

                            // Si no hay resultado.
                            } else {
                                ?>
                                <h1>¡Lo sentimos! :(</h1>
                                <p class="lead">Ha habido un fallo al modificar la subfamilia.</p>
                                <?php
                            }

                            // Se libera el resultado de la memoria.
                            mysqli_free_result($resultado);

                            // Se cierra la conexión con la base de datos.
                            mysqli_close($enlace);
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
                            <p class="lead">¿O eso ya lo sabías, pillín(a)? 😏</p>
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