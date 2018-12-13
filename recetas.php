<?php 
    session_start();
    include('acceso_db.php'); 
    
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include ("apartados/header.php"); ?>
		<!----//Menu movil---->
		<?php include ("cookies/cookies.php"); ?>
		
		<style>
            .primerdiv{
                border:2px solid white;
                border-radius:5px;
                padding-bottom:20px;
                background-color: #F7F7F7;
                margin-bottom: 20px;
            }
        .tabla {
               margin: 10px 0px 50px 0px;
                padding: 40px;
                background-color: white;
                border-radius: 10px;
                border: 1px solid rgb(226,113,29,0.15);
            }
            table{
                border: 2px solid #E2711D;
                
            }
            th, td {
    border-bottom: 1px solid rgb(226,113,29,0.25);
            }
            
            .imagentabla {
                width: 50px;
                height: 50px;
                border-radius: 3px;
            }
                            
}</style>
	</head>
	<body>
		<!----- start-header---->
			<?php include ("apartados/menu.php"); ?>
			<!----- //End-header---->
			<!----- About ----->
			<div class="about">
				<!----- header-section ---->
				<div class="header-section">
					<div class="container">
						<h1><?php echo $lang["recetas"]?></h1>
					</div>
				</div>
				
				<div style="padding:20px 0px 20px 0px;">
				<div class="container" style="background-color:#F0F0F0;border-radius:5px;"> 
                    <div class="primerdiv" style="margin-top:10px;">
					<h1 align="center">¡<?php echo $lang["encuentra"]?>!</h1>
                   <hr align=center style="width:15%;border-color:#E2711D;">
                    </div>
					<div class="row primerdiv">
						<form method="post" action="recetas.php">
						<div class="col-md-6">
								<h3><?php echo $lang["recetaa"]?></h3>
								 <input type="text" class="form-control" name="nombre" id="formGroupExampleInput" placeholder="Nombre recetas...">
							</div>
							
							<div class="col-md-6">
								<h3><?php echo $lang["ingredientess"]?></h3>
								<i><?php echo $lang["mantengac"]?></i>
								<select class="selectpicker form-control" name="ingrediente[]" multiple size="10px" style="width:280px">
									<?php 

							 	$result = mysqli_query($mysqli,"SELECT * FROM ingredientes"); 
							   	while ($row = mysqli_fetch_array($result)) { 
							   			echo "<option name='ingrediente' value='".$row["id"]."'>".$row["nombre"]."</option>";
							   		
							   	}
?>
								</select>
							</div>
                        
							</div>
							
							<div class="primerdiv">
							<h3 align="center"><?php echo $lang["categoriass"]?></h3>
							<hr align=center style="width:30%;border-color:#E2711D;">
							<div class="row">
								
								<div class="col-md-3">
								<h4><?php echo $lang["estacion"]?></h4>
								<?php
								$result = mysqli_query($mysqli,"SELECT * FROM categorias"); 
							   	while ($row = mysqli_fetch_array($result)) { 
							   		if($row["tipo"]=="Estacion"){
							   		echo "<input type='checkbox' name='categoria[]' value='".$row["id"]."'>". $row["nombre"]."<br>";
							   		}
							   	}
							   	?>
							   	</div>
							   	<div class="col-md-3">
								<h4><?php echo $lang["compromisoso"]?></h4>
								<?php
								$result = mysqli_query($mysqli,"SELECT * FROM categorias");
								while ($row = mysqli_fetch_array($result)) { 
							   		if($row["tipo"]=="Compromiso social" ){
							   			echo "<input type='checkbox' name='categoria[]' value='".$row["id"]."'>". $row["nombre"]."<br>";
							   		}
							   	}

							   	?>
							   	</div>
							   	<div class="col-md-3">
								<h4><?php echo $lang["momentodia"]?></h4>
								<?php
								$result = mysqli_query($mysqli,"SELECT * FROM categorias"); 
							   	while ($row = mysqli_fetch_array($result)) { 
							   		if($row["tipo"]=="Momento-del-dia"){
							   		echo "<input type='checkbox' name='categoria[]' value='".$row["id"]."'>". $row["nombre"]."<br>";
							   		}
							   	}
							   	?>
							   	</div>
							   	<div class="col-md-3">
								<h4><?php echo $lang["tipocomida"]?></h4>
								<?php
								$result = mysqli_query($mysqli,"SELECT * FROM categorias"); 
							   	while ($row = mysqli_fetch_array($result)) { 
							   		if($row["tipo"]=="Comida"){
							   		echo "<input type='checkbox' name='categoria[]' value='".$row["id"]."'>". $row["nombre"]."<br>";
							   		}
							   	}
							   	?>
							   	</div>
							
							</div>
							</div>
							<div class="row" style="margin-bottom:20px;">
							<div class="col-md-12">
								<input type="submit" name="enviar" class="btn btn-warning" value="<?php echo $lang["enviar"]?>">
								<input type="submit" name="reiniciar" value="<?php echo $lang["reiniicar"]?>" class="btn btn-warning">
								</div>
								</div>
						</form>
						
					


				<div class="table-responsive">
				<table  class="table" >
					<tr>
						<td style="border-bottom: 1px solid rgb(226,113,29);"><strong>Imagen</strong></td>
						<td style="border-bottom: 1px solid rgb(226,113,29);"><strong>Nombre</strong></td>
						<td style="border-bottom: 1px solid rgb(226,113,29);"><strong><?php echo $lang["nomdescrip"]?></strong></td>

					</tr>
								<?php 

								
								if (isset($_POST["enviar"])) {
						
								if (!empty($_POST["nombre"])) {
									$nombre=$_POST["nombre"];

									$query=$mysqli->query("select * from recetas where nombre like '%".$nombre."%'");
								}elseif(isset($_POST["categoria"])){
									$cat=$_POST["categoria"];
									for ($i=0; $i < count($cat); $i++) { 
										$query=$mysqli->query("SELECT recetas.nombre , descripcion, recetas.id , recetas.img from recetas JOIN relCatRec on relCatRec.id_receta = recetas.id JOIN categorias on relCatRec.id_categoria = categorias.id
										WHERE  relCatRec.id_categoria='".$cat[$i]."'");
									}
									
								}elseif(isset($_POST["ingrediente"])){
									$ing=$_POST["ingrediente"];
									
									for ($i=0; $i < count($ing); $i++) { 
										$query=$mysqli->query("SELECT recetas.nombre , descripcion , recetas.id , recetas.img from recetas JOIN relRecIng on relRecIng.id_receta = recetas.id JOIN ingredientes on relRecIng.id_ingrediente = ingredientes.id
										WHERE  relRecIng.id_ingrediente='".$ing[$i]."'");
									}
								}else{
									$query = $mysqli->query("select * from recetas");

								}
							}else{
								$query = $mysqli->query("select * from recetas");
								
							}

							if (isset($_POST["reiniciar"])) {
								 	$query = $mysqli->query("select * from recetas");
								 }	 
									
								 	

									while($row = $query->fetch_assoc()){
										echo "<tr>";
											echo "<td ><img src='https://micocina.cat/fotosRecetas/".$row["img"]."' class='imagentabla'></td>";
											echo "<td><a href='https://micocina.cat/receta.php?id=".$row["id"]."'>".$row["nombre"]."</a></td>";
											echo "<td> <div style='width: 700px;'> <div style='white-space: nowrap;text-overflow: ellipsis; overflow: hidden;'><p title='".$row["descripcion"]."'>".$row["descripcion"]."</p></div></div></td>";
											
										echo "</tr>";
									}


								?>
						</table>
                  
                    
                   
                    </div>
				</div>
				</div>

			<!----- About ----->
			<!----- pricing and plan ----->

			<?php if(!isset($_SESSION["usuario"])) {?>
			<div class="pricing-plan">
				<div class="container">
					<div class="pricing-plan-grids">
						<div class="pricing-plan-left">
							<h2><?php echo $lang["quieres"]?></h2>
							<span><?php echo $lang["registxt"]?></span>
						</div>
						<div class="pricing-plan-right">
							<a class="price-btn" href="/registro.php"><?php echo $lang["registrar"]?></a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<?php } ?>
			<!----- pricing and plan ----->
			<!----- footer ----->
             <?php include ("apartados/footer.php"); ?>
			<!----- footer ----->
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