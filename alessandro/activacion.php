<?php
include("acceso_db1.php");
if (isset($_GET['id'])) { 

$id=$_GET['id']; 

$query = "UPDATE usuarios 
            SET activacion = '1' WHERE   id = '".$id."'"; 
                mysqli_query($mysqli,$query); 
     
                 
             
}

?>