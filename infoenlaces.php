<!DOCTYPE html>

<html lang="es">
   <head>
      <?php 
      $titulo = "Información enlace";
            require "appweb/inc/funenlaces.php";
            require "appweb/mod/header.php"; 
            if(isset($_POST['verEnlaces'])){
               $IdEnlace = $_POST['IdEnlace'];
               $query = "SELECT * FROM `enlaces` where `id`=".$IdEnlace."";
               $result = mysqli_query($db,$query);
               if($result){
                  while($row = mysqli_fetch_array($result)){
                     $nombreEnlace = $row['nombre'];
                     $verificado = $row['seguro'];
                     $tipo = $row['tipo'];
                  }
               }
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
         <div class="page-container">

            <div class="section__content section__content--p30">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        
                        <!-- Titulo -->
                        <?php require "appweb/mod/titulo.php"; ?>
                        
                        <div class="table-data__tool">
                           <div class="table-responsive table-responsive-data2">
                           
                              <!-- Tabla de resultados -->
                              <table class="table table-data2">

                                 
                                 <!-- Cabecera de la tabla -->
                                 <thead>
                                    <tr>
                                       <th>
                           <!--2-->       <i class="fas fa-link"></i> URL  
                                       </th>
                           <!--3-->    <th></th>
                                       <th>
                           <!--4-->       Cantidad
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       
                                       #Sentencia de datos
                                       $query = "SELECT url, count(*) as cantidad FROM ee WHERE ide1 = ".$IdEnlace." GROUP BY url HAVING COUNT(*)>1 ORDER BY cantidad DESC LIMIT 100";
                                       $result = mysqli_query($db,$query);

                                       if($result){
                                          while($row = mysqli_fetch_array($result)){
                                             $url = $row['url'];                                 
                                             $cantidad = $row['cantidad']; #Cantidad por defecto
                                             
                                             if ($cantidad > 1){?>
                                             
                                             <tr class='tr-shadow'>
                                                <td>
                                    <!--2-->       <a href='<?php echo $url?>' target="_blank" class='block-email'><?php echo $url?></a>
                                                </td>
                                    <!--3-->    <td></td>
                                                <td>
                                    <!--4-->       <?php echo $cantidad ?>
                                                </td>
                                    <!--6-->    <td></td>
                                             </tr>
                                             <tr class='spacer'></tr>   
                                       <?php }}}?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- Pie de pagina-->
                     <?php require "appweb/mod/footer.php"; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>  
      
      <!-- Jquery JS-->
      <?php require "appweb/inc/jquerys.php"; ?>  

   </body>
</html>
