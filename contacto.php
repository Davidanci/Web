<!DOCTYPE HTML>
<html>
	<head>
		<?php include ("apartados/header.php"); ?>
		<!----//Menu movil---->
		
		<script>
            $(document).ready(function() {

			$('form').submit(function (event) {
				event.preventDefault();
				var name = $("#mail-name").val();
				var email = $("#mail-email").val();
				var asunto = $("#mail-asunto").val();
				var message = $("#mail-message").val();
                var captcha = $("#mail-captcha").val();
				var submit = $("#mail-submit").val();
				$(".form-message").load("php/mail.php", {
					name: name,
					email: email,
					asunto: asunto,
					message: message,
                    captcha: captcha,
					submit: submit
				});
			});

		});
		</script>
		
		<!----//End-top-nav-script---->
		<?php include ("cookies/cookies.php"); ?>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
		<!----- start-header---->
			<?php include ("apartados/menu.php"); ?>
			
			<!----- //End-header---->
			<div class="Pricing">
				<!----- header-section ---->
				<div class="header-section">
					<div class="container">
						<h1><?php echo $lang["contacto"]; ?></h1>
					</div>
				</div>
				<!----- header-section ---->
			</div>
			<!----- Pricing ----->
			<div class="domain">
				<!----- header-section ---->
				<div class="container-contact100" style="background-image: url('images/fondocontacto.jpg');">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post" action="php/mail.php" onsubmit="miFuncion()">
				<span class="contact100-form-title">
					<?php echo $lang["estamos"]?>
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<label for="name" class="label-input100"><?php echo $lang["nombre"]?></label>
					<input class="input100" type="text" name="name" placeholder="<?php echo $lang["intron"]?>" id="mail-name" required>
					<p class="help-block text-danger"></p>
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<label for="email" class="label-input100"><?php echo $lang["email"]?></label>
					<input class="input100" type="text" name="email" placeholder="<?php echo $lang["introe"]?>" id="mail-email">
					<p class="help-block text-danger"></p>
				</div>

				<div class="wrap-input100">
					<label for="asunto" class="label-input100"><?php echo $lang["asunto"]?></label>
					<input class="input100" type="text" name="asunto" placeholder="..." id="mail-asunto">
					<p class="help-block text-danger"></p>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<label for="message" class="label-input100"><?php echo $lang["mensaje"]?></label>
					<textarea class="input100" name="message" placeholder="<?php echo $lang["introm"]?>" id="mail-message"></textarea>
				</div>
                <div id="success"></div>
                <div id="mail-captcha" class="g-recaptcha" data-sitekey="6LeNLlsUAAAAAPue-s5Zn6IOnBnZXPip9-q5hffn"></div>
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						
						<!--<input id="mail-submit" type='submit' value='Enviar' class='contact100-form-btn' name='submit'> -->
						<button class="contact100-form-btn" name='submit' type='submit' id="mail-submit">
							<?php echo $lang["enviar"]?>
						</button>
					</div>
				</div>
				<div class="container-contact100-form-btn">
				<p class="form-message"></p>
				</div>
				
			</form>
		</div>

		<span class="contact100-more" style="color: black;">
				info@micocina.cat
		</span>
	</div>
				<!----- hosting-grids ----->
			</div>
			<!----- About ----->
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
            <script>
  function miFuncion() {
    var response = grecaptcha.getResponse();

    if(response.length == 0){
      alert("Captcha no verificado")
    } else {
      /*alert("Captcha verificado");*/
    }
  }
</script>
            
		<script src='https://www.google.com/recaptcha/api.js?hl=<?php echo $_POST["lang"]; ?>'></script>
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

