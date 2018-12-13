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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="css/paneldecntrl.css" />
		
<!------ Include the above in your HEAD tag ---------->
		<?php 
		include('apartados/header.php');
		include ("cookies/cookies.php");
		?>
	</head>
	
	<body>
	<?php
	
    session_start(); 
    include('acceso_db.php'); 
	
	include('apartados/menu.php');
	?>
        <body>
                <?php
	
	$id=$_GET["id"];
    $perfil = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE id='".$_GET['id']."'") or die(mysql_error()); 
    if(mysqli_num_rows($perfil)) { // Comprobamos que exista el registro con la ID ingresada 
        $row = mysqli_fetch_array($perfil); 
        $id = $row["id"]; 
        $usuario = $row["usuario"]; 
        $email = $row["email"]; 
        $fechareg = $row["fechaReg"]; 
		echo "<div style='background-color:#e6ffff;' >";
		echo "<span style='text-align:center;' ><strong><h2><br>¡Bienvenido a tu panel de Control ".$usuario."!</h2></strong></span>";
			echo "<form action='panel_de_control.php?id=".$id."' method='post'>";
			echo '<div class="row" style="margin-bottom:1em;justify-content:normal !important;">';
            echo'   <div class="col-md-6 offset-md-3">';
            echo 	'<div class="card">';
            echo'            <div class="card-body">';
            echo'               <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> Actualizar datos:</h3>';
            echo'	             <div class="md-form">';
            echo'                    <i class="fa fa-envelope prefix grey-text"></i>';
              echo'                  <input type="text" name="usuario" id="" class="form-control"  value='.$row['usuario'].'>';
               echo'                 <label for="">Usuario</label>';
               echo'             </div>';
			   echo'<div class="md-form">';
            echo'                    <i class="fa fa-envelope prefix grey-text"></i>';
              echo'                  <input type="password" name="contrasenya" id="" class="form-control"  value='.$row['contrasenya'].'>';
               echo'                 <label for="">Contraseña</label>';
               echo'             </div>';
			echo'<div class="md-form">';
            echo'                    <i class="fa fa-envelope prefix grey-text"></i>';
              echo'                  <input type="text" name="email" id="" class="form-control"  value='.$row['email'].'>';
               echo'                 <label for="">Email</label>';
               echo'             </div>';
			   echo '<input type="submit" value="Cambiar" name="cambiadatos"></div></div></div></div>';
			
			echo '</form>';
			
			if(isset($_POST["cambiadatos"])){
				$usuario1 = mysqli_real_escape_string($mysqli,$_POST['usuario']); 
				$contrasenya1 = mysqli_real_escape_string($mysqli,$_POST['contrasenya']); 
				$email1= mysqli_real_escape_string($mysqli,$_POST['email']); 
				$cambios = mysqli_query($mysqli,"Update usuarios Set usuario ='$usuario1',contrasenya ='$contrasenya1',email = '$email1' Where id='$id'");
				$msg= "<span style='color:green'>Los datos han sido actualizados correctamente.</span>";
			}else{
				$msg= "<span style='color:red'>Error</span>";
			}
			echo $msg;
			include('apartados/footer.php');
			echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>';
			echo "</div>";
			echo "</body>";
		}
		
 
    else { 
?> 
        <p>El perfil seleccionado no existe o ha sido eliminado.</p> 
<?php 
    } 
?>