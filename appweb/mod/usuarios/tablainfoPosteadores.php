
<?php
    #Eliminar todos los usuarios
    #eliminarTodosUsuarios();
                              
    #Eliminar usuario
    if(isset($_POST['eliminar'])){
       $IdUsuario = $_POST['idUsuario'];
       eliminarUsuario($IdUsuario);
    }
    
    #Sentencia de datos
    if($info == 0){
        $query = "SELECT idh, `count` as cantidad FROM ph WHERE idp = ".$IdP." ORDER BY cantidad DESC LIMIT 50";
        $result = mysqli_query($db,$query);
    }

    if($info == 1){
        $query = "SELECT idm, `count` as cantidad FROM pm WHERE idp = ".$IdP." ORDER BY cantidad DESC LIMIT 50";
        $result = mysqli_query($db,$query);
    }

    if($info == 2){
        $query = "SELECT `url`, `count` as cantidad FROM pe WHERE idp = ".$IdP." ORDER BY cantidad DESC LIMIT 50";
        $result = mysqli_query($db,$query);
    }
?>

<table class="table table-data2">                                     

    <!-- Cabecera de la tabla -->
    <thead><tr>
                      
    <?php if($info == 0){?>
        <!--1--><!---------------------2-----------------------><!--3---><!-------4------><!--5--->
        <th></th><th><i class="fas fa-hashtag"></i> Hashtag</th><th></th><th>Cantidad</th><th></th>
    <?php }?> <?php if($info == 1){?>
        <!--1--><!---------------------2----------------------------><!------3--------><!-------4---------><!------5-------><!--6--->
        <th></th><th><i class="fas fa-at"></i> Nombre de usuario</th><th>Influencia</th><th>Seguidores</th><th>Cantidad</th><th></th>
    <?php }?> <?php if($info == 2){?>
        <!--1--><!---------------------2-----------------------------><!------3-------><!--4--->
        <th></th><th><i class="fas fa-link"></i> Url de enlace</th><th>Cantidad</th><th></th>
    <?php }?>
    </tr></thead>

    <!-- Cuerpo de la tabla -->
    <tbody>
    
        <?php if($info == 0){
            if($result){
                while($row = mysqli_fetch_array($result)){
                    $idh = $row['idh']; 
                    $query2 = "SELECT * FROM hashtags WHERE id = ".$idh."";
                    $result2 = mysqli_query($db,$query2);
                    if($result2){
                        while($row2 = mysqli_fetch_array($result2)){
                        $hashtag = $row2['hashtag']; 
                        $id = $row2['id'];
                        $post = $row2['post'];
                        $padre = consultarPadreHashtag($hashtag);
                        }
                    }
                                                                    
                $cantidad = $row['cantidad']; #Cantidad por defecto

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
        <?php }}}}?>
        <?php if($info == 1){
            if($result){
                while($row = mysqli_fetch_array($result)){
                   $idm = $row['idm']; 
                   $query2 = "SELECT * FROM menciones WHERE id = ".$idm."";
                   $result2 = mysqli_query($db,$query2);
                   if($result2){
                      while($row2 = mysqli_fetch_array($result2)){
                         $nickname = $row2['nickname'];
                         $followers = $row2['followers'];
                         $verificado = $row2['verificado']; 
                         $id = $row2['id'];
                         $post = $row2['post'];
                         $cantidad = $row['cantidad'];
                         $influencia = (($cantidad*$followers)/1000000);
                        }
                    }
                                                                    
                $cantidad = $row['cantidad']; #Cantidad por defecto

                if ($cantidad > 1){?>
                    <tr class='tr-shadow'>
                    <!--1-->
                    <td>

                        <?php if ($post == 0){?>   
                            <form method="post" action="menciones.php">
                                <input type="hidden" name="nombreUsuario" value="<?php echo $nickname ?>">
                                <input type="hidden" name="idUsuario" value="<?php echo $id ?>">
                                <button type="submit" name='nuevaregla' class="item" style="color:#ffffff; display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Monitorizar">
                                    <i class="zmdi zmdi-upload"></i>
                                </button>
                            </form>
                        <?php }?>

                    </td>
                    <!--2-->
                    <td>

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
                            <form method="post" action="jerarquiam.php">
                                <input type="hidden" name="idUsuario" value="<?php echo $id ?>">
                                <button type="submit" name='verjerarquiap' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver Jerarquia">
                                    <i style="font-size: 15px;"class="fas fa-sitemap"></i>
                                </button>
                            </form> 

                            <!-- Control de informacion -->
                            <form method="post" action="infomenciones.php">
                                <input type="hidden" name="idUsuario" value="<?php echo $id ?>">
                                <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver datos">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </form> 
                            <!-- Control de eliminacion -->
                            <form method="post" action="infomenciones.php">
                                <input type="hidden" name="idUsuario" value="<?php echo $id ?>">
                                <button type="submit" name='eliminar'class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    </tr>
                    <tr class='spacer'></tr>
        <?php }}}}?>
        <?php if($info == 2){
            if($result){
                while($row = mysqli_fetch_array($result)){
                   $url = $row['url'];                                                  
                   $cantidad = $row['cantidad'];

                if ($cantidad > 1){?>
                    <tr class='tr-shadow'>
                    <!--1-->
                    <td>
                    </td>
                    <!--2-->
                    <td>

                        <a href='<?php echo $url?>' target="_blank" class='block-email'><?php echo $url?></a>

                    </td>
                    <td>
                    <!--3-->
                        <?php echo $cantidad ?>
                    </td>
                    <!--4-->
                    <td>
                    </td>
                    </tr>
                    <tr class='spacer'></tr>
        <?php }}}}?>
    </tbody>
</table>