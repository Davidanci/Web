<?php include("acceso_db.php");?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include ("apartados/header.php"); ?>
		<!----//Menu movil---->
		<?php include ("cookies/cookies.php"); ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- wysihtml5 parser rules -->
<script src="/ruta-a-wysihtml5/parser_rules/advanced.js"></script>
<!-- Library -->
<script src="/ruta-a-wysihtml5/dist/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript">
	
	function crearCampos(cantidad){
var div = document.getElementById("ponercajas");
while(div.firstChild)div.removeChild(div.firstChild); // remover elementos;
    for(var i = 1, cantidad = Number(cantidad); i <= cantidad; i++){
    var salto = document.createElement("P");
    var input = document.createElement("input");
    var text = document.createTextNode("<?php echo $lang["ingrediente"]; ?> " + i + ": ");
    input.setAttribute("type","text");
    input.setAttribute("class","col-md-8");
    input.setAttribute("name", "ingrediente[]");
    input.setAttribute("id","formGroupExampleInput");
    input.setAttribute("placeholder","<?php echo $lang["iingrediente"]; ?>");
    input.required = true;
    input.className = "form-control";
    salto.appendChild(text);
    salto.appendChild(input);
    div.appendChild(salto);
        
    }
    if (cantidad>0) {
    	document.getElementById("ing").hidden=false;
	}else{
		document.getElementById("ing").hidden=true;
	}
}
</script>

<style>
    .fondopri{
        background-image: url(images/fondococi.png);
        
    }
    .conte{
       border: 3px solid #E2711D;
        border-radius: 12px;
        background-color:white;
        margin: 10px 0px 10px 0px;
        padding: 0px;

    }
    /* Flaired edges, by Tomas Theunissen */

hr.style-seven {
    overflow: visible; /* For IE */
    height: 30px;
    border-style: solid;
    border-color: #E2711D;
    border-width: 1px 0 0 0;
    border-radius: 20px;
}
hr.style-seven:before { /* Not really supposed to work, but does */
    display: block;
    content: "";
    height: 30px;
    margin-top: -31px;
    border-style: solid;
    border-color: #E2711D;
    border-width: 0 0 1px 0;
    border-radius: 20px;
}
    
        </style>
	</head>
	<body>
		<!----- start-header---->
		
			<?php include ("apartados/menu.php"); ?>
			<!----- //End-header---->
			<!----- Pricing ----->
			<div class="Pricing">
        <!----- header-section ---->
        <div class="header-section">
          <div class="container">
            <h1 style="color:white;"> <a href="https://micocina.cat/micocina.php" style="color:white;"> <?php echo $lang["micocina"]; ?> </a> > <?php echo $lang["subrecet"]; ?></h1>
          </div>
        </div>
        </div>
				<!----- header-section ---->

				<?php 
					if(isset($_SESSION["usuario"])){
						$usuario=$_SESSION["usuario"];

						//CODIGO PARA AGREGAR LAS RECETAS A NUESTRA BASE DE DATOS.

						if (isset($_POST["enviar"])) {
							$nombre=$_POST["nombre"];
							$descripcion=$_POST["descripcion"];
							$pasos=$_POST["pasos"];
							$cat1=$_POST["categoria1"];
							$cat2=$_POST["categoria2"];
							$cat3=$_POST["categoria3"];
							$cat4=$_POST["categoria4"];
                            $num=$_POST["num"];
							$id_user=$_SESSION["id"];
							function genera_random($longitud){  
							   $exp_reg="[^A-Z0-9]";  
							   return substr(preg_replace($exp_reg, "", md5(rand())) .  
						       preg_replace($exp_reg, "", md5(rand())) .  
						       preg_replace($exp_reg, "", md5(rand())),  
						       0, $longitud);  
							}
							//CREAMOS UN TOKEN ALEATORIO QUE IDENTIFICA A LA RECETA (IDENTIFICADOR UNICO) PARA REALIZAR UNA RELACIÓN ENTRE CATEGORIAS Y RECETAS.
							$tokenIdentificador = genera_random(5);
							$tokening=genera_random(5);
							 $nombre_imagen=$_FILES['img1']['name'];
				                $tipo_imagen=$_FILES['img1']['type'];
				                $tamagno_imagen=$_FILES['img1']['size'];
				                $nuevonombre=$usuario.$nombre."paso1.jpg";
				                //Ruta carpeta destino
				                $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/fotosRecetas/';
				                $subido=move_uploaded_file($_FILES['img1']['tmp_name'], $carpeta_destino.$nuevonombre);

				                $nombre_imagen2=$_FILES['img2']['name'];
				                $tipo_imagen2=$_FILES['img2']['type'];
				                $tamagno_imagen2=$_FILES['img2']['size'];
				                $nuevonombre2=$usuario.$nombre."paso2.jpg";
				                //Ruta carpeta destino
				                $carpeta_destino2=$_SERVER['DOCUMENT_ROOT'].'/fotosRecetas/';
				                $subido2=move_uploaded_file($_FILES['img2']['tmp_name'], $carpeta_destino2.$nuevonombre2);

				                $nombre_imagen3=$_FILES['img3']['name'];
				                $tipo_imagen3=$_FILES['img3']['type'];
				                $tamagno_imagen3=$_FILES['img3']['size'];
				                $nuevonombre3=$usuario.$nombre."paso3.jpg";
				                //Ruta carpeta destino
				                $carpeta_destino3=$_SERVER['DOCUMENT_ROOT'].'/fotosRecetas/';
				                $subido3=move_uploaded_file($_FILES['img3']['tmp_name'], $carpeta_destino3.$nuevonombre3);

				                $nombre_imagen4=$_FILES['img4']['name'];
				                $tipo_imagen4=$_FILES['img4']['type'];
				                $tamagno_imagen4=$_FILES['img4']['size'];
				                $nuevonombre4=$usuario.$nombre."paso4.jpg";
				                //Ruta carpeta destino
				                $carpeta_destino4=$_SERVER['DOCUMENT_ROOT'].'/fotosRecetas/';
				                $subido4=move_uploaded_file($_FILES['img4']['tmp_name'], $carpeta_destino4.$nuevonombre4);
				                
								$reg = mysqli_query($mysqli,"INSERT INTO recetas (nombre, descripcion, pasos , id_usuario, img, img2, img3, img4, tokenIdentificador,numPer) VALUES ('".$nombre."', '".$descripcion."', '".$pasos."','".$id_user."','".$nuevonombre."','".$nuevonombre2."','".$nuevonombre3."','".$nuevonombre4."','".$tokenIdentificador."','".$num."')");
								
								$ingredientes=$_POST["ingrediente"];

								for ($i=0; $i < count($ingredientes); $i++) {
									$tokening=genera_random(5);
                                    $tokenrel=genera_random(5); 
									$nuevoIng = mysqli_query($mysqli,"INSERT INTO ingredientes (nombre, tokenIng) VALUES ('".$ingredientes[$i]."','".$tokening."')");
									if ($nuevoIng) {
									//AGREGADA LA RECETA EN LA BASE DE DATOS, REALIZAMOS LA RELACIÓN ENTRE RECETAS Y INGREDIENTES, PARA SU VISUALIZACIÓN POSTERIOR.
									$buscaReceta=mysqli_query($mysqli,"SELECT * FROM recetas WHERE tokenIdentificador='".$tokenIdentificador."'");

									$row2   = mysqli_fetch_array($buscaReceta);
									$id_receta=$row2["id"];
									
									$buscaIng=mysqli_query ($mysqli,"SELECT * FROM ingredientes where tokenIng='".$tokening."'");
									$row3=mysqli_fetch_array($buscaIng);
									$id_ing=$row3["id"];
                                    

										$reling=mysqli_query($mysqli,"INSERT INTO relRecIng (id_receta, id_ingrediente) VALUES (".$id_receta.", ".$id_ing.")");

                                        
                                           
                                        
                                        
									}

								}


                            
		
							 if ($reg) {
                                 $respuesta ="
                            <div class='alert alert-success' role='alert'>
                              Receta subida correctamente!
                            </div>";
							 	//AGREGADA LA RECETA EN LA BASE DE DATOS, REALIZAMOS LA RELACIÓN ENTRE RECETAS Y CATEGORIAS, PARA SU VISUALIZACIÓN POSTERIOR.

							 	$query=mysqli_query($mysqli,"SELECT * FROM recetas WHERE tokenIdentificador='".$tokenIdentificador."'");
								$row   = mysqli_fetch_array($query);
								$id_receta=$row["id"];
								$relcat=mysqli_query($mysqli,"INSERT INTO relCatRec (id_receta, id_categoria) VALUES ('".$id_receta."', '".$cat1."')");
								$relcat2=mysqli_query($mysqli,"INSERT INTO relCatRec (id_receta, id_categoria) VALUES ('".$id_receta."', '".$cat2."')");
								$relcat3=mysqli_query($mysqli,"INSERT INTO relCatRec (id_receta, id_categoria) VALUES ('".$id_receta."', '".$cat3."')");
								$relcat4=mysqli_query($mysqli,"INSERT INTO relCatRec (id_receta, id_categoria) VALUES ('".$id_receta."', '".$cat4."')");

								//echo $cat1.$id_receta;
							 }else{
							 	$respuesta = "<div class='alert alert-danger' role='alert'>
                              Error
                            </div>";
							 }

							 
							
						}

						?>
					<div class="fondopri">
					<div class="container" >
					<div class="row conte">
<!--					<div class="col-md-3"></div>-->
                    
					<div class="col-md-12" style="margin:30px 0px 30px 0px !important;padding:20px 30px 20px 40px;">
					<?php echo $respuesta; ?>
					<h2 style="margin-bottom:0px !important;"><i class="fa fa-fire" style="font-size:26px; color:#E2711D;"></i> <?php echo $lang["subrecet"]; ?></h2><br>
					<hr style="margin-top:0px !important;">
					<form method="post" action="nuevareceta.php" enctype="multipart/form-data">
                             <div class="row">
                          <div class="col-md-6 form-group">
                            <label for="formGroupExampleInput"><?php echo $lang["nombrereceta"]; ?>:</label>
                            <input type="text" class="form-control" name="nombre" id="formGroupExampleInput" placeholder="<?php echo $lang["inombrereceta"]; ?>" required >
                            <br>
                            <hr class="style-seven">
                            
                          </div>
                          <div class="col-md-6 form-group">
                            <label for="wysihtml5-textarea"><?php echo $lang["describereceta"]; ?>:</label>
                            <textarea class="form-control" pattern="[^A-Za-z ]" name="descripcion" id="wysihtml5-textarea" rows="5" cols="40" minlength="100" placeholder="<?php echo $lang["idescribereceta"]; ?>" required ></textarea>
                          </div>
                          </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><?php echo $lang["escribepasos"]; ?>:</label>
                            <textarea class="form-control" name="pasos" id="exampleFormControlTextarea1" rows="8" cols="40" minlength="250" placeholder="<?php echo $lang["iescribepasos"]; ?>" required ></textarea>
                          </div>
<hr>
                       <label for="formGroupExampleSelect"><?php echo $lang["escogecategoria"]; ?></label>
                        <div class="row">
                        <div class="col-md-3">
                         <div class="form-group">
                         	<label for="formGroupExampleSelect"> <i class="fa fa-sun-o" style="font-size:20px; "> </i> <?php echo $lang["estacion"]; ?>:</label>
                         	<select name="categoria1" class="selectpicker form-control" required >
                         		
                         		<?php 

							 	$result = mysqli_query($mysqli,"SELECT * FROM categorias"); 
							   	while ($row = mysqli_fetch_array($result)) { 
							   		if($row["tipo"]=="Estacion"){
							   		echo "<option name='categoria' value='".$row["id"]."'>".$row["nombre"]."</option>";
							   		}elseif ($row["tipo"]=="Vacio"){
							   		echo "<option selected name='categoria' value='".$row["id"]."'>".$row["nombre"]."</option>";
							   		}
							   	}
?>
                         	</select>
                            </div>
                            </div>
                            <div class="col-md-3">
                         <div class="form-group">
                         	<label for="formGroupExampleSelect"> <i class="fa fa-users" style="font-size:20px; "> </i> <?php echo $lang["compromisoso"]; ?>:</label>
                         	<select name="categoria2" class="selectpicker form-control" required >
                         		
                         	<?php
                         		$result = mysqli_query($mysqli,"SELECT * FROM categorias");
                         		while ($row = mysqli_fetch_array($result)) { 
							   		if($row["tipo"]=="Compromiso social" ){
							   		echo "<option name='categoria' value='".$row["id"]."'>".$row["nombre"]."</option>";
							   		}elseif ($row["tipo"]=="Vacio"){
							   		echo "<option selected name='categoria' value='".$row["id"]."'>".$row["nombre"]."</option>";
							   		}
							   	}
                         	?>
                         	</select>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                         <div class="form-group">
                         	<label for="formGroupExampleSelect"> <i class="fa fa-clock-o" style="font-size:20px; "> </i> <?php echo $lang["momentodia"]; ?>:</label>
                         	<select name="categoria3" class="selectpicker form-control" required >
                         		
                         	<?php
                         		$result = mysqli_query($mysqli,"SELECT * FROM categorias");
                         		while ($row = mysqli_fetch_array($result)) { 
							   		if($row["tipo"]=="Momento-del-dia"){
							   		echo "<option name='categoria' value='".$row["id"]."'>".$row["nombre"]."</option>";
							   		}elseif ($row["tipo"]=="Vacio"){
							   		echo "<option selected name='categoria' value='".$row["id"]."'>".$row["nombre"]."</option>";
							   		}
							   	}
                         	?>
                         	</select>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                         <div class="form-group">
                         	<label for="formGroupExampleSelect"> <i class="fa fa-spoon" style="font-size:20px; "> </i> <?php echo $lang["tipocomida"]; ?>:</label>
                         	<select name="categoria4" class="selectpicker form-control" required >
                         		
                         	<?php
                         		$result = mysqli_query($mysqli,"SELECT * FROM categorias");
                         		while ($row = mysqli_fetch_array($result)) { 
							   		if($row["tipo"]=="Comida"){
							   		echo "<option name='categoria' value='".$row["id"]."'>".$row["nombre"]."</option>";
							   		}elseif ($row["tipo"]=="Vacio"){
							   		echo "<option selected name='categoria' value='".$row["id"]."'>".$row["nombre"]."</option>";
							   		}
							   	}
                         	?>
                         	</select>
                         </div>
                        </div>
                        </div>
                        
                        
                        
                         <div class="form-group">
                         	<label for="numcajas" ><?php echo $lang["cuantosingre"]; ?></label>
                         	<input type="text" class="form-control"  name="numero" id="numcajas" placeholder="1" min=1 onkeyup="crearCampos(this.value)" required >
                         </div>
                         
                         <div class="row">
                         <div class="col-md-8">
                         <div class="form-group" id="ing" hidden>
                         	<label for="formGroupExampleInput"><?php echo $lang["queingre"]; ?></label>
                         	<span id="ponercajas"></span>
                         </div>
                         </div>
                         
                         <div class="col-md-4" id="ponernum">
                         
                         </div>
                         
                         </div> 
                         
                          <div class="form-group">
                            <label for="numpersonas"><?php echo $lang["numeroper"]; ?>: </label>
                            <input  id="numpersonas" class="form-control" type="number" name="num" placeholder="<?php echo $lang["inumeroper"]; ?>" min="1" max="20" style="width:100%;">
                          </div>
                            
                         <div class="row">
                         <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlFile1"><?php echo $lang["imagen"]; ?> (<?php echo $lang["destacado"]; ?>)</label>
                            <input type="file" name="img1" class="form-control-file" id="exampleFormControlFile1" required >
                          </div>
                             </div>
                             <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlFile1"><?php echo $lang["imagen"]; ?> 2</label>
                            <input type="file" name="img2" class="form-control-file" id="exampleFormControlFile1" required>
                          </div>
                             </div>
                        </div>
                         <div class="row">
                         <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlFile1"><?php echo $lang["imagen"]; ?> 3</label>
                            <input type="file" name="img3" class="form-control-file" id="exampleFormControlFile1" required>
                          </div>
                             </div>
                             <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlFile1"><?php echo $lang["imagen"]; ?> 4</label>
                            <input type="file" name="img4"  class="form-control-file" id="exampleFormControlFile1" required>
                          </div>
                             </div>
                        </div>
                          <div class="alert alert-info"><?php echo $lang["infotxt"]; ?></div>
                          <button type="submit" name="enviar" class="btn btn-primary"><?php echo $lang["enviar"]; ?></button>
                    </form>
                    </div>
                    
                    </div>
                    </div>
                    </div>
                    <div class="clearfix"> </div>
<?php
					}
				?>

			
			
				<?php include ("apartados/footer.php"); ?>
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
							<script>
        $('#pdffile').change(function(){
     $('#subfile').val($(this).val());
});</script>

					<!---//smoth-scrlling---->
	</body>
</html>
