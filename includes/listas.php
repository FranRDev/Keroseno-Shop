<!-- Sección lateral izquierda -->
    <div class="col-lg-3">

        <!-- Lista géneros -->
        <h2 class="my-4">Géneros</h2>
        <div class="list-group">
            <?php
            // Se deshabilitan los mensajes de error.
            include 'deshabilitar_mensajes_error.php';

            // Se establece la conexión con la base de datos.
            include 'datos_bd.php';
            $enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

            // Si hay error de conexión.
            if (!mysqli_connect_errno()) {
                // Se obtienen todas las familias.
                $consulta = "SELECT DESCRIPCION FROM FAMILIA";
                $resultado = mysqli_query($enlace, $consulta);

                // Si hay resultado.
                if ($resultado) {

                    // Mientras haya filas.
                    while ($fila = mysqli_fetch_row($resultado)) {

                        // Se imprime la fila.
                        ?>
                        <a href="#" class="list-group-item"><?php echo $fila[0] ?></a>
                        <?php
                    }
                }

                // Se libera el resultado de la memoria.
                mysqli_free_result($resultado);
            }
            ?>
        </div>
        <!-- Fin lista géneros -->

        <!-- Lista subgéneros -->
        <h2 class="my-4">Subgéneros</h2>
        <div class="list-group">
            <?php
            // Si hay error de conexión.
            if (!mysqli_connect_errno()) {

                // Se obtienen todas las familias.
                $consulta = "SELECT DESCRIPCION FROM SUBFAMILIA";
                $resultado = mysqli_query($enlace, $consulta);

                // Si hay resultado.
                if ($resultado) {

                    // Mientras haya filas.
                    while ($fila = mysqli_fetch_row($resultado)) {

                        // Se imprime la fila.
                        ?>
                        <a href="#" class="list-group-item"><?php echo $fila[0] ?></a>
                        <?php
                    }
                }

                // Se libera el resultado de la memoria.
                mysqli_free_result($resultado);

                // Se cierra la conexión con la base de datos.
                mysqli_close($enlace);
            }
            ?>
        </div>
        <!-- Fin lista subgéneros -->

    </div>
    <!-- Fin sección lateral izquierda -->