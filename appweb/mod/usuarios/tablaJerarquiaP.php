
<?php
    #Modal para añadir registros
    require "appweb/inc/funhashtags.php";
    require "appweb/mod/agregarRegla.php";
    
    #Sentencia de datos
    if($info == 0){
        $query = "SELECT ph.idh as id, ph.count as cantidad FROM ph INNER JOIN hashtags h on h.id = ph.idh where idp = ".$IdP." and h.post = 1 order by cantidad desc";
     }
     $result = mysqli_query($db,$query);
?>

<table class="table table-data2">

    <!-- Cabecera de la tabla -->
    <thead><tr>
            
    <!--1--><!-----------------------2-------------------------><!--3---><!-----------4------------><!--5--->
    <th></th><th><i class="fab fa-twitter"></i> Generadores</th><th></th><th>Cantidad utilizado</th><th></th>
            
    </tr></thead>

    <!-- Cuerpo de la tabla -->
    <tbody>
    
    <?php
        if($result){
            while($row = mysqli_fetch_array($result)){
               $idh = $row['id']; 
               $query2 = "SELECT * FROM hashtags WHERE id = ".$idh."";
               $result2 = mysqli_query($db,$query2);
               if($result2){
                  while($row2 = mysqli_fetch_array($result2)){
                     $hashtag = $row2['hashtag']; 
                     $id = $row2['id'];
                     $post = $row2['post']; 
                     $padre = consultarPadreHashtag($hashtag);
                                               
               $cantidad = $row['cantidad'];

               if ($cantidad > 1){?>
                    <tr class='tr-shadow'>
                    <!--1-->
                    <td>

                        <?php if ($post == 0){?>   
                            <form method="post" action="hashtag.php">
                                <input type="hidden" name="nombreHashtag" value="<?php echo $hashtag ?>">
                                <input type="hidden" name="idHashtag" value="<?php echo $id ?>">
                                <button type="submit" name='nuevaregla' class="item" style="color:#ffffff; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top"title="" data-original-title="Monitorizar">
                                    <i class="zmdi zmdi-upload"></i>
                                </button>
                            </form>
                        <?php }?>

                    </td>
                    <!--2-->
                    <td>

                        <?php if ($padre != "0"){?>
                            <a style="font-size: 12px;    background: #fff;" href='https://twitter.com/hashtag/<?php echo $padre?>' target="_blank" class='block-email'>#<?php echo $padre?></a><i class="fas fa-angle-right"></i>
                        <?php }?>
                        <a href='https://twitter.com/hashtag/<?php echo $hashtag?>' target="_blank" class='block-email'>#<?php echo $hashtag?></a>
                    
                    </td>
                    <!--3-->
                    <td></td>
                    <td>
                    <!--4-->
                        <?php echo $cantidad ?>
                    </td>
                    <!--5-->
                    <td>
                        <div class='table-data-feature'>
                            
                            <!-- Control de jerarquia -->
                            <form method="post" action="jerarquiah.php">
                                <input type="hidden" name="idHashtag" value="<?php echo $id ?>">
                                <button type="submit" name='verjerarquiah' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Jerarquia">
                                    <i style="font-size: 15px;"class="fas fa-sitemap"></i>
                                </button>
                            </form> 

                            <!-- Control de informacion -->
                            <form method="post" action="infohashtag.php">
                                <input type="hidden" name="idHashtag" value="<?php echo $id ?>">
                                <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Posteadores">
                                    <i class="zmdi zmdi-account"></i>
                                </button>
                            </form> 
                            <!-- Control de eliminacion -->
                            <form method="post" action="hashtag.php"> 
                                <input type="hidden" name="idHashtag" value="<?php echo $id ?>">
                                <button type="submit" name='eliminar'class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>                    
                            </form>
                        </div>
                    </td>
                    </tr>
                    <tr class='spacer'></tr>
        <?php }} }}}?>
    </tbody>
</table>