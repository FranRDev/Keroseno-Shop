<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

extract($_REQUEST);

// Se conecta con la base de datos.
require 'datos_bd.php'; // Si falla el 'require' no sigue.
$enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

// Se comprueba la conexión a la BD, si falla termina.
if (mysqli_connect_errno()) {
    header('Location: index.php');
    exit();
}

// Se guarda la fecha y hora actual.
$fecha_actual = date('Y-m-d H:i:s');
$nombre_usuario = $_SESSION['usuario'];

// Se inserta una factura.
$insertarFactura = "INSERT INTO FACTURA (FECHA, USUARIO) VALUES ('$fecha_actual', '$nombre_usuario')";
$resultadoFactura = mysqli_query($enlace, $insertarFactura);

$filaFactura = mysqli_fetch_row($resultadoFactura);

$consultaFactura = "SELECT MAX(ID) FROM FACTURA";
$resultadoFactura = mysqli_query($enlace, $consultaFactura);
$idFactura = mysqli_fetch_row($resultadoFactura)[0];

$contador = 0;
$suma = 0;

$carro = $_SESSION['carro'];
foreach ($carro as $llave => $valor) {
    $idArticulo = $valor['id'];
    $nombre = $valor['nombre'];
    $imagen = $valor['imagen'];
    $cantidad = $valor['cantidad'];
    $precio  =$valor['precio'];
    $subtotal = $cantidad * $precio;
    $total = $total + $subtotal;
    $contador++;
    
    // Se insertan los datos.
    $insertarLinea = "INSERT INTO LINEA (PRECIO, CANTIDAD, ID_FACTURA, ID_ARTICULO) VALUES ('$precio', '$cantidad', '$idFactura', '$idArticulo')";

    // Se obtiene el resultado de la consulta.
    $resultadoLinea = mysqli_query($enlace, $insertarLinea);
}

mysqli_free_result($resultadoFactura); // Se liberan los resultados de la memoria.
mysqli_free_result($resultadoLinea); // Se liberan los resultados de la memoria.
mysqli_close($enlace); // Se cierra la conexión con la base de datos.

header('Location: factura_pdf.php?id='.$idFactura);
exit();
?>