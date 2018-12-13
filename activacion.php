<?php
include("acceso_db.php");

if (isset($_GET['id'])) { 


 
$id=$_GET['id']; 

$query = "UPDATE usuarios 
            SET activacion = '1' WHERE   id = '".$id."'"; 
                mysqli_query($mysqli,$query); 

				
            
 echo "Su cuenta se ha activado correctamente.";           
sleep(3);
?>

<SCRIPT> 
            location.href = "index.php"; 
             
</SCRIPT> 
<?php

}

?>