<!DOCTYPE html>
<html lang="es">
   <head>
      <?php 
         $titulo = "Enlaces";
         require "appweb/mod/header.php"; 
         require "appweb/inc/funenlaces.php";
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
                        <div class="row">
                           <?php 
                              $clasificacion = "SELECT * FROM `enlaces` WHERE `eliminado` = '0' and `counttotal` > 1 order by counttotal DESC LIMIT 4";
                              $result = mysqli_query($db,$clasificacion);
                              if($result){
                                    $contador = 0;
                                    while($row = mysqli_fetch_array($result)){
                                       $cantidad = $row['counttotal'];
                                       $nombre = $row['nombre'];
                                       $url = $row['url'];
                                       $verificado = $row['seguro'];
                                       $tipo = $row['tipo'];
                                       $contador = $contador+1;
                                       $banner = "https://raw.githubusercontent.com/puikinsh/CoolAdmin/master/images/bg-title-01.jpg";
                                       $logo = "https://www.ucm.es/data/cont/docs/953-2020-05-13-enlace.png";
                                       
                                       if ($tipo != 0){
                                          $consultartipo = "SELECT * FROM `tiposenlaces` WHERE `idtipo` = $tipo";
                                          $ctipo = mysqli_query($db,$consultartipo);
                                          if($ctipo){
                                             while($row = mysqli_fetch_array($ctipo)){
                                                $banner = $row['banner'];
                                                $logo = $row['logo'];
                                             }
                                          }
                                       }
                                       
                              
                              ?>
                           <div class="col-lg-3">
                              <div class="au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border">
                                 <div class="au-card-title" style="background-image:url('<?php echo $banner?>');">
                                    <div class="bg-overlay bg-overlay--blue"
                                       <?php
                                          if ($contador == 1){
                                             echo "style= 'background: rgba(181, 140,  19, 0.8);'";
                                          } elseif ($contador == 2){
                                             echo "style= 'background: rgba(150, 150, 150, 0.8);'";
                                          } elseif ($contador == 3){
                                             echo "style= 'background: rgba(228, 123, 62, 0.8);'";
                                          } elseif ($contador == 4){
                                             echo "style= 'background: rgba(49, 89, 253, 0.8);'";
                                          }
                                          ?>
                                       ></div>
                                    <h3><i class="fab fa-twitter"></i><?php echo $cantidad?></h3>
                                 </div>
                                 <div class="au-chat__title">
                                    <div class="au-chat-info" style="justify-content: center;">
                                       <?php
                                          if ($verificado == 1){
                                             echo " <div class='avatar-wrap verificado'>";
                                          } else{
                                             echo " <div class='avatar-wrap noverificado'>";
                                          }
                                          ?>
                                       <div class="avatar avatar--small">
                                          <?php echo "<img src='".$logo."' alt='".$nombre."'>"; ?>
                                       </div>
                                    </div>
                                    <span class="nick"><a href="<?php echo $url?>"><?php echo $nombre?></a></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php
                           }
                           }
                           
                           ?>
                     </div>
                     <?php 
                        $urlsverificados = "SELECT sum(`counttotal`) as verificados ,(SELECT sum(`counttotal`) FROM `enlaces` WHERE 'eliminado'=0) as total FROM `enlaces` WHERE `seguro`=1 and 'eliminado'=0";
                        $result2 = mysqli_query($db,$urlsverificados);
                        if($result2){
                             
                              while($row = mysqli_fetch_array($result2)){
                                 $verificados = $row['verificados'];
                                 $total = $row['total'];
                                 $operacion = ($verificados * 100)/$total;
                                 $num = round($operacion, 2);
                           }
                        }
                                 
                        
                        ?>
                     <div class="progress" style="    height: 30px;">
                        <div class="progress-bar" role="progressbar" style="font-size: 16px;background-color: #007bff;width: <?php echo $num ?>%;" aria-valuenow="<?php echo $num?>" aria-valuemin="0" aria-valuemax="100"><?php echo $num?>% verificados </div>
                     </div>
                     <div class="table-data__tool">
                        <div class="table-responsive table-responsive-data2">
                           <div class="table-data__tool">
                              <!-- Panel izquierdo -->
                              <div class="table-data__tool-left">
                                 <!-- Filtro de clasificacion -->
                                 <form method="post" action="enlaces.php">
                                    <div class="rs-select2--light rs-select2--sm">
                                       <select class="js-select2" name="filtro">
                                       <?php
                                          if ($filtro != 0){
                                                echo "<option value='0'>Total</option>";
                                          }else{
                                                echo "<option value='0' selected>Total</option>";
                                          }
                                          if ($filtro != 1){
                                              echo "<option value='1'>Hoy</option>";
                                          }else{
                                              echo "<option value='1' selected>Hoy</option>";
                                          }
                                          
                                          if ($filtro != 2){
                                              echo "<option value='2'>3 Días</option>";
                                          }else{
                                              echo "<option value='2' selected>3 Días</option>";
                                          }
                                          
                                          if ($filtro != 3){
                                              echo "<option value='3'>1 Semana</option>";
                                          }else{
                                              echo "<option value='3' selected>1 Semana</option>";
                                          }
                                          ?>
                                       </select>     
                                       <div class="dropDownSelect2"></div>
                                    </div>
                                    <button type="submit" name='filtrar' class="au-btn au-btn-icon au-btn--blue au-btn--small">
                                    <i class="fa fa-filter"></i> Filtrar
                                    </button>
                                    <?php contadorHashtags($filtro) ?>
                                 </form>
                              </div>
                              <!-- Panel derecho -->
                              <form method="post" action="enlaces.php">
                                 <div class="table-data__tool-right">
                                    <button type="submit" name="deseleccionarTodos" class="au-btn au-btn-icon au-btn--blue au-btn--small">
                                    <i class="fa fa-download"></i> Deseleccionar</button>
                                    <!--<button type="button" data-toggle="modal" data-target="#eliminarTodos" class="au-btn au-btn-icon au-btn--red au-btn--small">
                                       <i class="fa fa-trash"></i> Eliminar todos</button>-->
                                 </div>
                              </form>
                           </div>
                           <!-- Tabla de resultados -->
                           <table class="table table-data2">
                              <!-- Cabecera de la tabla -->
                              <thead>
                                 <tr>
                                    <!--1-->    
                                    <th></th>
                                    <th>
                                       <!--2-->       Nombre  
                                    </th>
                                    <th>
                                       <!--4-->       Cantidad
                                    </th>
                                    <!--6-->    
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    #Eliminar usuario
                                    if(isset($_POST['eliminar'])){
                                       $IdEnlace = $_POST['IdEnlace'];
                                       eliminarHashtag($IdEnlace);
                                    }
                                    
                                    #Sentencia de datos
                                    $result = consultarHashtags($filtro);
                                    
                                    if($result){
                                       while($row = mysqli_fetch_array($result)){
                                          $nombre = $row['nombre'];
                                          $seleccionado = $row['seleccionado'];
                                          $verificado = $row['seguro'];
                                          $tipo = $row['tipo'];
                                    
                                    
                                          $cantidad = $row['counttotal']; #Cantidad por defecto
                                          if ($filtro == 1 ){ $cantidad = $row['count']; }
                                          if ($filtro == 2 ){ $cantidad = $row['countres']; }
                                          if ($filtro == 3 ){ $cantidad = $row['countsemana']; }
                                          
                                          if ($cantidad > 1){?>
                                 <tr class='tr-shadow'>
                                    <td></td>
                                    <td>
                                       <!--2-->       <a target="_blank" class='block-email'><?php echo $nombre?></a>
                                       <?php if ($verificado == 1){?>
                                       <!--5-->          <span class='status--blue'><i class="fas fa-check-circle" style="color: #1da1f2;"></i></span>
                                       <?php }?>
                                    </td>
                                    <td>
                                       <!--4-->       <?php echo $cantidad ?>
                                    </td>
                                    <td>
                                       <div class='table-data-feature'>
                                          <form method="post" action="infoenlaces.php">
                                             <input type="hidden" name="IdEnlace" value="<?php echo $row['id'] ?>">
                                             <button type="submit" name='verEnlaces' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Enlaces">
                                                <i class="zmdi zmdi-more"></i></a>
                                          </form>
                                          <form method="post" action="enlaces.php">
                                          <input type="hidden" name="IdEnlace" value="<?php echo $row['id'] ?>">
                                          <button type="submit" name='eliminar'class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="zmdi zmdi-delete"></i></button>
                                          </form>
                                       </div>
                                    </td>
                                    <!--6-->    
                                    <td></td>
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