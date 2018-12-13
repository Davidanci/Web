<?php 
	session_start();
    include('acceso_db1.php'); 

	function genera_random($longitud){  
	   $exp_reg="[^A-Z0-9]";  
	   return substr(preg_replace($exp_reg, "", md5(rand())) .  
       preg_replace($exp_reg, "", md5(rand())) .  
       preg_replace($exp_reg, "", md5(rand())),  
       0, $longitud);  
	} 
    if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos desde el formulario 
        // creamos una función que nos parmita validar el email 
        function valida_email($email) { 
            if (preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/', $email)) return true; 
            else return false; 
        } 
        // Procedemos a comprobar que los campos del formulario no estén vacíos 
        $sin_espacios = count_chars($_POST['usuario'], 1); 
        if(!empty($sin_espacios[32])) { // comprobamos que el campo usuario_nombre no tenga espacios en blanco 
            echo "El campo <em>usuario_nombre</em> no debe contener espacios en blanco. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif(empty($_POST['usuario'])) { // comprobamos que el campo usuario_nombre no esté vacío 
            echo "No haz ingresado tu usuario. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif(empty($_POST['contrasenya'])) { // comprobamos que el campo usuario_clave no esté vacío 
            echo "No haz ingresado contraseña. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif($_POST['contrasenya'] != $_POST['contrasenyarep']) { // comprobamos que las contraseñas ingresadas coincidan 
            echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>"; 
        }elseif(!valida_email($_POST['email'])) { // validamos que el email ingresado sea correcto 
            echo "El email ingresado no es válido. <a href='javascript:history.back();'>Reintentar</a>"; 
        }else { 
            // "limpiamos" los campos del formulario de posibles códigos maliciosos 
            $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']); 
            $contrasenya = mysqli_real_escape_string($mysqli,$_POST['contrasenya']); 
            $email = mysqli_real_escape_string($mysqli,$_POST['email']); 
            $fecha= mysqli_real_escape_string($mysqli,$_POST['fecha']); 
            // comprobamos que el usuario ingresado no haya sido registrado antes 
            $sql = mysqli_query($mysqli,"SELECT usuario FROM usuarios WHERE usuario='".$usuario."'"); 
            if(mysqli_num_rows($sql) > 0) { 
                echo "El nombre usuario elegido ya ha sido registrado anteriormente. <a href='javascript:history.back();'>Reintentar</a>"; 
            }else { //Cierra linea 36
				  $reg = mysqli_query($mysqli,"INSERT INTO usuarios (usuario, contrasenya, email, fecha,activacion) VALUES ('".$usuario."', '".$contrasenya."', '".$email."','".$fecha."','0')");
				  if($reg){
                $activate = genera_random(20);   
				
				$query   = "SELECT * FROM usuarios WHERE usuario='$usuario'"; 
				$result = mysqli_query($mysqli,$query) or die ( mysql_error() ); 
				$row   = mysqli_fetch_array($result);
				
$mensaje = "Registro en micocina.cat<br>"; 
$mensaje .= "Estos son tus datos de registro:<br>"; 
$mensaje .= "Usuario: $usuario.<br>"; 
$mensaje .= "Contraseña: $contrasenya.<br>"; 
$mensaje .= "Debes activar tu cuenta pulsando este enlace: https://www.micocina.cat/alessandro/activacion.php?id=".$row["id"]."&activate=$activate"; 

$asunto = "Activación de tu cuenta en micocina.cat"; 

 $headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: <info@micocina.cat>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";   

if(mail($email,$asunto,$mensaje,$headers)){ 
    echo "Se ha enviado un mensaje a tu correo electronico con el código de activación";
}else{ 
    echo "Ha ocurrido un error y no se puede enviar el correo"; 
} 
               
                 
                 
				  }
                } 
            } 
        }else{//cierra la linea 10
?> 
    <form action="registro1.php" method="post"> 
        <label>Usuario:</label><br /> 
        <input type="text" name="usuario" maxlength="15" /><br /> 
        <label>Contraseña:</label><br /> 
        <input type="password" name="contrasenya" maxlength="15" /><br /> 
        <label>Confirmar Contraseña:</label><br /> 
        <input type="password" name="contrasenyarep" maxlength="15" /><br /> 
        <label>Email:</label><br /> 
		<input type="text" name="email" maxlength="50" /><br /> 
        <label>Email:</label><br /> 
        <input type="date" name="fecha" /><br /> 
        <input type="submit" name="enviar" value="Registrar" /> 
        <input type="reset" value="Borrar" /> 
    </form> 
<?php 
    } //cierra la linea 112
?>