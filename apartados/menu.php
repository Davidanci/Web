<?php
error_reporting(E_ALL);

?>

               
                <div id="home" class="header">
					<div class="top-header" id="move-top">
						<div class="container">
						<div class="logo">
							<a href="index.php"><img src="images/micocinaa.png" width="120px" height="100px" title="Mi Cocina" style=""/></a>
						</div> 
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li <?php if($_SERVER['REQUEST_URI'] == "/index.php") echo "class='active'"?> <?php if($_SERVER['REQUEST_URI'] == "/") echo "class='active'"?>><a href="index.php"><?php echo $lang["inicio"]?> </a></li>
								<li <?php if($_SERVER['REQUEST_URI'] == "/recetas.php") echo "class='active'"?>><a href="recetas.php"><?php echo $lang["recetas"]?></a></li>
								<li <?php if($_SERVER['REQUEST_URI'] == "/micocina.php") echo "class='active'"?>><a href="micocina.php"><?php echo $lang["micocina"]?></a></li>
								<li <?php if($_SERVER['REQUEST_URI'] == "/blog.php") echo "class='active'"?>><a href="/blog">Blog</a></li>
								<li  <?php if($_SERVER['REQUEST_URI'] == "/contacto.php") echo "class='active'"?>><a href="contacto.php"><?php echo $lang["contacto"]?></a></li>
								<li>
                            </li>
							</ul>
							<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
						</nav>
						<!----- contact-info ----->
						<div class="contact-info">
							<p><?php echo $lang["frase"]?></p>
							
							<?php
    
							if(isset($_SESSION["usuario"])){
							
                    		$imagen=$_SESSION["imagenPerf"];
                    		
							?>
								
								
								 <div class="dropdown ">
								<img class="e" <?php echo "src='https://micocina.cat/avatares/".$imagen."'"; ?> style="border-radius: 50%; width:60px;height:55px;border: 1px solid #FF9F1C; padding: 1px;"> <button class="button" ><span class="ajustes" style="text-transform: uppercase;">  <strong class="usr"><?php echo $_SESSION["usuario"] ?> </strong></span></button>
								<div class="dropdown-content">
								<p><a  href="controlpanel.php?id=<?php echo $_SESSION["id"]?>"><?php echo $lang["panelc"]; ?></a></p>
								<p><a  href="cerrarsesion.php"><?php echo $lang["cerrar"]; ?></a></p>
								 </div>
								 <div class="clearfix"> </div>
								 </div>
							<?php }else{ ?>
								 <div class="contact-info-grids">
								 <div class="contact-info-left">
								 <a class="chat" href="inicio_sesion.php"><?php echo $lang["sesion"] ?></a>
								 </div>
								 <div class="contact-info-right contact-info-left">
									<a class="chat" href="registro.php"><?php echo $lang["registrar"]?></a>
								 </div>
								<div class="clearfix"> </div>
								</div>
							<?php } ?>
							
						</div>
						<!----- contact-info ----->
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>