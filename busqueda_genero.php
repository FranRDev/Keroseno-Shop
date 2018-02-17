<?php
session_start();
extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="es">
    
<head>
    <?php include("includes/cabecera.php"); ?>
</head>

<body>
    <?php include("includes/navegacion.php"); ?>

    <!-- Contenido -->
    <div class="container">
        <div class="row">
            
            <?php include("includes/listas.php"); ?>
            
            <!-- Contenido principal -->
            <div class="col-lg-9">
                
                <?php
                // Se deshabilitan los mensajes de error.
                include 'deshabilitar_mensajes_error.php';
                
                // Se establece la conexión con la base de datos.
                include 'datos_bd.php';
                $enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);
                
                // Si no hay error de conexión...
                if (mysqli_connect_errno()) {
                    echo "<script language=\"javascript\">window.location.href=\"index.php?var=3\";</script>";
                    exit();
                }
                
                $genero = mysqli_real_escape_string($enlace, $genero);
                
                $consulta1 = "SELECT A.ID, A.NOMBRE, A.FOTO, A.STOCK, A.PRECIO, A.DESCRIPCION, A.DESCRIPCION, F.DESCRIPCION FROM ARTICULO AS A, FAMILIA AS F, SUBFAMILIA AS SF WHERE A.ID_SUBFAMILIA = SF.ID AND SF.ID_FAMILIA = F.ID AND F.ID = ".$genero;
                $resultado1 = mysqli_query($enlace, $consulta1);
                $total_registros = mysqli_num_rows($resultado1);
                
                $nombre_genero = mysqli_fetch_row($resultado1)[7];
                ?>
                
                <div class="titulo_busqueda">
                    <h2><?php echo $nombre_genero ?></h2><hr>
                </div>
                
                <!-- Productos -->
                <div class="row">
                    <?php
                    // Se define el límite de los resultados por página.
                    $tamanho_pagina = 9;

                    if (!$pagina) {
                        $inicio = 0;
                        $pagina = 1;

                    } else {
                        $inicio = ($pagina - 1) * $tamanho_pagina;
                    }
                        
                    //calculo el total de páginas 
                    $total_paginas = ceil($total_registros / $tamanho_pagina);

                    

                    //construyo la sentencia SQL
                    $consulta2 = $consulta1." LIMIT ".$inicio.",".$tamanho_pagina;

                    $resultado2 = mysqli_query($enlace, $consulta2);

                    // Si hay resultado.
                    if ($resultado) {

                        // Mientras haya filas.
                        while ($fila = mysqli_fetch_row($resultado2)) {
                            $id = $fila[0];
                            $nombre = $fila[1];
                            $poster = $fila[2];
                            $stock = $fila[3];
                            $precio = $fila[4];
                            $descripcion = $fila[5];
                            //$id_subfamilia = $fila[6];

                            ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">

                                    <img class="card-img-top" src="admin/imagenes_articulos/<?php echo $poster ?>" alt="<?php echo $nombre ?>">

                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $nombre ?></h5>
                                        <h6><?php echo $precio ?> €</h6>
                                    </div>

                                    <div class="card-footer">
                                        <div class="btn-ground text-center">
                                            <button type="button" class="btn btn-danger"><i class="fa fa-cart-plus"></i></button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#vista_<?php echo $id ?>"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Ventana modal -->
                            <div class="modal fade product_view" id="vista_<?php echo $id ?>">
                                <div class="modal-dialog modal-content">
                                    <div class="modal-body">

                                        <!-- Cabecera -->
                                        <div class="modal-header bg-danger text-white">
                                            <h4 class="modal-title">DETALLES DEL PRODUCTO</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <!-- Contenidos -->
                                        <div class="row">
                                            <div class="col-md-6 product_img">
                                                <div class="space-ten"></div>
                                                <img src="admin/imagenes_articulos/<?php echo $poster ?>" width="300" height="auto" class="img-responsive img-centro">
                                            </div>

                                            <div class="col-md-6 product_content">
                                                <div class="space-ten"></div>

                                                <strong>Nombre:</strong>
                                                <h4><?php echo $nombre ?></h4><br>

                                                <strong>Sinopsis:</strong>
                                                <p><?php echo $descripcion ?></p><br>

                                                <strong>Precio:</strong>
                                                <h3><?php echo $precio ?> €</h3><br>

                                                <strong>Stock:</strong>
                                                <h5><?php echo $stock ?> unidades</h5><br>

                                                <div class="btn-ground">
                                                    <button type="button" class="btn btn-danger"><i class="fa fa-cart-plus"></i> Añadir al carrito</button>
                                                </div>

                                                <div class="space-ten"></div>
                                            </div>
                                        </div>

                                        <!-- Pie -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        mysqli_free_result($resultado1);
                        mysqli_free_result($resultado2);
                        mysqli_close($enlace);
                        
                        //pongo el número de registros total, el tamaño de página y la página que se muestra 
                        echo "Número de registros encontrados: " . $total_registros . "<br>"; 
                        echo "Se muestran páginas de " . $tamanho_pagina . " registros cada una<br>"; 
                        echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<p>";
                    } else {
                        
                    }
                    ?>
                </div>
                <!-- Fin productos -->
            
            </div>
            <!-- Fin contenido principal -->

      </div>
    </div>
    <!-- Fin contenido -->

    <?php include("includes/pie.php"); ?>

    <?php include("includes/javascript.php"); ?>

</body>

</html>