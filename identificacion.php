<?php
ob_start(); // Se activa el almacenamiento en búfer de la salida.
session_start(); // Crea la sesión.

// Se conecta con la base de datos.
require 'datos_bd.php'; // Si falla el 'require' no sigue.
$enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

// Se comprueba la conexión a la BD, si falla termina.
if (mysqli_connect_errno()) {
    header('Location: index.php');
    exit();
}

// Se obtienen el correo y la contraseña.
$correo = mysqli_real_escape_string($enlace, $_POST["correo"]);
$clave = mysqli_real_escape_string($enlace, $_POST["clave"]);

// Se hace una consulta a la BD según el correo.
$consulta = "SELECT CLAVE, NOMBRE FROM USUARIO WHERE CORREO = '".$correo."'";
$resultado = mysqli_query($enlace, $consulta);

// Si hay resultado.
if (!$fila = mysqli_fetch_row($resultado)) {
    mysqli_free_result($resultado); // Se liberan los resultados de la memoria.
    mysqli_close($enlace); // Se cierra la conexión con la base de datos.
    ob_end_clean(); // Se deshecha el contenido del búfer.
    
    header('Location: formulario_identificacion.php?var=1');
    exit();

} elseif (!password_verify($clave, $fila[0])) {
    mysqli_free_result($resultado); // Se liberan los resultados de la memoria.
    mysqli_close($enlace); // Se cierra la conexión con la base de datos.
    ob_end_clean(); // Se deshecha el contenido del búfer.
    
    header('Location: formulario_identificacion.php?var=2');
    exit();
    
} else {
    session_cache_limiter(); // Devuelve el nombre del limitador de caché actual.
    //session_name('nombre_admin');
    $_SESSION['usuario'] = $fila[1]." (".$correo.")";
    
    mysqli_free_result($resultado); // Se liberan los resultados de la memoria.
    mysqli_close($enlace); // Se cierra la conexión con la base de datos.
    ob_end_clean(); // Se deshecha el contenido del búfer.
    
    header('Location: index.php');
    exit();
}
?>