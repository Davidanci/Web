<!DOCTYPE HTML>
<html>
	<head>
   <base href="https://micocina.cat">
    <?php include ("../apartados/header.php"); ?>
		<!----//End-top-nav-script---->
		<?php include ("cookies/cookies.php"); ?>
	</head>
	<body>
		<!----- start-header---->
			<?php include ("../apartados/menu.php"); ?>
			<!----- //End-header---->
			<!----- Pricing ----->
			<div class="Pricing">
				<!----- header-section ---->
				<div class="header-section">
					<div class="container">
						<h1>Mi Cocina</h1>
					</div>
				</div>
				<!----- header-section ---->
				
				
				<section class="success" style="background-color:white;padding-top:2em;">
                    <div class="container" style="color:black;">
                       <p style="text-align: center;color:black;"><strong><em><?php echo $lang["c1"]?></em></strong></p>
            <em><?php echo $lang["c2"]?></em><br><br>

            <em><?php echo $lang["c3"]?></em><br>

            <em><?php echo $lang["c4"]?></em><br><br><br>

            <strong><em><?php echo $lang["c5"]?></em></strong><br>

            <em><?php echo $lang["c6"]?></em><br><br>

            <em><?php echo $lang["c7"]?></em><br><br>

            <em><?php echo $lang["c8"]?></em><br><br>

            <em><?php echo $lang["c9"]?></em><br><br>

            <em><?php echo $lang["c10"]?></em><br><br><br>

            <strong><em><?php echo $lang["c11"]?></em></strong><br><em><?php echo $lang["c12"]?></em>
            <br><br>
            <em><?php echo $lang["c13"]?></em><br><br><br>

            <strong><em><?php echo $lang["c14"]?></strong><br><?php echo $lang["c15"]?></em><br>
            <br><br>
            <em><?php echo $lang["c16"]?></em><br>
            <ul>
                <li><em><a href="http://support.google.com/chrome/bin/answer.py?hl=es&amp;answer=95647" target="_blank" rel="noopener noreferrer">Chrome</a></em></li>
                <li><em><a href="http://windows.microsoft.com/es-es/windows7/how-to-manage-cookies-in-internet-explorer-9" target="_blank" rel="noopener noreferrer">Explorer</a></em></li>
                <li><em><a href="http://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we" target="_blank" rel="noopener noreferrer">Firefox</a></em></li>
                <li><em><a href="http://support.apple.com/kb/ph5042" target="_blank" rel="noopener noreferrer">Safari</a></em></li>
            </ul><br><br>
            <em><?php echo $lang["c17"]?></em>
                    </div>
    </section>
			</div>
			<!----- About ----->
			
            <!----- footer ----->
           <?php include ("../apartados/footer.php"); ?>
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

