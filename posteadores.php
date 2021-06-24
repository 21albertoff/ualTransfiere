<!DOCTYPE html>
<html lang="es">
 <head>
   <?php 
      $titulo = "Posteadores";
      require "appweb/mod/header.php"; 
      require "appweb/inc/funposteadores.php";
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

            <?php $cantidadSeleccionados = checkUsuariosSeleccionados();
            if ($cantidadSeleccionados > 0) { ?>

               <div class="row">

                  <!-- Grafica de comparacion-->
                  <?php require "appweb/mod/usuarios/graficascomparacion.php"; ?>

                  <div class="col-lg-3"><div class="row">
                        
                        <!-- Resumen de verificados-->
                        <?php require "appweb/mod/usuarios/graficasusuarioverificado.php"; ?>

                           <!-- Resumen de comparacion-->
                           <?php require "appweb/mod/usuarios/resumencomparacion.php"; ?>
                        
                  </div></div>

               </div>
            <?php } ?>

            <div class="table-data__tool"><div class="table-responsive table-responsive-data2">
               
               <div class="table-data__tool">

                  <!-- Panel izquierdo -->
                  <?php require "appweb/mod/usuarios/panelizquierdo.php"; ?>

                  <!-- Panel derecho -->
                  <?php require "appweb/mod/usuarios/panelderecho.php"; ?>

               </div>

               <!-- Tabla de resultados -->
               <?php require "appweb/mod/usuarios/tablaPosteadores.php"; ?>
            
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
