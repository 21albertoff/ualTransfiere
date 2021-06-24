
<?php
    #Eliminar todos los hashtags
    #eliminarTodosHashtags();

    #Eliminar hashtag del seguimiento
    if(isset($_POST['eliminarseguimiento'])){
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $idHashtag = $_POST['idHashtag'];
        $nombreHashtag = $_POST['nombreHashtag'];
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.twitter.com/2/tweets/search/stream/rules');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"delete\": {\"values\": [\"#".$nombreHashtag." lang:es\"]}}");

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAPbENwEAAAAAo90kIhuPyTepkpQ5IN5OrhtlOtA%3DYedpthaxickJlKMh1LiZK3zGGMsCKfmbAnsoVnaBCc3yLSt9f4';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
           echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $post = "UPDATE `hashtags` SET `post`=0 WHERE `id` = $idHashtag";
        $result = mysqli_query($db,$post);
     }
    
    #Modal para añadir registros
    require "appweb/mod/agregarRegla.php";
    
    #Sentencia de datos
    $query = "SELECT * FROM `hashtags` where `eliminado`='0' and `post`=1 order by counttotal DESC";
    $result = mysqli_query($db,$query);
?>

<table class="table table-data2">
    
    <!-- Cabecera de la tabla -->
    <thead><tr>
            
    <!--1--><!---------------------2-----------------------><!--3---><!------4-------><!--5--->
    <th></th><th><i class="fas fa-hashtag"></i> Hashtag</th><th></th><th>Cantidad</th><th></th>
            
    </tr></thead>
    
    <!-- Cuerpo de la tabla -->
    <tbody>
    
    <?php
        if($result){
            while($row = mysqli_fetch_array($result)){
               $hashtag = $row['hashtag'];                                 
               $cantidad = $row['counttotal']; #Cantidad por defecto
               $padre = consultarPadreHashtag($hashtag);
            
                if ($cantidad > 0){?>
                    <tr class='tr-shadow'>
                    <!--1-->
                    <td>

                        <!-- Eliminar seguimiento --> 
                        <form method="post" action="seguimientoh.php">
                            <input type="hidden" name="idHashtag" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="nombreHashtag" value="<?php echo $row['hashtag'] ?>">

                            <button type="submit" name='eliminarseguimiento'class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </form>

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

                            <!-- Control de seguimiento -->
                            <form method="post" action="seguimiento.php">
                                <input type="hidden" name="idHashtag" value="<?php echo $row['id'] ?>">
                                <button type="submit" name='informacion'class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="Ver mas información">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </form>

                            <!-- Control de jerarquia -->
                            <form method="post" action="jerarquiah.php">
                                <input type="hidden" name="idHashtag" value="<?php echo $row['id'] ?>">
                                <button type="submit" name='verjerarquiah' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Jerarquia">
                                    <i style="font-size: 15px;"class="fas fa-sitemap"></i>
                                </button>
                            </form> 

                            <!-- Control de posteadores -->
                            <form method="post" action="infohashtag.php">
                                <input type="hidden" name="idHashtag" value="<?php echo $row['id'] ?>">
                                <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Posteadores">
                                    <i class="zmdi zmdi-account"></i>
                                </button>
                            </form>
                             
                        </div>
                    </td>
                    </tr>
                    <tr class='spacer'></tr>
        <?php }}}?>
    </tbody>
</table>