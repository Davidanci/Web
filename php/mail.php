<?php
    /*$captcha = $_POST['g-recaptcha-response'];

if (isset ($captcha) && $captcha){
            $secret = "6Lf4LlsUAAAAANQyVxz9QsSb8YfnFqo8l4VUAiL0";
            $ip = $_SERVER['REMOTE_ADDR'];
            $respu = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
            $matri = json_decode($respu);
            if ($matri['succes'] == false) {
                echo "<span class='form-error'>¡Completa el ReCaptcha!</span>";
                $errorEmpty = true;
            }
        } 
        
        
if (isset ($_POST['g-recaptcha-response'])){
$secret = "6Lf4LlsUAAAAANQyVxz9QsSb8YfnFqo8l4VUAiL0";
$response = $_POST['g-recaptcha-response'];
$ip = $_SERVER['REMOTE_ADDR'];
$url = "https://www.google.com/recaptcha/api/siteverify";
$finalResponse = file_get_contents ($url."?secret=".$secret."&response=".$response."remoteip=".$ip);
$matri = json_decode($finalResponse);
if($matri->success){
    echo "es valido";
}else {
    echo "error";
}    
}*/
/*require_once "recaptchalib.php";*/

if (isset($_POST['submit'])) {
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$asunto = $_POST["asunto"];
	$message = $_POST["message"];
    $captcha = $_POST["g-recaptcha-response"];
    
	$errorEmpty = false;
	$errorEmail = false;
    $errorCap = false; 
    
    $secret = "6LeNLlsUAAAAAC_q4gKnZHakyBLUk3I4uQyM1wdz";
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $finalResponse = file_get_contents ($url."?secret=".$secret."&response=".$captcha."remoteip=".$ip);
    $matri = json_decode($finalResponse);
    if($matri->success){
    }else {
        $errorCap = true;
    }    

	if (empty($name) || empty($email) || empty($message) || $errorCap == false) /*empty($matri->success)*/ {
		echo "<span class='form-error'>¡Completa todos los campos!</span>";
		$errorEmpty = true;
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "<span class='form-error'>Email incorrecto.</span>";
		$errorEmail = true; 
	}
	else {
            $dest = "info@micocina.cat"; //Email de destino
            $name = $_POST['name'];
            $email = $_POST['email'];
            $asunto = $_POST['asunto']; //Asunto
            $message = $_POST['message']; //Cuerpo del mensaje
            //Cabeceras del correo
            $headers = "From: $name <$email>\r\n"; //Quien envia?
            $headers .= "X-Mailer: PHP5\n";
            $headers .= 'MIME-Version: 1.0' . "\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //

            if(mail($dest,$asunto,$message,$headers)){
                echo "<span class='form-success'>Se ha enviado correctamente</span>";
                $_POST['name'] = '';
                $_POST['email'] = '';
                $_POST['asunto'] = '';
                $_POST['message'] = '';

            }else{
                echo "Hubo un error al enviar el mensaje.";
            }
        
		
	}

}
    
?>

<script>
	$("#mail-name, #mail-email, #mail-asunto, #mail-message, #mail-captcha").removeClass( "input-error" ) /*, #mail-captcha*/

	var errorEmpty = "<?php echo $errorEmpty; ?>";
	var errorEmail = "<?php echo $errorEmail; ?>";

	if (errorEmpty == true){
	    $("#mail-name, #mail-email, #mail-asunto, #mail-message, #mail-captcha").addClass("input-error"); /*, #mail-captcha*/
	}
	if (errorEmail == true){
	    $("#mail-email").addClass("input-error");
	}

	if (errorEmpty == false && errorEmail == false){
	    $("#mail-name, #mail-email, #mail-message, #mail-captcha").val(''); /*, #mail-captcha*/
	}
</script>