<!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top mb-2">
        <div class="container">
            <a class="navbar-brand typewrite" href="index.php" data-period="1500" data-type='[ "Keroseno Shop", "Tu tienda de cine...", "... y series" ]'>
                <span class="wrap"></span>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fa fa-film"></i> Inicio</a>
                    </li>
                    
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#">Sobre nosotros</a>
                    </li>-->
                    
                    <?php
                    if (isset($_SESSION['usuario'])) {
                        ?>
                        <li class="nav-item dropdown">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i> <?php echo $_SESSION['usuario'] ?>
                            </a>
                            
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href="carrito.php"><i class="fa fa-shopping-cart"></i> Carrito</a>
                                <a class="dropdown-item" href="registro_facturas.php"><i class="fa fa-file-text"></i> Registro de facturas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="desconectar.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
                            </div>
                            
                        </li>
                        <?php
                        
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="registro.php"><i class="fa fa-user-plus"></i> Registrarse</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="formulario_identificacion.php"><i class="fa fa-sign-in"></i> Iniciar sesión</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>