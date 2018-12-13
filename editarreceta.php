<?php 
    session_start();
    include('acceso_db.php'); 

       if(!isset($_SESSION["usuario"])){
           header("Location:login.php");
       }else{
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include ("apartados/header.php"); ?>
		<!----//Menu movil---->
		<?php include ("cookies/cookies.php"); ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="css/testimo.css" rel='stylesheet' type='text/css' />
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">  
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">  
		<style>
            .fondopri{
        background-image: url(images/fondococi.png);
        
    }
            .fondo{
                background-image: url(images/micocinaimg.png);
                border: 2px solid white;
                border-radius: 12px;
                padding:15px 0px 25px 0px;
                 margin: 70px 0px 50px 0px;
                
            }
            .tabla {
               margin: 10px 0px 50px 0px;
                padding: 40px;
                background-color: white;
                border-radius: 10px;
                border: 1px solid rgb(226,113,29,0.15);
            }
            table{
                border: 2px solid #E2711D;
                
            }
            th, td {
    border-bottom: 1px solid rgb(226,113,29,0.25);
            }
            
            @media only screen and (max-width: 500px) {
    .tabla {
        padding: 10px 0px 0px 0px;
        
    }
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
            <h1 style="color:white;"> <a href="https://micocina.cat/micocina.php" style="color:white;"> <?php echo $lang["micocina"]; ?> </a> > <?php echo $lang["editrecet"]; ?></h1>
          </div>
        </div>
        </div>
<div class="fondopri">
<div class="container">
   <div class="fondo">
     <div style="text-align:center !important;">
      <img src="images/micocinaa.png" alt="" style="text-align:center;">	
       <h2 style="text-align:center;font-family: 'Great Vibes', cursive;font-size:50px;"><?php echo $lang["notecon"]; ?></h2>
       </div>
    <div class="row justify-content-center">
    <div class="tabla col-md-9">
    <div class="table-responsive">
        <?php
        $id_user=$_SESSION["id"];
        $query = $mysqli->query("select id,nombre ,descripcion  from recetas where id_usuario =".$id_user);
  

        if ($query->num_rows > 0){
            ?>
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th><?php echo $lang["nomrece"]; ?></th>
            <th><?php echo $lang["nomdescrip"]; ?></th>
            <th class="text-center"><?php echo $lang["nomacc"]; ?></th>
        </tr>
    </thead>
            <?php  while ($row = $query->fetch_assoc()) {  ?>
            <tr>
                <td><?php echo $row["nombre"];?></td>
                <td> <div style="width: 410px;"> <div style="white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;"> <p title="<?php echo $row["descripcion"];?>"><?php echo $row["descripcion"];?></p></div></div></td>
                <td class="text-center"><a class='btn btn-info btn-xs'<?php echo 'href="https://micocina.cat/actualizarreceta.php?id='.$row["id"].' ">';?> <span class="glyphicon glyphicon-edit"></span> <?php echo $lang["editrr"]; ?></a> <a onclick="return confirm('Estas seguro que quieres eliminar la receta?');" <?php echo 'href="https://micocina.cat/eliminarreceta.php?id='.$row["id"].'"';?> class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> <?php echo $lang["eliminr"]; ?></a></td>
            </tr>
            <?php } ?>
    </table>
    <?php } ?>
    </div>
    </div>
    </div>
</div>
        </div>
        </div>	
			
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

    <?php } ?>