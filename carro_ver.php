<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/cabecera.php"); ?>
    <script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"></script>
</head>

<body>
    <?php include("includes/navegacion.php"); ?>

    <!-- Contendor -->
    <div class="container">
        
        <div class="mensaje">
            <h1>Carrito <i class="fa fa-shopping-cart"></i></h1>
            <?php
            if (isset($_GET['sec'])) {
                
                if ($_GET['sec'] == 1) {
                    ?>
                    <div class="alert alert-danger">
                        Carrito borrado 😕
                    </div>
                    <?php
                    $hayError = true;
                }
                
            } else {
                if (!isset($_SESSION['carro']) || empty($_SESSION['carro'])) {
                    ?>
                    <p class="lead">Vaya, aún no tienes peliculones o seriotes en el carrito...</p>
                    <p class="lead">Pero supongo que será cuestión de tiempo 😏</p>
                    <?php
                    $hayError = true;

                } else {
                    ?>
                    <p class="lead">Sí señor, eso es tener buen gusto 😊</p>
                    <?php
                    $hayError = false;
                }
            }
            
            ?>
            </div>

            <?php
            if (!$hayError) {
                ?>
                <!------ Tabla ------->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Tu carrito de la compra <i class="fa fa-shopping-cart"></i></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php

                                    $contador = 0;
                                    $suma = 0;

                                    $carro = $_SESSION['carro'];
                                    foreach ($carro as $llave => $valor) {
                                        $id = $valor['id'];
                                        $nombre = $valor['nombre'];
                                        $imagen = $valor['imagen'];
                                        $cantidad = $valor['cantidad'];
                                        $precio  =$valor['precio'];
                                        $subtotal = $cantidad * $precio;
                                        $total = $total + $subtotal;
                                        $contador++;
                                        ?>

                                        <tr>
                                            <td><?php echo $nombre ?></td>
                                            <td><img src = "admin/imagenes_articulos/<?php echo $imagen ?>" alt = "<?php echo $nombre ?>" height = "100" width = "auto"></td>
                                            <td><?php echo $cantidad ?></td>
                                            <td><?php echo $precio ?></td>
                                            <td><?php echo $subtotal ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!---- Fin tabla ----->
        
                <div class="alert alert-info centrar">
                    Total:&nbsp;<strong><?php echo $total ?> €</strong>
                </div>

                <div class="btn-group centrar">
                    <a href="carro_borrar.php" class="btn btn-warning"><i class="fa fa-trash"></i> BORRAR</a>
                    <a href="carro_comprar.php" class="btn btn-primary">COMPRAR <i class="fa fa-cart-arrow-down"></i></a>
                </div>
                <?php
            }
            ?>

    </div>
    <!-- Fin del contenedor -->
    
    <?php include("includes/pie.php"); ?>
    
    <?php include("includes/javascript.php"); ?>
    
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    
</body>

</html>