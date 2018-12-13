<?php 
	session_start();
    include('acceso_db.php'); 
    include ("apartados/idiomas.php");

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
            $error= $lang["err1"]; 
        }elseif(empty($_POST['usuario'])) { // comprobamos que el campo usuario_nombre no esté vacío 
            $error= $lang["err2"]; 
        }elseif(empty($_POST['contrasenya'])) { // comprobamos que el campo usuario_clave no esté vacío 
            $error= $lang["err3"]; 
        }elseif($_POST['contrasenya'] != $_POST['contrasenyarep']) { // comprobamos que las contraseñas ingresadas coincidan 
            $error= $lang["err4"]; 
        }elseif(!valida_email($_POST['email'])) { // validamos que el email ingresado sea correcto 
            $error= $lang["err5"]; 
        }else { 
            // "limpiamos" los campos del formulario de posibles códigos maliciosos 
            $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
            $contrasenya = mysqli_real_escape_string($mysqli,$_POST['contrasenya']); 
              
            $email = mysqli_real_escape_string($mysqli,$_POST['email']);  
            // comprobamos que el usuario ingresado no haya sido registrado antes 
            $sql = mysqli_query($mysqli,"SELECT usuario FROM usuarios WHERE usuario='".$usuario."'"); 
			$sql2 = mysqli_query($mysqli,"SELECT email FROM usuarios WHERE email='".$email."'"); 
            if(mysqli_num_rows($sql) > 0) { 
                $error= $lang["err6"]; 
            }elseif(mysqli_num_rows($sql2) > 0) { 
                $error= $lang["err7"]; 
            }else { //Cierra linea 36
				  
				  $reg = mysqli_query($mysqli,"INSERT INTO usuarios (usuario, contrasenya, email, activacion) VALUES ('".$usuario."', '".$contrasenya."', '".$email."','0')");
				  if($reg){
                $activate = genera_random(20);   
				
				$query   = "SELECT * FROM usuarios WHERE usuario='$usuario'"; 
				$result = mysqli_query($mysqli,$query) or die ( mysql_error() ); 
				$row   = mysqli_fetch_array($result);
				
$mensaje = "Registro en micocina.cat<br>"; 
$mensaje .= "Estos son tus datos de registro:<br>"; 
$mensaje .= "Usuario: $usuario.<br>"; 
$mensaje .= "Contraseña: $contrasenya.<br>"; 
$mensaje .= "Debes activar tu cuenta pulsando este enlace: https://www.micocina.cat/activacion.php?id=".$row["id"]."&activate=$activate"; 

$asunto = "Activación de tu cuenta en micocina.cat"; 

 $headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: <info@micocina.cat>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";   

if(mail($email,$asunto,$mensaje,$headers)){ 
    $mensjsalida = $lang["errc1"];
}else{ 
    $mensjsalida = $lang["errc2"]; 
} 
               
                 
                 
				  }
                } 
            } 
        }
?> 
<html>
	<head>
		<title>Mi Cocina</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="images/ficon.png"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="css/usuarios.css" rel="stylesheet">
	</head>
	<body class="hm-gradient">
<div class="container mt-4" style="margin-bottom:5em;">
            <div class="container">
                                <div class="row">
                                    <div class="col-md-12"></div>
                                </div> 
                            </div>

            <div class="text-center darken-grey-text mb-4" style="margin-top:5em;">
                <h1 class="font-bold mt-4 mb-3 h5"><?php echo $lang["bien"]?> MiCocina.cat</h1>
                <img src="images/micocinaa.png" width="120px" height="100px" title="Mi Cocina" style=""/>
            </div>
            	
    <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                           <div style="color:#32CD32;padding: 15px;"><?php echo $mensjsalida; ?></div>
                            <!-- Form register -->
                            <form method="post" action="registro.php">
                                <h2 class="text-center font-up font-bold deep-orange-text py-4"><?php echo $lang["regi"]?></h2>
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="usuario" id="orangeForm-name3" class="form-control" maxlength="15">
                                    <label for="orangeForm-name3"><?php echo $lang["usr"]?></label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" name="contrasenya"  class="form-control" maxlength="15">
                                    <label><?php echo $lang["con"]?></label>
                                </div>
								<div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" name="contrasenyarep" class="form-control" maxlength="15">
                                    <label ><?php echo $lang["repe"]?></label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="text" name="email"  class="form-control">
                                    <label ><?php echo $lang["email"]?></label>
                                </div>
                                <div class="text-center">
									<input class="btn btn-deep-orange" type="submit" name="enviar" value="<?php echo $lang["regit"]?>">
                                </div>
                            </form>
                            
								<div style="color:red;"><?php echo $error; ?></div>
                            <div class="olvidar"> <a href="/inicio_sesion.php" ><p><?php echo $lang["yat"]?></p></a></div>
                            <!-- Form register -->
                        </div>
                    </div>
                </div>
            <!-- Grid row -->
        </div>
		<!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
</body>
</html>