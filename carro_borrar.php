<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

extract($_GET);

unset($_SESSION['carro']);

header("Location: carro_ver.php?sec=1?".SID);
?>