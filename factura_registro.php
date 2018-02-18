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
            <h1>Registro de facturas <i class="fa fa-files-o"></i></h1>
                <p class="lead">¿Ya no recuerdas qué y cuándo lo compraste?... 😏</p>
                <p class="lead">¡No te preocupes! Aquí tienes tu registro 😌</p>
            </div>

            <!------ Tabla ------->
            <div class="card mb-3">
                
                <div class="card-header">
                    <i class="fa fa-table"></i> Tu registro de facturas <i class="fa fa-files-o"></i></div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Enlace</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Enlace</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    // Se conecta con la base de datos.
                                    require 'datos_bd.php'; // Si falla el 'require' no sigue.
                                    $enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

                                    // Se comprueba la conexión a la BD, si falla termina.
                                    if (mysqli_connect_errno()) {
                                        header('Location: index.php');
                                        exit();
                                    }
                                
                                    $nombreUsuario = $_SESSION['usuario'];
                                
                                    // Se obtienen todas las familias.
                                    $consulta = "SELECT F.ID, F.FECHA FROM FACTURA AS F WHERE F.USUARIO = '".$nombreUsuario."'";
                                    $resultado = mysqli_query($enlace, $consulta);

                                    // Si hay resultado.
                                    if ($resultado) {

                                        // Mientras haya filas.
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $fila[1] ?></td>
                                                <td><a href="factura_pdf.php?id=<?php echo $fila[0] ?>">Ver factura</a></td>
                                            </tr>
                                            <?php
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

    </div>
    <!-- Fin del contenedor -->
    
    <?php include("includes/pie.php"); ?>
    
    <?php include("includes/javascript.php"); ?>
    
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    
</body>

</html>