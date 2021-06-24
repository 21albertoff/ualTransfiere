
<?php
    #Eliminar hashtag del seguimiento
    if(isset($_POST['eliminarseguimiento'])){
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $idUsuario = $_POST['idUsuario'];
        $nombreUsuario = $_POST['nombreUsuario'];
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.twitter.com/2/tweets/search/stream/rules');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"delete\": {\"values\": [\"from:".$nombreUsuario."\"]}}");

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAPbENwEAAAAAo90kIhuPyTepkpQ5IN5OrhtlOtA%3DYedpthaxickJlKMh1LiZK3zGGMsCKfmbAnsoVnaBCc3yLSt9f4';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
           echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $post = "UPDATE `usuarios` SET `post`=0 WHERE `id` = $idUsuario";
        $result = mysqli_query($db,$post);
     }

    #Sentencia de datos
    $query = "SELECT *, ((tweetstotal*followers)/1000000) as `influencia` FROM `usuarios` where `eliminado`='0' and `post`=1 order by `influencia` desc";
    $result = mysqli_query($db,$query);
?>

 <!-- Tabla de resultados -->
<table class="table table-data2">   

    <!-- Cabecera de la tabla -->
    <thead><tr>
            
    <!--1--><!---------------------2---------------------------------><!------3--------><!-------4--------><!-------5------><!---6--->
    <th></th><th><i class="fab fa-twitter"></i> Nombre de usuario</th><th>Influencia</th><th>Seguidores</th><th>Cantidad</th><th></th>
            
    </tr></thead>

    <!-- Cuerpo de la tabla -->
    <tbody>
    
    <?php
        if($result){
            while($row = mysqli_fetch_array($result)){
               $nickname = $row['nickname'];
               $followers = $row['followers'];
               $seleccionado = $row['seleccionado'];
               $verificado = $row['verificado'];
               $influencia = $row['influencia'];
               $idP = $row['id'];
               $padre = consultarPadreUsuario($idP);

   
               $cantidad = $row['tweetstotal']; #Cantidad por defecto
               if ($filtro == 1 ){ $cantidad = $row['tweets']; }
               if ($filtro == 2 ){ $cantidad = $row['tweetstres']; }
               if ($filtro == 3 ){ $cantidad = $row['tweetssemana']; }
               
               if ($cantidad > 0){?>
                    <tr class='tr-shadow'>
                    <!--1-->
                    <td>
                    </td>
                    <!--2-->
                    <td>

                        <?php if ($padre != "0"){?>
                            <a style="font-size: 12px;    background: #fff;" href='https://twitter.com/hashtag/<?php echo $padre?>' target="_blank" class='block-email'>#<?php echo $padre?></a><i class="fas fa-angle-right"></i>
                        <?php }?>
                        <a href='https://twitter.com/<?php echo $nickname?>' target="_blank" class='block-email'>@<?php echo $nickname?></a>
                        <?php if ($verificado == 1){?>
                            <span class='status--blue'><i class="fas fa-check-circle" style="color: #1da1f2;"></i></span>
                        <?php }?>

                    </td>
                    <!--3-->
                    <td>
                        <?php echo $influencia ?>
                    </td>
                    <!--4-->
                    <td>
                        <?php echo $followers ?>
                    </td>
                    <!--5-->
                    <td>
                        <?php echo $cantidad ?>
                    </td>
                    <!--6-->
                    <td>
                        <div class='table-data-feature'> 

                             <!-- Control de jerarquia -->
                             <form method="post" action="jerarquiap.php">
                                <input type="hidden" name="idUsuario" value="<?php echo $row['id'] ?>">
                                <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Jerarquia">
                                    <i style="font-size: 15px;"class="fas fa-sitemap"></i>
                                </button>
                            </form> 

                            <!-- Control de informacion -->
                            <form method="post" action="infoposteadores.php">
                                <input type="hidden" name="idUsuario" value="<?php echo $row['id'] ?>">
                                <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver datos">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </form> 
                            <!-- Control de eliminacion seguimiento -->
                            <form method="post" action="seguimientop.php">          
                                <div class='table-data-feature'>
                                        <input type="hidden" name="idUsuario" value="<?php echo $row['id'] ?>">
                                        <input type="hidden" name="nombreUsuario" value="<?php echo $row['nickname'] ?>">
                                        <button type="submit" name='eliminarseguimiento'class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="zmdi zmdi-delete"></i></button>
                                </div>          
                             </form>
                        </div>
                    </td>
                    </tr>
                    <tr class='spacer'></tr>
        <?php }}}?>
    </tbody>
</table>