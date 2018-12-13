<?php
if ( isset ( $_POST["lang"])){
    $lang = $_POST["lang"];
    if ( !empty($lang)){
        $_SESSION["lang"] = $lang;
    }
}

if ( isset ($_SESSION["lang"])){
    $lang = $_SESSION["lang"];
    require "lang/".$lang.".php";
}
else{
    require "lang/es.php";
}

?>