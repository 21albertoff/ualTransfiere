<!DOCTYPE html>

<html lang="es">
 <head>
   <?php 

      $titulo = "Información hashtag";
      require "appweb/mod/header.php"; 
      require "appweb/inc/funhashtags.php";

      $info = 0;

      #Filtros de clasificación
      if(isset($_POST['informacion'])){ 
         $info = $_POST['infojh'];
         $nombreH = $_POST['nombreH'];
      }
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

            <div class="table-data__tool"><div class="table-responsive table-responsive-data2">

               <div class="table-data__tool">

                  <!-- Panel izquierdo -->
                  <?php require "appweb/mod/hashtags/panelizquierdoJerarquia.php"; ?>
            
               </div>
               
               <!-- Tabla de resultados -->
               <?php require "appweb/mod/hashtags/tablaJerarquiaH.php"; ?>
 
            </div></div>

         </div></div>

         <!-- Pie de pagina-->
         <?php require "appweb/mod/footer.php"; ?>
                  
      </div></div></div>                
   </div>  
   <!-- Jquery JS-->
   <?php require "appweb/inc/jquerys.php"; ?>  
 </body>
</html>
