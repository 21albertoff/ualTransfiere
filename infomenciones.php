<!DOCTYPE html>

<html lang="es">
   <head>
      <?php 
            $titulo = "Información mencion";
            require "appweb/inc/funhashtags.php";
            require "appweb/mod/header.php"; 
            if(isset($_POST['verposteadores'])){
               $IdM= $_POST['idMencionado'];
               $query = "SELECT * FROM `menciones` where `id`=".$IdM."";
               $result = mysqli_query($db,$query);
               if($result){
                  while($row = mysqli_fetch_array($result)){
                     $nombreM = $row['nickname'];
                     $verificado = $row['verificado'];
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
                           <!--2-->       <i class="fab fa-twitter"></i> Posteador  
                                       </th>
                           <!--3-->    <th>Seguidores</th>
                                       <th>
                           <!--4-->       Cantidad de veces mencionado
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       
                                       #Sentencia de datos
                                       $query = "SELECT idp, count(*) as cantidad FROM pm WHERE idm = ".$IdM." GROUP BY idp HAVING COUNT(*)>1 ORDER BY cantidad DESC LIMIT 100";
                                       $result = mysqli_query($db,$query);

                                       if($result){
                                          while($row = mysqli_fetch_array($result)){
                                             $idp = $row['idp'];
                                             $query2 = "SELECT * FROM usuarios WHERE id = ".$idp."";
                                             $result2 = mysqli_query($db,$query2);
                                             if($result2){
                                                while($row2 = mysqli_fetch_array($result2)){
                                                   $nickname = $row2['nickname'];
                                                   $followers = $row2['followers'];
                                                   $verificado = $row2['verificado'];   
                                                }
                                             }                                                  
                                             $cantidad = $row['cantidad']; #Cantidad por defecto
                                             
                                             if ($cantidad > 1){?>
                                             
                                             <tr class='tr-shadow'>
                                                <td>
                                    <!--2-->       <a href='https://twitter.com/<?php echo $nickname?>' target="_blank" class='block-email'>@<?php echo $nickname?></a>
                                    <?php if ($verificado == 1){?>
                                                   <span class='status--blue'><i class="fas fa-check-circle" style="color: #1da1f2;"></i></span>
                                                   <?php }?>
                                                </td>
                                    <!--3-->    <td><?php echo $followers ?></td>
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
