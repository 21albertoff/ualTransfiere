<?php
    $query = "SELECT `url`, `count` as cantidad FROM he WHERE idh = ".$IdH." ORDER BY cantidad DESC LIMIT 50";
    $result = mysqli_query($db,$query);
    $cont1 = 0;
    if($result){
        
        while($row = mysqli_fetch_array($result)){
            $cont1 = $cont1 + 1;
            $url = $row['url'];
            $cantidad = $row['cantidad'];

            if ($cont1 < 9 ){ ?>

        <div class="au-task__item au-task__item--primary" >
            <div class="au-task__item-inner" style="padding: 5px 15px;">
                <tbody>
                    <div class='table-data-feature' style='justify-content: space-between;'>
        
                        <a href='<?php echo $url?>' target="_blank" class='block-email'><?php echo $url?></a>
                        
                        <div class='table-data-feature'>

                            <!-- Cantidad de veces utilizado-->
                            <button class="item" style="background: #f2f2f2; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" <?php echo "".$cantidad." veces utilizado"?>">
                                <?php echo $cantidad?> 
                            </button>              

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
        
                        <a href='<?php echo $url?>' target="_blank" class='block-email'><?php echo $url?></a>
                        
                        <div class='table-data-feature'>

                            <!-- Cantidad de veces utilizado-->
                            <button class="item" style="background: #f2f2f2; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" <?php echo "".$cantidad." veces utilizado"?>">
                                <?php echo $cantidad?> 
                            </button>              

                        </div>
                        
                    </div>
                </tbody>
            </div>
        </div>
<?php }} } ?>