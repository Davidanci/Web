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
    <!-- wysihtml5 parser rules -->
<script src="/ruta-a-wysihtml5/parser_rules/advanced.js"></script>
<!-- Library -->
<script src="/ruta-a-wysihtml5/dist/wysihtml5-0.3.0.min.js"></script>
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
    .taman{
        width: 200px;
        height: 200px;
        
        border-radius: 15px;
        border: 2px solid #E2711D;
    }
    .contenedor{
    position: relative;
    display: inline-block;
    text-align: center;
        padding: 4px;
}

.centrado{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 18px !important;
    padding: 3px;
    background-color: rgb(105,105,105,0.5);
    font-weight: bold;
}
    .containerr {
      padding: 5px 5px 5px 45px !important;  
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
            <h1 style="color:white;"> <a href="https://micocina.cat/micocina.php" style="color:white;"> <?php echo $lang["micocina"]; ?> </a> > <?php echo $lang["verrecet"]; ?></h1>
          </div>
        </div>
        </div>
        <!----- header-section ---->
<div class="fondopri">
<div class="container">
   <div class="fondo">
     <div style="text-align:center !important;">
      <img src="images/micocinaa.png" alt="" style="text-align:center;">	
       <h2 style="text-align:center;font-family: 'Great Vibes', cursive;font-size:50px;"><?php echo $lang["todsrece"]; ?></h2>
       </div>
<div class="row">
 <div class="containerr">
    <div class="galeria">
 
      <?php
  $id_user=$_SESSION["id"];
  $query = $mysqli->query("select id,nombre ,descripcion,img  from recetas where id_usuario =".$id_user);
  

  if ($query->num_rows > 0){
    while ($row = $query->fetch_assoc()) { 
      ?>
             <?php echo '<a href="https://micocina.cat/receta.php?id='.$row["id"].'">'; ?>
             <div class="contenedor">
             <img <?php echo 'src="https://micocina.cat/fotosRecetas/'.$row["img"].'"'; ?> alt="" class="taman">
             <div class="centrado"><?php echo $row["nombre"]; ?></div></a>
             </div>
<?php
  }
  ?>
</div>
</div>
 </div>
 <div class="row">
 

 <?php
	
}else{
  echo '<p class="alert alert-info">¿Aún no ha subido ninguna receta? Utilice el enlace que le proporcionamos a continuación para crear una nueva receta.<a href="nuevareceta.php"> Crear receta nueva</a></p>';
}
?>
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