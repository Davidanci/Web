<?php

session_start();
	if(isset($_SESSION["usuario"])){
		echo "Bienvenido ".$_SESSION['usuario']."!";
		echo "<a href='falsoiniciosesion.php' ><input type='button' value='Cerrar Sesion'></a>";
	}else{
		header("Location: falsoiniciosesion.php");
	}

?>