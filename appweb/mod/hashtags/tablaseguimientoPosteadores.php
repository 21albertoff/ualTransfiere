<?php 
    $query = "SELECT idp, `count` as cantidad FROM ph WHERE idh = ".$IdH." ORDER BY cantidad DESC LIMIT 50";
    $result = mysqli_query($db,$query);
    $cont1 = 0;
    if($result){
        
        while($row = mysqli_fetch_array($result)){
            $cont1 = $cont1 + 1;
            $idp = $row['idp'];
            $cantidad = $row['cantidad'];
            $query2 = "SELECT * FROM usuarios WHERE id = ".$idp."";
            $result2 = mysqli_query($db,$query2);
            if($result2){
                    
                while($row2 = mysqli_fetch_array($result2)){
                    $nickname = $row2['nickname'];
                    $followers = $row2['followers'];
                    $verificado = $row2['verificado'];
                }
            }  

            if ($cont1 < 9 ){ ?>

                <div class="au-task__item au-task__item--primary" >
                    <div class="au-task__item-inner" style="padding: 5px 15px;">
                        <tbody>
                            <div class='table-data-feature' style='justify-content: space-between;'>
                
                                <a href='https://twitter.com/<?php echo $nickname?>' target="_blank" class='block-email'>@<?php echo $nickname?></a>
                                <?php if ($verificado == 1){?>
                                    <span class='status--blue'><i class="fas fa-check-circle" style="color: #1da1f2; font-size: 12px;"></i></span>
                                <?php }?>
                                
                                <div class='table-data-feature'>

                                    <!-- Cantidad de veces utilizado-->
                                    <button class="item" style="background: #f2f2f2; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" <?php echo "".$cantidad." veces utilizado"?>">
                                        <?php echo $cantidad?> 
                                    </button>

                                    <!-- Informacion del posteador -->
                                    <form method="post" action="infoposteadores.php">
                                        <input type="hidden" name="idUsuario" value="<?php echo $idp ?>">
                                        <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver datos">
                                            <i class="zmdi zmdi-more"></i>
                                        </button>
                                    </form>

                                </div>
                                
                            </div>
                        </tbody>
                    </div>
                </div>
                <?php } else { ?>
                <div class="au-task__item au-task__item--primary js-load-item" style="display: none;">
                    <div class="au-task__item-inner" style="padding: 5px 15px;">
                        <tbody>
                            <div class='table-data-feature' style='justify-content: space-between;'>
                
                                <a href='https://twitter.com/<?php echo $nickname?>' target="_blank" class='block-email'>@<?php echo $nickname?></a>
                                <?php if ($verificado == 1){?>
                                    <span class='status--blue'><i class="fas fa-check-circle" style="color: #1da1f2; font-size: 12px;"></i></span>
                                <?php }?>
                                
                                <div class='table-data-feature'>

                                    <!-- Cantidad de veces utilizado-->
                                    <button class="item" style="background: #f2f2f2; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" <?php echo "".$cantidad." veces utilizado"?>">
                                        <?php echo $cantidad?> 
                                    </button>

                                    <!-- Informacion del posteador -->
                                    <form method="post" action="infoposteadores.php">
                                        <input type="hidden" name="idUsuario" value="<?php echo $idp ?>">
                                        <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver datos">
                                            <i class="zmdi zmdi-more"></i>
                                        </button>
                                    </form>

                                </div>
                                
                            </div>
                        </tbody>
                    </div>
                </div>
<?php }} } ?>