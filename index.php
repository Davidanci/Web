<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
		<?php include ("apartados/header.php"); ?>
		<!----//Menu movil---->
		<?php include ("cookies/cookies.php"); ?>
	</head>
	<body>
		<!----- start-header---->
			<?php include ("apartados/menu.php"); ?>
			<!----- //End-header---->
			<!----- banner ------>
			<div class="banner">
				<div class="container">
					<div class="banner-info text-center">
						<h1><?php echo $lang["todas"]?></h1>
						<h2><?php echo $lang["nadie"]?> </h2>
						<img src="images/medio.png" title="cocinar" />
						<!----- domain-Serach-bar ----->
						<div class="domain-Serach-bar">
						<h1><?php echo $lang["no"]?></h1>
								<div class="clearfix"> </div>
							</div>
						</div>
						<!----- domain-Serach-bar ----->
					</div>
				</div>
			<!----- banner ------>
			<!------ services ----->
			<div class="row" style="padding-top:0 !important;"> <!--row -->
				<div class="span6 services-right text-center"> <!-- span6 -->
					<img src="images/icon2.png" title="Recetas" />
					<h2><?php echo $lang["recetas"]?></h2>
					<p><?php echo $lang["1recetas"]?></p>
					<?php if(!isset($_SESSION["usuario"])){
			?>
					<a class="s-btn" href="recetas.php"><?php echo $lang["ver"]?></a>
					<?php }else{ }?>
				</div>
				<div class="span6 services-left text-center"> <!-- span6 -->
					<img src="images/icon.png" title="cocinar" />
					<h2><?php echo $lang["micocina"]?></h2>
					<p><?php echo $lang["2micocina"]?></p>
					<a class="s-btn" href="micocina.php"><?php echo $lang["ver"]?></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!------ services ----->
						<section class="caracte">
                <div class="row separar" style="text-align: center;">
                    <div class="span3" style="width: 100%">
                    <img src="images/actu.png" title="" />
								<h3><?php echo $lang["actu"]?></h3>
								<p><?php echo $lang["actutxt"]?></p>
                    </div>
                    <div class="span3" style="width: 100%">
                    <img src="images/comu.png" title="" />
								<h3><?php echo $lang["granco"]?></h3>
								<p><?php echo $lang["grancotxt"]?></p>
                    </div>
                    <div class="span3" style="width: 100%">
                       <img src="images/reci.png" title="" />
								<h3><?php echo $lang["reci"]?></h3>
								<p><?php echo $lang["recitxt"]?></p>
                        </div>
                    <div class="span3" style="width: 100%">
                       <img src="images/sopo.png" title="" />
								<h3><?php echo $lang["sop"]?></h3>
								<p><?php echo $lang["soptxt"]?></p>
                        
                    </div>
                </div>
            </section>
                    
                    <!--- TEAM --->
         <div class="teaam">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="padding-bottom:3.5em;">
                        <h1 class="text-center text-primary" style="padding-bottom:0.5em;color:#ffe13e"><?php echo $lang["nuestr"]?></h1>
                        <p class="text-center"><?php echo $lang["nuestrtxt"]?> </p>
                    </div>
                </div>
                <div class="row medio">
                

                    <div class="col-md-4">
                        <img src="images/David.jpg"
                        class="center-block img-quadrata" >
                        <h3 class="text-center" >David D.
                        <br/>
                        <p class="medio"> <?php echo $lang["david"]?></p></h3>
                    </div>
                    <div class="col-md-4">
                        <img src="https://unsplash.imgix.net/photo-1422222948315-28aadb7a2cb8?q=75&fm=jpg&s=cfeadbd7a991e58b553bee29a7eeca55"
                        class="center-block img-quadrata">
                        <h3 class="text-center">Alessandro T.
                        <br/>
                        <p class="medio"> <?php echo $lang["alessandro"]?></p></h3>
                    </div>
                    <div class="col-md-4">
                        <img src="images/rufuss.png"
                        class="img-quadrata center-block" >
                        <h3 class="text-center" >Rufus
                        <br/>
                        <p class="medio"><?php echo $lang["rufus"]?></p></h3>
                    </div>
                </div>
            </div>
        </div>
		
			<!----- pricing and plan ----->
			<?php if(!isset($_SESSION["usuario"])){
			?>
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
			<?php }else{ }?>
			<!----- pricing and plan ----->
			<!----- footer ----->
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

