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
                # 0 --> LISTAR FAMILIA
                #=================================================================================================================
                case 0:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Familias</li>
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
                            <h1>Familias</h1>
                            <p class="lead">Listado de familias.</p>
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
                                <i class="fa fa-table"></i> Familias</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            // Se obtienen todas las familias.
                                            $consulta = "SELECT * FROM FAMILIA";
                                            $resultado = mysqli_query($enlace, $consulta);

                                            // Si hay resultado.
                                            if ($resultado) {

                                                // Mientras haya filas.
                                                while ($fila = mysqli_fetch_row($resultado)) {

                                                    // Se imprime la fila.
                                                    echo "
                                                        <tr>
                                                            <td>".$fila[0]."</td>
                                                            <td>".$fila[1]."</td>
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
                # 1 --> AÑADIR FAMILIA: FORMULARIO
                #=================================================================================================================
                case 1:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Familias</li>
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
                            <h1>¡Lo sentimos! :(</h1>
                            <p class="lead">Parece ser que hay un error de conexión con la base de datos.</p>
                            <?php
                            $hay_error = true;

                        // Si hay conexión.
                        } else {
                            ?>
                            <h1>Familias</h1>
                            <p class="lead">Añade una familia.</p>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- Fin mensaje --->

                    <?php
                    if (!$hay_error) {
                        ?>
                        <!------------------------------------- Formulario para añadir una familia ------------------------------------->
                        <form id="formulario_anhadir_familia" action="familia.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="sec" value="2" />
                            
                            <!-- Descripción -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Introduce la descripción de la familia">
                            </div>
                            
                            <!-- Limpiar formulario -->
                            <button type="reset" class="btn btn-secondary">LIMPIAR</button>
                            
                            <!-- Enviar formulario -->
                            <button type="submit" class="btn btn-primary">AÑADIR</button>
                            
                            <p><br></p>
                        </form>
                        <!----------------------------------- Fin formulario para añadir una familia ----------------------------------->
                        <?php
                    }
                    ?>
                    <?php
                    break;
                    
                #=================================================================================================================
                # 2 --> AÑADIR FAMILIA: TRATAMIENTO DE FORMULARIO
                #=================================================================================================================
                case 2:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Familias</li>
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
                            <p class="lead">Parece que hay un error de conexión con la base de datos.</p>
                            <?php

                        // Si hay conexión.
                        } else {
                            // Se extraen las variables por POST.
                            extract($_POST);

                            // Se intenta evitar el SQLi.
                            $descripcion = mysqli_real_escape_string($enlace, $descripcion);

                            // Se insertan los datos.
                            $insertar = "INSERT INTO FAMILIA (DESCRIPCION) VALUES ('$descripcion')";

                            // Se obtiene el resultado de la consulta.
                            $resultado = mysqli_query($enlace, $insertar);

                            // Si hay resultado.
                            if ($resultado) {
                                ?>
                                <h1>¡Enhorabuena! :)</h1>
                                <p class="lead">Familia añadida con éxito.</p>
                                <?php

                            // Si no hay resultado.
                            } else {
                            ?>
                                <h1>¡Lo sentimos! :(</h1>
                                <p class="lead">Ha habido un fallo al añadir la familia.</p>
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
                # 3 --> MODIFICAR FAMILIA: LISTAR
                #=================================================================================================================
                case 3:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Familias</li>
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
                            <h1>Familias</h1>
                            <p class="lead">Listado de familias para modificar.</p>
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
                                <i class="fa fa-table"></i> Familias</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descripción</th>
                                                <th>Modificar</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Descripción</th>
                                                <th>Modificar</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            // Se obtienen todas las familias.
                                            $consulta = "SELECT * FROM FAMILIA";
                                            $resultado = mysqli_query($enlace, $consulta);

                                            // Si hay resultado.
                                            if ($resultado) {

                                                // Mientras haya filas.
                                                while ($fila = mysqli_fetch_row($resultado)) {

                                                    // Se imprime la fila.
                                                    echo "
                                                        <tr>
                                                            <td>".$fila[0]."</td>
                                                            <td>".$fila[1]."</td>
                                                            <td><a href='familia.php?sec=4&id=".$fila[0]."'>Modificar</a></td>
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
                # 4 --> MODIFICAR FAMILIA: FORMULARIO
                #=================================================================================================================
                case 4:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Familias</li>
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
                            $id_familia = $_GET["id"];
                            
                            // Se obtienen los datos de una familia concreta por la ID.
                            $consulta = "SELECT * FROM FAMILIA WHERE ID = ".$id_familia."";

                            $resultado = mysqli_query($enlace, $consulta);
                            
                            $fila = mysqli_fetch_row($resultado);

                            // Si hay resultado.
                            if ($fila > 0) {
                                ?>
                                <h1>Familias</h1>
                                <p class="lead">Modifica una familia.</p>
                                <?php
                                
                            // Si no hay resultado.
                            } else {
                                ?>
                                <h1>¡Lo sentimos! :(</h1>
                                <p class="lead">El ID de la familia no existe.</p>
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
                        <!-------------------------------------- Formulario para modificar una familia ------------------------------------->
                        <form id="formulario_anhadir_familia" action="familia.php?sec=5&id=<?php echo $id_familia ?>" method="post" enctype="multipart/form-data">
                            <!-- ID -->
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="number" class="form-control" name="id" id="id" value="<?php echo $id_familia ?>" disabled>
                            </div>
                            <!-- Descripción -->
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Introduce la descripción de la familia" value="<?php echo $fila[1] ?>">
                            </div>
                            <!-- Limpiar formulario -->
                            <button type="reset" class="btn btn-secondary">REESTABLECER</button>
                            <!-- Enviar formulario -->
                            <button type="submit" class="btn btn-primary">MODIFICAR</button>
                            <p><br></p>
                        </form>
                        <!------------------------------------ Fin formulario para modificar una familia ----------------------------------->
                        <?php
                        
                        // Se liberan los resultados de la memoria.
                        mysqli_free_result($resultado);

                        // Se cierra la conexión con la base de datos.
                        mysqli_close($enlace);
                    }
                    ?>
                    <?php
                    break;
                    
                #=================================================================================================================
                # 5 --> MODIFICAR FAMILIA: TRATAMIENTO DE FORMULARIO
                #=================================================================================================================
                case 5:
                    ?>
                    <!------- Ruta ------->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX; ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Familia</li>
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

                        // Si hay conexión.
                        } else {

                            // Se extraen las variables por POST.
                            extract($_POST);

                            // Se obtienen el ID por GET.
                            $id_familia = $_GET["id"];

                            // Se intenta evitar el SQLi.
                            $descripcion = mysqli_real_escape_string($enlace, $descripcion);

                            // Se actualizan los datos.
                            $actualizar = "UPDATE FAMILIA SET DESCRIPCION = '$descripcion' WHERE ID = $id_familia";

                            // Se obtiene el resultado de la consulta.
                            $resultado = mysqli_query($enlace, $actualizar);

                            // Si hay resultado.
                            if ($resultado) {
                                ?>
                                <h1>¡Enhorabuena! :)</h1>
                                <p class="lead">Familia modificada con éxito.</p>
                                <?php

                            // Si no hay resultado.
                            } else {
                            ?>
                                <h1>¡Lo sentimos! :(</h1>
                                <p class="lead">Ha habido un fallo al modificar la familia.</p>
                            <?php
                            }

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