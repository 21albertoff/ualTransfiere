<!DOCTYPE html>
<html lang="es">
   <head>
      <?php 
        $titulo = "Hashtags";
         require "appweb/mod/header.php"; 
         require "appweb/inc/funindex.php";
         ?>
   </head>
   <body class="animsition">
        <!-- Modal para añadir registros-->
        <?php require "appweb/mod/reglaModal.php"; ?>
        <div class="page-wrapper">

            <!-- Menu-->
            <?php require "appweb/mod/menuSuperior.php"; ?>

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

                            <div class="row m-t-25">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                <i class="fab fa-twitter"></i>
                                                </div>
                                                <div class="text">
                                                    <?php $numTweets = calcularNumTweets();?>
                                                    <h2><?php echo $numTweets;?></h2>
                                                    <span>Total de tweets</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                <canvas id="widgetChart1" height="130" style="display: block; width: 296px; height: 130px;" width="296" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $numTweets;?></h2>
                                                    <span>Tweets positivos</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                <canvas id="widgetChart2" height="115" style="display: block; width: 296px; height: 115px;" width="296" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c3">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="fas fa-handshake"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $numTweets;?></h2>
                                                    <span>Tweets neutros</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                <canvas id="widgetChart3" height="115" style="display: block; width: 296px; height: 115px;" width="296" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c4">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="fas fa-thumbs-down"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php echo $numTweets;?></h2>
                                                    <span>Tweets negativos</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                <canvas id="widgetChart4" height="115" style="display: block; width: 296px; height: 115px;" width="296" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </div>
                                    </div>
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