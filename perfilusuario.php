<html>
	<head>
	<?php include ("apartados/header.php"); ?>
    <?php include ("apartados/idiomas.php");
     include ("cookies/cookies.php"); 
    session_start();
    ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="http://code.jquery.com/jquery.js"></script>

    <!-- Librería jQuery personalizada-->

    <link href="css/personalizado.css" rel="stylesheet">
    <!-- Referencia a otro archivo css propio, donde se realizan las modificaciones css de la página principal -->
    <link href="css/starter-template.css" rel="stylesheet">
    <style>
        body {
            padding-top: 0px !important;
        }
        .separartop {
            margin-top: 3em !important; 
        }
    </style>
	</head>
	<body>
		<!----- start-header---->
    <?php include ("apartados/menu.php"); ?>
    

<?php


     include ("acceso_db.php");
        if(isset($_GET["id"])){
                        $id=$_GET["id"];

                        $perfil = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE id='".$_GET['id']."'") or die(mysql_error()); 
                        if(mysqli_num_rows($perfil)) { // Comprobamos que exista el registro con la ID ingresada 
                        $row = mysqli_fetch_array($perfil); 
                        $id = $row["id"]; 
                        $usuario = $row["usuario"];
                        $contrasenya = $row["contrasenya"]; 
                        $fechareg = $row["fechaReg"]; 
                        $imagen=$row["imagenPerf"];
                        $msg="";
                        
                        if(isset($_POST["enviar"])){
                           
        // Procedemos a comprobar que los campos del formulario no estén vacíos 
        $sin_espacios = count_chars($_POST['usuario'], 1); 
        if(!empty($sin_espacios[32])) { // comprobamos que el campo usuario_nombre no tenga espacios en blanco 
            $msg= $lang["err1"]; 
        }elseif(empty($_POST['usuario'])) { // comprobamos que el campo usuario_nombre no esté vacío 
            $msg= $lang["err2"]; 
        }elseif(empty($_POST['contrasenya'])) { // comprobamos que el campo usuario_clave no esté vacío 
            $msg= $lang["err3"]; 
        }else {
                            $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
                            
                            $contrasenya = mysqli_real_escape_string($mysqli,$_POST['contrasenya']); 
                            
                            $sql = mysqli_query($mysqli,"SELECT usuario FROM usuarios WHERE usuario='".$usuario1."'"); 
            
            if(mysqli_num_rows($sql) > 0) { 
                $msg= $lang["err6"]; 
            }else {
                            $_SESSION["usuario"]=$usuario; 
                            $cambios = mysqli_query($mysqli,"Update usuarios Set usuario ='$usuario',contrasenya ='$contrasenya' Where id='$id'");
                            $msg= "<span>Los datos han sido actualizados correctamente.</span>";
                        }
                    }
            }
        }
}
?>

<!-- Contenido de la página -->
    <div class="container separartop">
        <!-- Contact Form -->
        <!-- Campos del formulario de contacto con validación de campos-->
        <div class="row">
            <!-- Columna de la izquierda -->
            <div class="col-md-3">
                <div class="col-md-12" align="center">
                    <img class="img-responsive img-portfolio img-hover" <?php echo "src='https://micocina.cat/avatares/".$imagen."'"; ?> >
                    <!-- <img class="img-responsive img-portfolio img-hover" <?php /*echo "src='https://micocina.cat/avatares/".$imagen."'"; */?> alt="Avatar"> -->
                </div>
                <div class="col-md-12">
                    <p class="text-center"><strong><?php echo $usuario; ?></strong></p>
                </div>
            </div>
            <!-- Fin de Columna de la izquierda -->

            <!-- Parte central -->
            <div class="col-md-9">
                <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey;">
                    <h3 style="text-align: center">Mi perfil <p><small>Añade información personal para compartir tu perfil</small></p></h3>
                </div>
                <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
                <form name="modifyProfile" <?php echo "action='perfilusuario.php?id=".$id."'"; ?> method="post" id="profileForm" novalidate>
                <!-- Inicio del div central parte de formulario información básica -->
                <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
                    <div class="col-md-8 col-md-offset-2">
                        
                            <div class="control-group form-group">
                                <div class="controls">
                                    <br >
                                    <label>Información básica</label>
                                    <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                                        <br>Usuario:<input name="usuario" type="text" class="form-control" <?php echo "value='".$usuario."'" ?> id="txtName" required data-validation-required-message="Por favor introduzca su nuevo usuario.">
                                    </span>
                                    <br >
                                    <span id="alertSurname" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                                         Contraseña:<input name="contrasenya" type="password" class="form-control" id="txtSurname" <?php echo "value='".$contrasenya."'" ?> required data-validation-required-message="Por favor introduzca su nueva contraseña.">
                                    </span>
                                    <br >
                                    
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            
                    </div>
                </div>

                <!-- Fin del div central parte de formulario información básica -->
                    
                    <!-- Botones formulario -->
                    <div class="col-md-12 container allFormButtons">
                        <br >
                        <div><?php echo $msg ?></div>
                        <div class="col-md-2 col-md-offset-2">
                            <div class="form-group">
                              <a <?php echo "href='controlpanel.php?id=".$id."'"; ?> ><button type="button" id="btnCancel" class="btn btn-outline-danger">Volver</button></a>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-3">
                            <div class="form-group">
                                <input type="submit" name="enviar" id="btnEnviar" class="btn btn-outline-success" value="Actualizar">
                            </div>
                        </div>
                        &nbsp;
                    </div>
                    <!-- Fin botones formulario -->
                </div>
                <!-- Fin Parte central - enlaces -->
            </form>
            <!-- Fin del form -->
            </div>  
            <!-- Fin del div de parte central -->
        </div>
    
<br>    
    
    
    
    <?php include ("apartados/footer.php"); ?>

			<!---smoth-scrlling---->
							<script type="text/javascript">
									$(document).ready(function(){
									$('a[href^="#"]').on('click',function (e) {
									    e.preventDefault();
									    var target = this.hash,
									    $target = $(target);
									    $('html, body').stop().animate({
									        'scrollTop': $target.offset().top
									    }, 1000, 'swing', function () {
									        window.location.hash = target;
									    });
									});
								});
							</script>
			</body>
    </html>