<!DOCTYPE html>
<html lang="es">
 <head>
   <?php 
      $titulo = "Información posteador";
      require "appweb/mod/header.php"; 
      
      if(isset($_POST['verposteadores'])){
         $IdP= $_POST['idUsuario'];
         $query = "SELECT * FROM `usuarios` where `id`=".$IdP."";
         $result = mysqli_query($db,$query);
         if($result){
            while($row = mysqli_fetch_array($result)){
               $nombreP = $row['nickname'];
               $verificado = $row['verificado'];
            }
         }
      }
      
      $info = 0;
      #Filtros de clasificación
      if(isset($_POST['informacionp'])){ 
         $nombreP = $_POST['nombreP'];
         $verificado = $_POST['verificado']; 
         $IdP= $_POST['idUsuario'];
         $info = $_POST['infojp'];
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
                  <?php require "appweb/mod/usuarios/panelizquierdoJerarquia.php"; ?>

               </div>

               <!-- Tabla de resultados -->
               <?php require "appweb/mod/usuarios/tablaJerarquiaP.php"; ?>
            
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
