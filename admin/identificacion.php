<?php
// Hacer una consulta a la base de datos //

// Se conecta con la base de datos.
require 'datos_bd.php'; // Si falla el 'require' no sigue.
$enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

// Se comprueba la conexión a la BD, si falla termina.
if (mysqli_connect_errno()) {
    exit();
}

// Se obtienen el correo y la contraseña.
$correo = mysqli_real_escape_string($_POST["usuario"]);
$clave = mysqli_real_escape_string($_POST["password"]);

// Se encripta la contraseña.
$clave = password_hash($clave, PASSWORD_DEFAULT);

$consulta = "SELECT NOMBRE FROM USUARIO WHERE CORREO = '$correo' AND CLAVE = '$clave'";
$resultado = mysqli_query($enlace, $consulta);

// Si hay resultado.
if ($resultado) {
    session_cache_limiter(); // Devuelve el nombre del limitador de caché actual.
    session_start(); // Crea la sesión.

    $_SESSION['nombre_usuario'] = $resultado; //Aqui el nombre del usuario

    echo "<a href='bienvenida.php'> Bienvenida </a>";
    
} else {
    echo "<div class='alert alert-danger'>"
        echo "<strong>Parece que hubo un error.</strong> El correo o la contraseña son incorrectos."
    echo "</div>"
}
?>