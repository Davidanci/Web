<?php
session_start(); 
//datos para establecer la conexion con la base de mysql. 
include("acceso_db.php");
include ("apartados/idiomas.php");

function quitar($mensaje) 
{ 
    $nopermitidos = array("'",'\\','<','>',"\""); 
    $mensaje = str_replace($nopermitidos, "", $mensaje); 
    return $mensaje; 
} 
$activacion= "1";  //creo la variable $activacion=1 para compararla despues con el campo de la BD estado y si son uno le dejara pasar 
if (isset($_POST['usuario'])) { 
	$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']); 
    $contrasenya = mysqli_real_escape_string($mysqli,$_POST['contrasenya']);   


    // Puedes utilizar la funcion para eliminar algun caracter en especifico 
   /* $usuario = strtolower(quitar($HTTP_POST_VARS["usuario"])); 
    $contrasenya = $HTTP_POST_VARS["password"]; */
    
    $error="";
    $result = mysqli_query($mysqli,"SELECT id, usuario, contrasenya, activacion, imagenPerf FROM usuarios WHERE usuario='".$usuario."'"); 
    if($row = mysqli_fetch_array($result)){ 
        if($row["contrasenya"] == $contrasenya){
			if($row["activacion"]==$activacion){
            $_SESSION["usuario"] = $row['usuario']; 
			$_SESSION["id"]=$row["id"];
            $id=$row["id"];
            $_SESSION["imagenPerf"]=$row["imagenPerf"];
			if(isset($_POST['recordar']) && !empty($_POST['recordar'])){
					setcookie("pass", $passHash, time() + 3600);
                    setcookie("user", $usuario, time() + 3600);
                    $reg = mysqli_query($mysqli,"UPDATE usuarios set cookie = '".$_COOKIE['pass']."' WHERE id=".$id); 
				}
                header("Location: index.php");
				
         
         }else{ 
            $error1 = $lang["error1"]; 
        session_destroy();} 
    }else{ 
		$error1 = $lang["error2"];}
		}else{ 
        $error1 = $lang["error2"];
    } 
        } 
    mysqli_close($mysqli); 
     

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
		<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
<!------ Include the above in your HEAD tag ---------->
		<?php include ("cookies/cookies.php"); ?>
	</head>
	 <body class="hm-gradient">
    <script>
	// Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_US/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
	 </script>

        
        <!--MDB Forms-->
        <div class="container mt-4">
        
            <div class="text-center darken-grey-text mb-4" style="margin-top:5em;">
                <h1 class="font-bold mt-4 mb-3 h5"><?php echo $lang["bien"]?> MiCocina.cat</h1>
                <img src="images/micocinaa.png" width="120px" height="100px" title="Mi Cocina" style=""/>
            </div>

            <!-- Grid row -->
			<form method="post" action="inicio_sesion.php">
            <div class="row" style="margin-bottom:5em;">
                <!-- Grid column -->
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i><?php echo $lang["ini"]?> </h3>
                            <!--Body-->
                            <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i>
                               <?php if(isset($_COOKIE["user"]) && !empty ($_COOKIE["user"])){
                                    echo '<input type="text" name="usuario" id="" class="form-control" value="'.$_COOKIE["user"].'">';
                                }else{
                                    echo '<input type="text" name="usuario" id="" class="form-control">';
                                }
                                ?>
                                <label for=""><?php echo $lang["usr"]?></label>
                            </div>
                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
								<?php if(isset($_COOKIE["pass"]) && !empty ($_COOKIE["pass"])){
									echo '<input type="password" name="contrasenya" id="" class="form-control" value="'.$_COOKIE["pass"].'">';
								}else{
									echo '<input type="password" name="contrasenya" id="" class="form-control">';
								}
								?>
                                <label for=""><?php echo $lang["con"]?></label>
                            </div>
                            
                            <div class="text-center">
							<input type="submit" class="btn btn-default waves-effect waves-light" value="<?php echo $lang["enviar"]?>">
                            <label for="success" class="btn btn-success"><?php echo $lang["rec"]?> <input type="checkbox" id="success" class="badgebox" name="recordar"><span class="badge">&check;</span></label>
                                
                            </div>
                            <div style="color:red;"><?php echo $error1; ?></div>
                           <div class="olvidar"> <a href="cambiocontrasenya.php" ><p><?php echo $lang["has"]?></p></a></div>
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