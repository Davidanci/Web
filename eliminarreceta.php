<?php 
    session_start();
    include('acceso_db.php'); 

       if(!isset($_SESSION["usuario"])){
           header("Location:login.php");
       }else{
       		$id=$_GET["id"];
       		$query = $mysqli->query("delete from recetas where id =".$_GET["id"]);
            


            header("Location:editarreceta.php?id=".$_SESSION["id"]);

       }
?>