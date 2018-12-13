<?php 
    session_start(); 
    include('acceso_db.php'); // incluímos los datos de conexión a la BD 
    if(isset($_GET['user'])) {
		$usuario=$_GET["user"];
        if(isset($_POST['enviar1'])) { 
            if($_POST['contrasenya'] != $_POST['contrasenya_conf']) { 
                echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>"; 
            }else { 
                
                $contrasenya =$_POST["contrasenya"];  
                $sql = mysqli_query($mysqli,"UPDATE usuarios SET contrasenya='".$contrasenya."' WHERE usuario='".$usuario."'"); 
                if($sql) { 
                    echo "Contraseña cambiada correctamente. <a href='index.php'> Volver a la página</a>";

					session_destroy();
                }else { 
                    echo "Error: No se pudo cambiar la contraseña. <a href='javascript:history.back();'>Reintentar</a>"; 
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
                <h1 class="font-bold mt-4 mb-3 h5">Recuperación de contraseña en Mi Cocina</h1>
                <img src="images/micocinaa.png" width="120px" height="100px" title="Mi Cocina" style=""/>
            </div>

            <!-- Grid row -->
			<form method="post" <?php echo 'action="nuevacontrasenya.php?user='.$usuario.'">'; ?>
            <div class="row" style="margin-bottom:5em;">
                <!-- Grid column -->
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> Recuperación contraseña.</h3>
                            <!--Body-->
                            <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <input type="password" name="contrasenya" id="" class="form-control">
                                <label for="">Contraseña</label>
                            </div>
							<div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <input type="password" name="contrasenya_conf" id="" class="form-control">
                                <label for="">Confirmar Contraseña</label>
                            </div>
                            
                            <div class="text-center">
							<input type="submit" name="enviar1" value="Enviar" class="btn btn-default waves-effect waves-light">
                                
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
    }else { 
        echo "Acceso denegado."; 
    } 
?>