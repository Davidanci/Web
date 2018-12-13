<html>
	<head>
		<?php include ("apartados/header.php"); ?>

		<?php include ("cookies/cookies.php"); ?>
        <?php include ("acceso_db.php");
        if(isset($_GET["id"])){
                    $id=$_GET["id"];

                     $perfil = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE id='".$_GET['id']."'") or die(mysql_error()); 
                    if(mysqli_num_rows($perfil)) { // Comprobamos que exista el registro con la ID ingresada 
                    $row = mysqli_fetch_array($perfil); 
                    $id = $row["id"]; 
                    $usuario = $row["usuario"]; 
                    $email = $row["email"]; 
                    $fechareg = $row["fechaReg"]; 
                    $imagen=$row["imagenPerf"];
                    $recetas = mysqli_query($mysqli,"SELECT * FROM recetas WHERE id_usuario=".$_GET["id"]);
                    $num_campos = mysqli_num_rows($recetas);
                    
                }
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/dropdown.css" />
    <link rel="stylesheet" type="text/css" href="css/paneldecntrl.css" />
    
	</head>
	<body>

		<!----- start-header---->
			<?php include ("apartados/menu.php"); 
            
             ?>
       <div class="todop">
        <div class="text-center" style="background-color: #2EC4B6;padding:4%;">
        <table style="margin: 0 auto;text-align: center;">
            <td class="we"><a <?php echo "href='perfilusuario.php?id=".$id."'"; ?> > <img class="e" <?php echo "src='https://micocina.cat/avatares/".$imagen."'"; ?> alt="Avatar" style="border-radius: 50%; width:250px;height:220px;"></a></td>
            <tr>
              <?php echo "<td>".$usuario."</td> "; ?>
            </tr> 
            <tr>

                <td><i class="fa fa-fire" style="font-size:26px"></i>  <?php echo $num_campos." ".$lang["recetS"];?></td> 
            </tr>
            <tr>
            <?php if (isset($_POST['enviar'])){ 
                //if (isset ($addubica)) { 
                $nombre_imagen=$_FILES['upimagen']['name'];
                $tipo_imagen=$_FILES['upimagen']['type'];
                $tamagno_imagen=$_FILES['upimagen']['size'];
                $nuevonombre=$usuario.".jpg";
                //Ruta carpeta destino
                $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/avatares/';
                $subido=move_uploaded_file($_FILES['upimagen']['tmp_name'], $carpeta_destino.$nuevonombre);
                if ($subido) {
                    echo "Imagen subida";
                }else{
                    echo "Error";
                }
                $sql =  mysqli_query($mysqli,"Update usuarios set imagenPerf= ('".$nuevonombre."') where id=".$id);
                if ($sql) {
                      echo "Imagen subida";
                  }else{
                    echo "Hubo un error";
                  }  
                }  ?>
            
            
            <td>
            <form <?php echo 'action="controlpanel.php?id='.$id.'"' ?> method="post" enctype="multipart/form-data" > 
               <div class="form-group">
               
                <input name="upimagen" type="file" style="font-size:15px;"> 
                <input name="enviar" type="submit" value="<?php echo $lang["subiri"]?>" class="btn btn-dark" style="margin-top:1em;">
                 
  </div>
<span class='label label-info' id="upload-file-info"></span>
            </form>
            </td>
            </tr>
            </table>  
              
        </div>
        
        <div class="row text-center" style="">
          <div class="col-md-6" style="background-color: #FF9F1C;padding: 10%">
            <a><table style="margin: 0 auto;text-align: center;padding-top: 0 auto;">
                <tr class=" wa">
                    <td ><a href="https://micocina.cat/nuevareceta.php" style="color:white;"><i class="fa fa-cloud-upload i" style="font-size:126px"></i></a></td>
                </tr>
                <tr>
                    <td><a href="https://micocina.cat/nuevareceta.php" style="color:white;"><?php echo $lang["subirr"]?></a></td> 
                </tr>
                </table> </a>
            </div>
            
          <div class="col-md-6" style="background-color: #FFBF69;padding: 10%;">
            <a><table style="margin: 0 auto;text-align: center;">
                <tr class=" wa">
                    <td><a href="https://micocina.cat/verreceta.php" style="color:white;"><i class="fa fa-eye i" style="font-size:126px;"></i></a></td>
                </tr>
                <tr>
                    <td><?php echo '<a href="https://micocina.cat/verreceta.php?id='.$_GET["id"].'"'; ?> style="color:white;"><?php echo $lang["verr"]?></a></td> 
                </tr>
                </table> </a>
            </div>
        </div>
        
        <div class="row text-center">
            <div class="col-md-8" style="background-color: #CBF3F0;color:#6D6E71;padding:2% 2% 0% 2%;font-size:18px;"><a><?php echo $lang["sitiens"]?></a>
            <table class="infor">
                <tr>
                    <td class="wa"><a href="/blog"><i class="fa fa-newspaper-o i" style="font-size:96px;color:white;"></i></a></td>
                    <td class="wa"><a href="/contacto.php"><i class="fa fa-info-circle i" style="font-size:96px;color:white;"></i></a></td>
                </tr>
                <tr>
                    <td><a href="/blog">Blog</a></td>
                    <td><a href="/contacto.php"><?php echo $lang["contacto"]?></a></td> 
                </tr>
                </table>
            </div>
          <div class="col-md-4 wa" style="background-color: #FFFFFF;padding: 4%;">
            <a><table style="margin: 0 auto;text-align: center;color: black;">
                <tr>
                    <td><a href="cerrarsesion.php"><i class="fa fa-sign-out i" style="font-size:76px"></i></a></td>
                </tr>
                <tr>
                    <td><a href="cerrarsesion.php"><?php echo $lang["cerrar"]?></a></td> 
                </tr>
                </table> </a>
            </div>
        </div>
			</div>
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
					<!---//smoth-scrlling---->
					
					
    </body>
    </html>
    <?php
}else{
    echo "Acceso denegado";
}