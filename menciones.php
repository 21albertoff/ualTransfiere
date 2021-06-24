<!DOCTYPE html>
<html lang="es">
   <head>
      <?php 
         $titulo = "Menciones";
         require "appweb/mod/header.php"; 
         require "appweb/inc/funmenciones.php";
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
                        <?php
                           #Comprobar si tenemos usuarios seleccionados
                           $seleccionados = "SELECT COUNT(*) FROM `menciones` WHERE seleccionado = 1";
                           $result = mysqli_query($db,$seleccionados);
                           if($result){
                              while($row = mysqli_fetch_array($result)){
                                 $cantidadSeleccionados = $row[0];
                              }
                           }
                           
                           if ($cantidadSeleccionados > 0) {
                           ?>
                        <div class="row">
                           <!-- Grafica de comparacion-->
                           <div class="col-lg-9">
                              <div class="au-card m-b-30">
                                 <div class="au-card-inner">
                                    <div id="chart-container" >
                                       <canvas id="mencionadoscanvas" width="940" height="420" class="chartjs-render-monitor"></canvas>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Resumen de clasificación-->
                           <div class="col-lg-3">
                              <div class="row">
                                 <div class="au-card m-b-30">
                                    <h3 style="font-size: 21px;padding: 5px;text-align: center;">Usuarios verificados</h3>
                                    <div class="percent-chart2">
                                       <div class="chartjs-size-monitor" style="position: fixed; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                          <div class="chartjs-size-monitor-expand" style="position:fixed;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                             <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                          </div>
                                          <div class="chartjs-size-monitor-shrink" style="position:fixed;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                             <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                          </div>
                                       </div>
                                       <canvas id="mverificadoscanvas" height="240" class="chartjs-render-monitor"></canvas>
                                    </div>
                                 </div>
                                 <div class="col-lg-12" style="padding: 2px;">
                                    <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                       <div class="au-card-inner">
                                          <div class="table-responsive">
                                             <table class="table table-top-countries">
                                                <tbody>
                                                   <?php
                                                      $clasificacion = "SELECT * FROM `menciones` WHERE `eliminado` = 0 and `seleccionado` = 1 and `count` > 1 order by count DESC LIMIT 2";
                                                      $result = mysqli_query($db,$clasificacion);
                                                      if($result){
                                                                  while($row = mysqli_fetch_array($result)){
                                                                     $cantidad = $row['count'];
                                                                     $cantidadtres = $row['countres'];
                                                                     $cantidadsemana = $row['countsemana'];
                                                                     echo"<tr><td>#".$row['nickname']."</td><td class='text-right'>";
                                                                     if ($cantidad < $cantidadtres){
                                                                        echo"<i class='fas fa-arrow-down' style='color:#ff7272'</i>";
                                                                     } else {
                                                                        echo"<i class='fas fa-arrow-up' style='color:#47ffc9'</i>";
                                                                     }
                                                      
                                                                     if ($cantidad < $cantidadsemana){
                                                                        echo"<i class='fas fa-arrow-down' style='color:#ff7272'</i></td></tr>";
                                                                     } else {
                                                                        echo"<i class='fas fa-arrow-up' style='color:#47ffc9'</i></td></tr>";
                                                                     }                                          
                                                                  }
                                                         }
                                                      ?>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php
                           }
                           ?>
                        <div class="table-data__tool">
                           <div class="table-responsive table-responsive-data2">
                              <div class="table-data__tool">
                                 <!-- Panel izquierdo -->
                                 <div class="table-data__tool-left">
                                    <!-- Filtro de clasificacion -->
                                    <form method="post" action="menciones.php">
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
                                       <?php contadorUsuarios($filtro) ?>
                                    </form>
                                 </div>
                                 <!-- Panel derecho -->
                                 <form method="post" action="menciones.php">
                                    <div class="table-data__tool-right">
                                       <a href="seguimientop.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                       <i class="fas fa-at"></i> Mencionados en seguimiento </a>
                                       <button type="submit" name="deseleccionarTodos" class="au-btn au-btn-icon au-btn--blue au-btn--small">
                                       <i class="fa fa-download"></i> Deseleccionar Todo</button>
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
                                          <!--2-->       Nombre de usuario  
                                       </th>
                                       <th>
                                          <!--3-->       Seguidores
                                       </th>
                                       <th>
                                          <!--4-->       Cantidad
                                       </th>
                                       <th>
                                          <!--5-->       Analizando
                                       </th>
                                       <!--6-->    
                                       <th>Monitorizando</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       #Eliminar todos los usuarios
                                       eliminarTodosUsuarios();
                                       
                                       #Eliminar usuario
                                       if(isset($_POST['eliminar'])){
                                          $IdUsuario = $_POST['idUsuario'];
                                          eliminarUsuario($IdUsuario);
                                       }
                                       
                                       #Sentencia de datos
                                       $result = consultarUsuarios($filtro);
                                       
                                       if($result){
                                          while($row = mysqli_fetch_array($result)){
                                             $nickname = $row['nickname'];
                                             $followers = $row['followers'];
                                             $seleccionado = $row['seleccionado'];
                                             $verificado = $row['verificado'];
                                             $post = $row['post'];
                                       
                                       
                                             $cantidad = $row['countotal']; #Cantidad por defecto
                                             if ($filtro == 1 ){ $cantidad = $row['count']; }
                                             if ($filtro == 2 ){ $cantidad = $row['countres']; }
                                             if ($filtro == 3 ){ $cantidad = $row['countsemana']; }
                                             
                                             if ($cantidad > 1){?>
                                    <tr class='tr-shadow'>
                                       <td>
                                          <?php if ($post == 0){?>
                                          <!--Postear como nueva regla-->
                                          <form method="post" action="menciones.php">
                                             <!--1-->           <input type="hidden" name="nombreUsuario" value="<?php echo $row['nickname'] ?>">
                                             <input type="hidden" name="idUsuario" value="<?php echo $row['id'] ?>">
                                             <button type="submit" name='nuevaregla' class="item" style="color:#ffffff; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Monitorizar"><i class="zmdi zmdi-upload"></i></button>
                                          </form>
                                          <?php }?>                         
                                       </td>
                                       <td>
                                          <!--2-->       <a href='https://twitter.com/<?php echo $nickname?>' target="_blank" class='block-email'>@<?php echo $nickname?></a>
                                          <?php if ($verificado == 1){?>
                                          <span class='status--blue'><i class="fas fa-check-circle" style="color: #1da1f2;"></i></span>
                                          <?php }?>
                                       </td>
                                       <!--3-->    
                                       <td><?php echo $followers ?></td>
                                       <td>
                                          <!--4-->       <?php echo $cantidad ?>
                                       </td>
                                       <form method="post" action="menciones.php">
                                          <td>
                                             <?php if ($seleccionado == 1){?>
                                             <!--5-->          <span class='status--process'><i class="fa fa-bar-chart" aria-hidden="true"></i></span>
                                             <?php } else { ?>
                                             <span class='status--denied'><i class="fa fa-bar-chart" aria-hidden="true"></i></span>
                                             <?php }?>  
                                          </td>
                                          <td>
                                             <?php if ($post == 1){?>
                                             <!--5-->          <span class='status--primary' style="color:#4272d7;"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                             <?php } else { ?>
                                             <span class='status--secondary'><i class="fas fa-eye-slash"></i></span>
                                             <?php }?>  
                                          </td>
                                          <td>
                                             <div class='table-data-feature'>
                                       <form method="post" action="menciones.php">
                                       <input type="hidden" name="idUsuario" value="<?php echo $row['id'] ?>">
                                       <?php if ($seleccionado == 1){?>
                                       <button type="submit" name='deseleccionar' class="item" style="color:#ffffff; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quitar de analizar"><i class="zmdi zmdi-download"></i></button>
                                       <?php } else { ?>
                                       <button type="submit" name='seleccionar' class="item" style="color:#ffffff; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Analizar"><i class="zmdi zmdi-upload"></i></button>
                                       <?php }?>
                                       </form>
                                       <form method="post" action="infomenciones.php">
                                       <input type="hidden" name="idMencionado" value="<?php echo $row['id'] ?>">
                                       <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Posteadores"><i class="zmdi zmdi-account"></i></a>
                                       </form>
                                       <form method="post" action="menciones.php">  
                                       <input type="hidden" name="idUsuario" value="<?php echo $row['id'] ?>">
                                       <button type="submit" name='eliminar'class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="zmdi zmdi-delete"></i></button>
                                       </form>
                                       </div>
                                       </td>
                                       </form>
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