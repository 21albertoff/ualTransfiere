<?php 
    $query = "SELECT idh2, `count` as cantidad FROM hh WHERE idh1 = ".$IdH." ORDER BY cantidad DESC LIMIT 50";
    $result = mysqli_query($db,$query);
    $cont1 = 0;

    if($result){
        while($row = mysqli_fetch_array($result)){
            $cont1 = $cont1 + 1;
            $idh2 = $row['idh2'];
            $cantidad = $row['cantidad'];
            $query2 = "SELECT * FROM hashtags WHERE id = ".$idh2."";
            $result2 = mysqli_query($db,$query2);
            if($result2){
                    
                while($row2 = mysqli_fetch_array($result2)){
                    $nombre = $row2['hashtag'];
                    $padre = consultarPadreHashtag($nombre);
                }
            } 

            if ($nombre == $nombreH){
                $cont1 = $cont1 - 1;
                continue;
        } 

        if ($cont1 < 9 ){ ?>

            <div class="au-task__item au-task__item--primary" >
                <div class="au-task__item-inner" style="padding: 5px 15px;">
                    <tbody>
                        <div class='table-data-feature' style='justify-content: space-between;'>
               
                            <a href='https://twitter.com/hashtag/<?php echo $nombre?>' target="_blank" class='block-email'>#<?php echo $nombre?></a>
                            
                            <div class='table-data-feature'>

                                <!-- Cantidad de veces utilizado-->
                                <button class="item" style="background: #f2f2f2; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" <?php echo "".$cantidad." veces utilizado"?>">
                                    <?php echo $cantidad?> 
                                </button>

                                <!-- Control de jerarquia -->
                                <form method="post" action="jerarquiah.php">
                                    <input type="hidden" name="idHashtag" value="<?php echo $idh2 ?>">
                                    <button type="submit" name='verjerarquiah' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Jerarquia">
                                        <i style="font-size: 15px;"class="fas fa-sitemap"></i>
                                    </button>
                                </form> 

                                <!-- Control de informacion -->
                                <form method="post" action="infohashtag.php">
                                    <input type="hidden" name="idHashtag" value="<?php echo $idh2 ?>">
                                    <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Posteadores">
                                        <i class="zmdi zmdi-account"></i>
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
                
                                <a href='https://twitter.com/hashtag/<?php echo $nombre?>' target="_blank" class='block-email'>#<?php echo $nombre?></a>
                                
                                <div class='table-data-feature'>

                                    <!-- Cantidad de veces utilizado-->
                                    <button class="item" style="background: #f2f2f2; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" <?php echo "".$cantidad." veces utilizado"?>">
                                        <?php echo $cantidad?> 
                                    </button>

                                    <!-- Control de jerarquia -->
                                    <form method="post" action="jerarquiah.php">
                                        <input type="hidden" name="idHashtag" value="<?php echo $idh2 ?>">
                                        <button type="submit" name='verjerarquiah' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Jerarquia">
                                            <i style="font-size: 15px;"class="fas fa-sitemap"></i>
                                        </button>
                                    </form> 

                                    <!-- Control de informacion -->
                                    <form method="post" action="infohashtag.php">
                                        <input type="hidden" name="idHashtag" value="<?php echo $idh2 ?>">
                                        <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Posteadores">
                                            <i class="zmdi zmdi-account"></i>
                                        </button>
                                    </form> 

                                </div>
                                
                            </div>
                        </tbody>
                </div>
            </div>
<?php }} } ?>