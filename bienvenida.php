<?php
session_start();
#pedimos que escriba el identificador único y el nombre de la sesión
//echo session_id(),"<br>";

if(isset($_SESSION['username'] )){
    echo "Bienvenido  " .$_SESSION['username'],"<br>";
    
} else {
    echo "No ha iniciado la sesion";
	//botones de login y registrar
}
?>