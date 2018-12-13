<!DOCTYPE HTML>
<html>
	<head>
		<?php include ("apartados/header.php"); ?>
		<!----//Menu movil---->
		<?php include ("cookies/cookies.php"); ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="css/testimo.css" rel='stylesheet' type='text/css' />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
		<style>
            .cate {
                border: 1px solid #E2711D;
                border-radius: 12px; 
                padding:15px 3px 9px 3px;
                margin:5px 10px 5px 10px;
                background-color: #FAFAFA;    
            }
            
            .princi {
                border: 1px solid #B0B0B0;
                border-radius: 12px;
                padding:15px 0px 25px 0px;
                background-image: url(images/micocinaimg.png);
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
						<h1><?php echo $lang["micocina"]; ?></h1>
					</div>
				</div>
				<!----- header-section ---->
			</div>

			<?php if(!isset($_SESSION["usuario"])){
			?>
			
			
			<div class="container">
			<div class="row" style="margin-bottom:2em;">
			    <div class="col-md-6">
			        <div style="text-align:right;">
			            <div style="text-align:left;">
			                <h2><?php echo $lang["tegusta"];?></h2>
                        <hr style="width:50px;">
			                <br>
			                <p><?php echo $lang["tegtxt"];?></p>
			            </div>
			        </div>
			    </div>
			    <div class="col-md-6">
			        <div style="text-align:left">
			             <img src="https://images.unsplash.com/photo-1460306855393-0410f61241c7?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=af920b383b3a7b889beb1dd53998ecd3&auto=format&fit=crop&w=1352&q=80" alt="" style="border-radius:10px;width:90%;"> 
			        </div>
			    </div>
			</div>
			<hr>
			<div class="row">
			    <div class="col-md-4">
			        <table >
                        <tr>
                            <th style="text-align:center !important;"><i class="fa fa-check" style="font-size:90px; "></i></th>
                        </tr>                                    
			            <tr>
			                <td><?php echo $lang["tik1"];?></td>
			            </tr>
			        </table>
			    </div>
			    <div class="col-md-4">
			        <table >
                        <tr>
                            <th style="text-align:center !important;"><i class="fa fa-check" style="font-size:90px; "></i></th>
                        </tr>                                    
			            <tr>
			                <td><?php echo $lang["tik2"];?></td>
			            </tr>
			        </table>
			    </div>
			    <div class="col-md-4" style="margin-bottom:2em;">
			        <table >
                        <tr>
                            <th style="text-align:center !important;"><i class="fa fa-check" style="font-size:90px; "></i></th>
                        </tr>                                    
			            <tr>
			                <td><?php echo $lang["tik3"];?></td>
			            </tr>
			        </table>
			    </div>
			    
			</div>
			<hr>
			</div>
			<div style="text-align:center;"><h2 style="font-style: italic;"><?php echo $lang["ellos"];?></h2></div>
			<div class="container">
               
                <div class="row">
                   
                    <div class="col-md-12" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner text-center">

                                <!-- Quote 1 -->
                                <div class="item active">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2" style="margin-left: 0px !important;padding-left:0px !important;">
                                                <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" alt="" style="border-radius:50%;width:100px;height:100px;">
                                                <p><?php echo $lang["testi1"];?> </p>
                                                <small>Laia F.</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 2 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2" style="margin-left: 0px !important;">
                                                <img src="http://lorempixel.com/output/people-q-c-100-100-9.jpg" alt="" style="border-radius:50%;width:100px;height:100px;">
                                                <p><?php echo $lang["testi2"];?></p>
                                                <small>Laura J.</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 3 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2" style="margin-left: 0px !important;">
                                                <img src="http://lorempixel.com/output/people-q-c-100-100-3.jpg" alt="" style="border-radius:50%;width:100px;height:100px;">
                                                <p><?php echo $lang["testi3"];?> </p>
                                                <small>Pedro T.</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            </div>

                            <!-- Carousel Buttons Next/Prev -->
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
</div>
			<!----- About ----->
			<!----- pricing and plan ----->
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
			<!----- pricing and plan ----->
            <!----- footer ----->
            
			<!----- footer ----->
			<!---smoth-scrlling---->
			<?php }else{ ?>
			<br>
				<h3 align="center" style="font-family: 'Great Vibes', cursive;font-size:55px;"><strong><?php echo $lang["bienvenid1"];?> <span style="font-family: Arial;color:#E2711D;font-size:38px;"><?php echo $_SESSION["usuario"];?></span><?php echo $lang["bienvenid2"];?></strong></h3>
				<div class="container">
				<div class="row princi" align="center">
                    <div class="col-md-9" style="padding:0 !important;"> <img src="images/micocinaa.png" alt="">
				<div class="row">
					<div class="col-md-4 cate">
                        <div><a href="nuevareceta.php"><i class="fa fa-plus" style="font-size:70px;color:orange;"></i></a></div>
						<h4><a href="nuevareceta.php"><strong><?php echo $lang["subirr"];?></strong></a></h4>
						<div align="center"><i><?php echo $lang["rtxt1"];?></i>

						</div>
					</div>
					<div class="col-md-4 cate">
                        <div><?php echo ' <a href="editarreceta.php?id='.$_SESSION["id"].'">'; ?><i class="fa fa-pencil" style="font-size:70px;color:orange;"></i></a></div>
						<h4><?php echo ' <a href="editarreceta.php?id='.$_SESSION["id"].'">'; ?><strong><?php echo $lang["editr"];?></strong></a></h4>
						<div align="center"><i><?php echo $lang["rtxt2"];?></i></div>
					</div> 
					<div class="col-md-4 cate">
                        <div><?php echo ' <a href="verreceta.php?id='.$_SESSION["id"].'">'; ?> <i class="fa fa-eye" style="font-size:70px;color:orange;"></i></a></div>
						<h4><?php echo ' <a href="verreceta.php?id='.$_SESSION["id"].'">'; ?> <strong><?php echo $lang["verr"];?></strong></a></h4>
						<div align="center"><i><?php echo $lang["rtxt3"];?></i></div>
					</div>
				</div>
				</div>
				</div>
				</div>
				<br>
		<?php	}
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

					<!---//smoth-scrlling---->
	</body>
</html>

