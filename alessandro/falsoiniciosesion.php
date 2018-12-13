<html>
	<head>
		<title>Inicia Sesión</title>
	</head>
	<body>
	
		<form method="POST" action="falsoiniciosesion.php">
			Usuario: <input type="text" name="usuario" required><br>
			Contraseña: <input type="password" name="contrasenya" required><br>
			
			<input type="submit" value="Inicia Sesion" name="login">
		</form>
		<a href="registro1.php">No estás registrado? Regístrate aquí!</a>
		
		
	</body>
</html>

<?php
session_start(); 
//datos para establecer la conexion con la base de mysql. 
include("acceso_db1.php");

function quitar($mensaje) 
{ 
    $nopermitidos = array("'",'\\','<','>',"\""); 
    $mensaje = str_replace($nopermitidos, "", $mensaje); 
    return $mensaje; 
} 
$activacion= "1";  //creo la variable $estado=1 para compararla despues con el campo de la BD estado y si son uno le dejara pasar 
if (isset($_POST['usuario'])) { 
	$usuario = $_POST["usuario"]; 
    $contrasenya = $_POST["contrasenya"];
    // Puedes utilizar la funcion para eliminar algun caracter en especifico 
   /* $usuario = strtolower(quitar($HTTP_POST_VARS["usuario"])); 
    $contrasenya = $HTTP_POST_VARS["password"]; */
    
     
    $result = mysqli_query($mysqli,"SELECT usuario, contrasenya, activacion FROM usuarios WHERE usuario='".$usuario."'"); 
    if($row = mysqli_fetch_array($result)){ 
        if($row["contrasenya"] == $contrasenya){ 
            $_SESSION["usuario"] = $row['usuario']; 
            if(  $activacion == $row['activacion']){  //aqui es donde comprovamos que el campo activado sea cero, si lo es pasara, si no, no. 
                header("Location: falsoindex.php"); 
         
        }else{ 
            echo '<span >Cuenta sin activar, por favor revise el correo electrónico que nos proporcionó a la hora de registrarse.</span>'; 
        session_destroy();
		} 
    }else{ 
        echo '<span >Contraseña incorrecta.</span>';
		} 
        } 
    else{ 
        echo '<span >El usuario no existe. Si desea registrarse haga click en el siguiente enlace: <a href="registro1.php">Registro</a></span>';} 
        } 
    mysqli_close($mysqli); 
     

?>