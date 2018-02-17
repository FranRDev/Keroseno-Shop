<?php
session_start();
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
                
                <!-- Carousel -->
                <div id="carousel_inicio" class="carousel slide my-4" data-ride="carousel">
                    
                    <h2>Destacados</h2><hr>
                    
                    <!-- Diapositivas -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel_inicio" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel_inicio" data-slide-to="1"></li>
                        <li data-target="#carousel_inicio" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="res/img/black_mirror.png" alt="Black Mirror">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="res/img/wind_river.png" alt="Wind River">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="res/img/godless.png" alt="Godless">
                        </div>
                    </div>
                    <!-- Fin diapositivas -->
                    
                    <!-- Botones -->
                    <a class="carousel-control-prev" href="#carousel_inicio" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel_inicio" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                    <!-- Fin botones -->
                    
                </div>
                <!-- Fin carousel -->
                
                <h2>Últimas novedades</h2><hr>
                
                <!-- Productos -->
                <div class="row">
                    <?php
                    // Se deshabilitan los mensajes de error.
                    include 'deshabilitar_mensajes_error.php';

                    // Se establece la conexión con la base de datos.
                    include 'datos_bd.php';
                    $enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);
                    
                    if (!mysqli_connect_errno()) {
                        // Se obtienen todos los artículos.
                        $consulta = "SELECT * FROM ARTICULO ORDER BY ID DESC";
                        $resultado = mysqli_query($enlace, $consulta);

                        // Si hay resultado.
                        if ($resultado) {
                            
                            // Mientras haya filas.
                            while ($fila = mysqli_fetch_row($resultado)) {
                                $id = $fila[0];
                                $nombre = $fila[1];
                                $poster = $fila[2];
                                $stock = $fila[3];
                                $precio = $fila[4];
                                $descripcion = $fila[5];
                                $id_subfamilia = $fila[6];
                                
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
                        }
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