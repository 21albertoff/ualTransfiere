<!DOCTYPE html>
<html lang="es">
 <head>
   <?php 
      $titulo = "Información hashtag";
      require "appweb/inc/funhashtags.php";
      require "appweb/mod/header.php"; 
   ?>
 </head>
 <body class="animsition">

   <!-- Modal para añadir registros-->
   <?php require "appweb/mod/reglaModal.php"; ?>

   <div class="page-wrapper">

      <!-- Menu-->
      <?php require "appweb/mod/menu.php"; ?>

      <!-- Contenido principal-->
      <div class="page-container"><div class="section__content section__content--p30"><div class="container-fluid">
         <div class="row"><div class="col-md-12">

            <!-- Titulo -->
            <?php require "appweb/mod/titulo.php"; ?>
            
            <div class="row">
            
               <!-- Graficas -->
               <?php require "appweb/mod/hashtags/seguimientoGrafica.php"; ?>

               <!-- Hashtags -->
               <?php require "appweb/mod/hashtags/seguimientohashtags.php"; ?>

               <!-- Posteadores -->
               <?php require "appweb/mod/hashtags/seguimientoPosteadores.php"; ?>

               <!-- Mencionados -->
               <?php require "appweb/mod/hashtags/seguimientoMencionados.php"; ?>

               <!-- Enlaces -->
               <?php require "appweb/mod/hashtags/seguimientoEnlaces.php"; ?>
               
            </div>

         </div></div>

         <!-- Pie de pagina-->
         <?php require "appweb/mod/footer.php"; ?>
         
      </div></div></div>
      
   </div>
  <!-- Jquery JS-->
  <?php require "appweb/inc/jquerys.php"; ?>
 </body>
</html>

