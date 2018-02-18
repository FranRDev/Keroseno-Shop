<?php 
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

extract($_REQUEST);

// Se deshabilitan los mensajes de error.
include 'deshabilitar_mensajes_error.php';

// Se establece la conexión con la base de datos.
include 'datos_bd.php';
$enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

$id = mysqli_real_escape_string($enlace, $art);

// Se obtienen todos los artículos.
$consulta = "SELECT NOMBRE, FOTO FROM ARTICULO WHERE ID = ".$id;
$resultado = mysqli_query($enlace, $consulta);

$fila = mysqli_fetch_row($resultado);
$nombre = $fila[0];

$imagen = $fila[1];

if (!isset($cantidad)) {
    $cantidad = 1;
}

if (isset($_SESSION['carro'])) {
    
    $carro = $_SESSION['carro'];
    $carro[$id] = array('id' => $id, 'nombre' => $nombre, 'imagen' => $imagen, 'cantidad' => $cantidad, 'precio' => $precio);
    $_SESSION['carro'] = $carro;
    
} else {
    $carro[$id] = array('id' => $id, 'nombre' => $nombre, 'imagen' => $imagen, 'cantidad' => $cantidad, 'precio' => $precio);
    session_cache_limiter();
    $_SESSION['carro'] = $carro;
}

// Se liberan los resultados de la memoria.
mysqli_free_result($resultado);

// Se cierra la conexión con la base de datos.
mysqli_close($enlace);

header('Location: '.$_SERVER["HTTP_REFERER"].SID);
?>