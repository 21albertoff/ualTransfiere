
<?php
    #Eliminar todos los hashtags
    #eliminarTodosHashtags();
    
    #Eliminar hashtag
    if(isset($_POST['eliminar'])){
        $idHashtag = $_POST['idHashtag'];
        eliminarHashtag($idHashtag);
    }
    
    #Modal para añadir registros
    require "appweb/mod/agregarRegla.php";
    
    #Sentencia de datos
    $query = "SELECT idp, `count` as cantidad FROM ph WHERE idh = ".$IdH." ORDER BY cantidad DESC LIMIT 50";
    $result = mysqli_query($db,$query);
?>

<table class="table table-data2">
    
    <!-- Cabecera de la tabla -->
    <thead><tr>
            
    <!---1--><!---------------------2------------------------><!--3---><!-------4--------><!----------5----------><!--6--->
    <th></th><th><i class="fab fa-twitter"></i> Posteador</th><th></th><th>Seguidores</th><th>Uso del hashtag</th><th></th>
            
    </tr></thead>

    <!-- Cuerpo de la tabla -->
    <tbody>
    
    <?php
       if($result){
            while($row = mysqli_fetch_array($result)){
                $idp = $row['idp']; 
                $query2 = "SELECT * FROM usuarios WHERE id = ".$idp."";
                $result2 = mysqli_query($db,$query2);
                if($result2){
                    while($row2 = mysqli_fetch_array($result2)){
                        $nickname = $row2['nickname'];
                        $followers = $row2['followers'];
                        $verificado = $row2['verificado'];  
                        $id =  $row2['id'];
                        $post =  $row2['post'];

                    }
                }                                                  
                $cantidad = $row['cantidad'];

                if ($cantidad > 1){?>

                    <tr class='tr-shadow'>
                    <!--1-->
                    <td>

                        <!--Postear como nueva regla-->
                        <?php if ($post == 0){?>
                        <form method="post" action="posteadores.php">
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
                    <td></td>
                    <td>
                    <!--4-->

                        <?php echo $followers ?>

                    </td>
                    <!--5-->
                    <td>

                        <?php echo $cantidad ?>

                    </td>
                    <!--6-->
                    <td>
                        <div class='table-data-feature'>
                            
                            <!-- Informacion del posteador -->
                            <form method="post" action="infoposteadores.php">
                                <input type="hidden" name="idUsuario" value="<?php echo $id ?>">
                                <button type="submit" name='verposteadores' class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;"  data-toggle="tooltip" data-placement="top" title="" data-original-title=" Ver datos">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </form>

                            <!-- Eliminar posteador -->
                            <form method="post" action="posteadores.php">
                                <input type="hidden" name="idUsuario" value="<?php echo $id ?>">
                                <button type="submit" name='eliminar'class="item" style="display: block;height: 30px;width: 30px;position: relative;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;margin-right: 5px;" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </form> 

                        </div>
                    </td>
                    </tr>
                    <tr class='spacer'></tr>
        <?php }}}?>
    </tbody>
</table>