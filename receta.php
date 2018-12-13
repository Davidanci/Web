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
		<!-- fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="style.css" />
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("a[rel=example_group]").fancybox({
        'transitionIn'        : 'none',
        'transitionOut'        : 'none',
        'titlePosition'     : 'over',
        'titleFormat'        : function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });
});
</script>
		<style>

            .nombrer{
                background-color: rgb(0,0,0,0.4);
                padding: 2px !important;
                text-align: center;
                border-radius: 5px;
                box-shadow: 0 0 45px rgb(0,0,0,0.5);
                background: rgb(0,0,0,0.3);
            }
            .imagenp{
                width:90vw;
                height: 30vw;
                border-radius: 5px;
            }
            .imagenper{
                width: 60px;
                height: 60px;
                border-radius: 50%;
                
            }
            .flama { 
            border-top: 3px solid #E2711D; 
               border-bottom: 2px dashed #E2711D; 
               border-left:none; 
               border-right:none; 
               height: 6px; 
 } 
            .fondopri{
        background-image: url(images/fondococi.png);
        padding:10px 0px 10px 0px;
    }
            .hrnormal {
                width: 60%;
                border: 1px solid #E2711D;
                padding: 0px !important;
                margin: 0px 0px 27px 0px !important;
            }
            
        
            /*Estilos de la galeria*/

.galeria {
	width: 90%;
	margin: auto;
	list-style: none;
	padding: 20px;
	box-sizing: border-box;
	
	display: flex;
	flex-wrap: wrap;
	justify-content: space-around;
}

.galeria li {
	margin: 5px;
}

.galeria img {
	width: 230px;
	height: 160px;
    border-radius:5px;
}

/*Estilos del modal*/

.modal {
	display: none;
}

.modal:target {
	
	display: block;
	position: fixed;
	background: rgba(0,0,0,0.8);
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.modal h3 {
	color: #fff;
	font-size: 30px;
	text-align: center;
	margin: 15px 0;
}

.imagen {
	width: 100%;
	height: 50%;
	
	display: flex;
	justify-content: center;
	align-items: center;
}

.imagen a {
	color: #fff;
	font-size: 40px;
	text-decoration: none;
	margin: 0 10px;
}

.imagen a:nth-child(2) {
	margin: 0;
	height: 100%;
	flex-shrink: 2;
}

.imagen img {
	width: 500px;
	height: 100%;
	max-width: 100%;
	border: 7px solid #fff;
	box-sizing: border-box;
}

.cerrar {
	display: block;
	background: #fff;
	width: 25px;
	height: 25px;
	margin: 15px auto;
	text-align: center;
	text-decoration: none;
	font-size: 25px;
	color: #000;
	padding: 5px;
	border-radius: 50%;
	line-height: 25px;
}
        </style>
	</head>
	<body>
		<!----- start-header---->
			<?php include ("apartados/menu.php"); ?>
			<!----- //End-header---->
			<div class="Pricing">
				<!----- header-section ---->
				<div class="header-section">
					<div class="container">
						<h1 class="nombrer"><?php echo $lang["recetasdee"]; ?> Mi Cocina.cat</h1>
					</div>
				</div>
				<!----- header-section ---->
			</div>
				
				
				
				<?php 
				$query = $mysqli->query("select * from recetas where id=".$_GET["id"]);
				$row = $query->fetch_assoc();

				$query2 = $mysqli->query("SELECT usuario, imagenPerf, recetas.nombre from usuarios JOIN recetas ON usuarios.id = recetas.id_usuario WHERE recetas.id=".$_GET["id"]);
				$row2 = $query2->fetch_assoc();

				
				
				?>
				
				<div class="fondopri">
				<div class="container" style="background-color:#F2F2F2;border-radius:3px;">
                  
                <div class="row">
                 <div class="col-md-1"></div>
                  <div class="col-md-10"><?php echo '<img src="https://micocina.cat/fotosRecetas/'.$row["img"].'"alt="" class="img-responsive imagenp">'; ?> </div>
                  <div class="col-md-1"></div>
                   
                </div>
                <div class="row">
                    <div class="col-md-2 text-left" style="background-color:#EDEDED;padding:5px;border-radius:2px;margin-left:9px !important;">
                    <?php echo '<img src="https://micocina.cat/avatares/'.$row2["imagenPerf"].'" alt="" class="imagenper">'; ?>
                    <?php echo $row2["usuario"];?>
                    </div>
                    <div class="col-md-8 text-center"><h1><?php echo $row["nombre"]; ?></h1></div>
                    <div class="col-md-2"></div>
                </div>
					<hr class="flama">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-9">
                    
                    <?php echo $row["descripcion"];?>   
                    
                    </div>
                    <div class="col-md-1"></div>
                </div>
                
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-9">
                    <h3><?php echo $lang["ingredientess"];?></h3>
                    <hr class="hrnormal" align="left">
                    <p><strong><?php echo $lang["para"];?> <?php echo $row["numPer"];?> <?php echo $lang["personass"];?></strong></p>
                    <ul style="list-style-type:none">
                     <?php
                     $query3=$mysqli->query("SELECT ingredientes.nombre from ingredientes
										join relRecIng ON ingredientes.id = relRecIng.id_ingrediente
										join recetas ON relRecIng.id_receta = recetas.id
										where recetas.id=".$_GET["id"]);
                     	while($row3 = $query3->fetch_assoc()){
                     		echo "<li>- ".$row3["nombre"]."</li>";
                     	}

                     ?>
                    </ul>  
                    </div>
                    <div class="col-md-1"></div>
                </div>   
                  
                 <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-9">
                    <h3><?php echo $lang["comoh"];?> <?php echo $row["nombre"]; ?></h3>
                    <hr class="hrnormal" align="left">
                    <p><?php echo $row["pasos"];?></p>    
                    </div>
                    <div class="col-md-1"></div>
                </div>     
                  
                    <div class="container">
                           
                           
                           
        <ul class="galeria">
		
		<li><a href="#img2"><?php echo '<img src="https://micocina.cat/fotosRecetas/'.$row["img2"].'">'; ?></a></li>
		<li><a href="#img3"><?php echo '<img src="https://micocina.cat/fotosRecetas/'.$row["img3"].'">'; ?></a></li>
		<li><a href="#img4"><?php echo '<img src="https://micocina.cat/fotosRecetas/'.$row["img4"].'">'; ?></a></li>
		<li><a href="#img1"><?php echo '<img src="https://micocina.cat/fotosRecetas/'.$row["img"].'">'; ?> </a></li>
	</ul>

	
	
	<div class="modal" id="img2">
		<h3>Paso 1</h3>
		<div class="imagen">
			<a href="#img1">&#60;</a>
			<a href="#img3"><?php echo '<img src="https://micocina.cat/fotosRecetas/'.$row["img2"].'">'; ?></a>
			<a href="#img3">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
	
	<div class="modal" id="img3">
		<h3>Paso 2</h3>
		<div class="imagen">
			<a href="#img2">&#60;</a>
			<a href="#img4"><?php echo '<img src="https://micocina.cat/fotosRecetas/'.$row["img3"].'">'; ?></a>
			<a href="#img4">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
	
	<div class="modal" id="img4">
		<h3>Paso 3</h3>
		<div class="imagen">
			<a href="#img3">&#60;</a>
			<a href="#img1"><?php echo '<img src="https://micocina.cat/fotosRecetas/'.$row["img4"].'">'; ?></a>
			<a href="#img1">></a>
		</div>
		<a class="cerrar" href="">x</a>
	</div>
    <div class="modal" id="img1">
		<h3><?php echo $lang["paso"];?> 4</h3>
		<div class="imagen">
			<a href="#img4">&#60;</a>
			<a href="#img2"><?php echo '<img src="https://micocina.cat/fotosRecetas/'.$row["img"].'">'; ?> ></a>
			<a href="#img2"></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>               
                    
                    

                    </div>  
               </div>
                </div>
        
        
        
        
        
        
        
        
        
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