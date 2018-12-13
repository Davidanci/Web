<?php 
	session_start();
include ("apartados/idiomas.php");
    include('acceso_db.php'); // incluímos los datos de acceso a la BD 
    if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos del formulario 
        if(empty($_POST['usuario'])) { 
            echo "No ha ingresado el usuario. <a href='javascript:history.back();'>Reintentar</a>"; 
        }else { 
             $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']); 
            //$usuario = trim($usuario); 
            $sql = mysqli_query($mysqli,"SELECT usuario, contrasenya, email FROM usuarios WHERE usuario='".$usuario."'"); 
            if(mysqli_num_rows($sql)) { 
                $row = mysqli_fetch_assoc($sql); 
                $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña 
                $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria 
                $usuario = $row['usuario']; 
				$_SESSION["usuario"]=$$_POST["usuario"];
                $contrasenya = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario 
                $contrasenya2 = $contrasenya; // encriptamos la nueva contraseña para guardarla en la BD 
                $email = $row['email']; 
                // actualizamos los datos (contraseña) del usuario que solicitó su contraseña 
                mysqli_query($mysqli,"UPDATE usuarios SET contrasenya='".$contrasenya2."' WHERE usuario='".$usuario."'"); 
                // Enviamos por email la nueva contraseña 
                $mensaje = "Recuperación de contraseña en micocina.cat<br>"; 
				$mensaje .= "Se ha generado una nueva contraseña para el usuario <strong>".$usuario."</strong>. La nueva contraseña es: <strong>".$contrasenya2."</strong>.<br>"; 
				$mensaje .="Para cambiar de contrasenya entre en el siguiente link:www.micocina.cat/nuevacontrasenya.php?user=$usuario";
				$asunto= "Recuperación de contraseña en micocina.cat";
				$headers =  'MIME-Version: 1.0' . "\r\n"; 
				$headers .= 'From: <info@micocina.cat>' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";   

				if(mail($email,$asunto,$mensaje,$headers)){ 
				echo "Se ha enviado un mensaje a la cuenta de correo asociada con el usuario para la recuperación de la contraseña.<a href='index.php'> Volver a la página.</a>";
				}else{ 
				echo "Ha ocurrido un error y no se puede enviar el correo"; 
				} 
            }else { 
                echo "El usuario <strong>".$usuario."</strong> no está registrado. <a href='javascript:history.back();'>Reintentar</a>"; 
            } 
        } 
    }else { 
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
<!------ Include the above in your HEAD tag ---------->
		
	</head>
	 <body class="hm-gradient">
    

        
        <!--MDB Forms-->
        <div class="container mt-4">

            <div class="text-center darken-grey-text mb-4" style="margin-top:5em;">
                <h1 class="font-bold mt-4 mb-3 h5"><?php echo $lang["recu"]?> Mi Cocina</h1>
                <img src="images/micocinaa.png" width="120px" height="100px" title="Mi Cocina" style=""/>
            </div>

            <!-- Grid row -->
			<form method="post" action="cambiocontrasenya.php">
            <div class="row" style="margin-bottom:5em;">
                <!-- Grid column -->
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> <?php echo $lang["recu"]?></h3>
                            <!--Body-->
                            <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <input type="text" name="usuario" id="" class="form-control">
                                <label for=""><?php echo $lang["usr"]?></label>
                            </div>
                            
                            <div class="text-center">
							<input type="submit" name="enviar" value="<?php echo $lang["enviar"]?>" class="btn btn-default waves-effect waves-light">
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <!-- Grid column -->
            </div>
			</form>
            <!-- Grid row -->
        </div>
				        <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
  
</body>
</html>
<?php 
    } 
?>