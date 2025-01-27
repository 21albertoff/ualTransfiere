<?php

/** 
 *  Funciones para los hashtags
 * 
 * @package  UAL Transfiere
 * @author   Alberto Fuentes <aff012@inlumine.ual.es>
 * @link     https://twitter.com/21albertoff
 *
 */

   $filtro = 0;

   if(isset($_POST['informacion'])){
    include "config.php";
    $IdH= $_POST['idHashtag'];
    $query = "SELECT * FROM `hashtags` where `id`=".$IdH."";
    $result = mysqli_query($db,$query);
    if($result){
       while($row = mysqli_fetch_array($result)){
          $nombreH = $row['hashtag'];
       }
    }

    require "appweb/mod/hashtags/controlSeguimientoGrafica.php";  

  }
  
  # Ver jerarquia de los hashtags
   if(isset($_POST['verjerarquiah'])){
    include "config.php";
    $IdH= $_POST['idHashtag'];
    $query = "SELECT * FROM `hashtags` where `id`=".$IdH."";
    $result = mysqli_query($db,$query);
    if($result){
       while($row = mysqli_fetch_array($result)){
          $nombreH = $row['hashtag'];
       }
    }
   }

    #Filtro para seleccionar
    if(isset($_POST['seleccionar'])){
       $idHashtag = $_POST['idHashtag'];
       $seleccionar = "UPDATE `hashtags` SET `seleccionado`='1' WHERE `id` = $idHashtag";
       $result = mysqli_query($db,$seleccionar);
   }

   #Filtro para agregar nueva reglla
   if(isset($_POST['nuevaregla'])){
      // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
      $nombreHashtag = $_POST['nombreHashtag'];
      $idHashtag = $_POST['idHashtag'];
      $ch = curl_init();
      
      $regla = "{ \"add\": [ {\"value\": \"#".$nombreHashtag." lang:es\", \"tag\": \"".$nombreHashtag." hashtag\"}] }";

      curl_setopt($ch, CURLOPT_URL, 'https://api.twitter.com/2/tweets/search/stream/rules');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $regla);

      $headers = array();
      $headers[] = 'Content-Type: application/json';
      $headers[] = 'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAPbENwEAAAAAo90kIhuPyTepkpQ5IN5OrhtlOtA%3DYedpthaxickJlKMh1LiZK3zGGMsCKfmbAnsoVnaBCc3yLSt9f4';
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $result = curl_exec($ch);
      if (curl_errno($ch)) {
         echo 'Error:' . curl_error($ch);
      }
      curl_close($ch);
      
      $post = "UPDATE `hashtags` SET `post`=1 WHERE `id` = $idHashtag";
      $result = mysqli_query($db,$post);
   }
   
   #Filtro para deseleccionar
   if(isset($_POST['deseleccionar'])){
       $idHashtag = $_POST['idHashtag'];
       $deseleccionar = "UPDATE `hashtags` SET `seleccionado`='0' WHERE `id` = $idHashtag";
       $result = mysqli_query($db,$deseleccionar);
   }

    #Filtro para recopilar datos
    if(isset($_POST['recopilar'])){
        $recopilar = "UPDATE `hashtags` SET `countsemana`=`countres`";
        $result = mysqli_query($db,$recopilar);
        $recopilar2 = "UPDATE `hashtags` SET `countres`=`count`";
        $result = mysqli_query($db,$recopilar2);
        $recopilar3 = "UPDATE `hashtags` SET `count`=1";
        $result = mysqli_query($db,$recopilar3);
    }

    #Filtro para recopilar datos
    if(isset($_POST['deseleccionarTodos'])){
      $deseleccionartodos = "UPDATE `hashtags` SET `seleccionado`='0'";
      $result = mysqli_query($db,$deseleccionartodos);
  }

    #Filtros de clasificación
    if(isset($_POST['filtrar'])){ 
      $filtro = $_POST['filtro']; 
    }

    function contadorHashtags($filtro){
      ?>Nº Hashtags <span class="badge badge-pill badge-light">
        <?php include "config.php";
        if ($filtro == 1) {
          $contador = "SELECT * FROM `hashtags` where `count` > 1 and `eliminado` = '0' ";
        } else if ($filtro == 2) {
          $contador = "SELECT * FROM `hashtags` where `countres` > 1 and `eliminado` = '0'";
        } else if ($filtro == 3) {
          $contador = "SELECT * FROM `hashtags` where `countsemana` > 1 and `eliminado` = '0'";
        } else {
          $contador = "SELECT * FROM `hashtags` where `counttotal` > 1  and `eliminado` = '0'";
        }
        
        if ($result = $db->query($contador)) {
          /* determinar el número de filas del resultado */
          $row_cnt = $result->num_rows;
          echo $row_cnt;  
        }                                                                             
        ?>
        </span> 
    <?php
    }

    #Funcion para eliminar TODOS
    function eliminarTodosHashtags(){
      include "config.php";
      if(isset($_POST['eliminarTodos'])){
        $eliminarTodos = "DELETE FROM `hashtags`";
        $result = mysqli_query($db,$eliminarTodos);
        ?>
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
          <span class="badge badge-pill badge-danger">Eliminados</span>
          Se elimino todos los hashtags con exito.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
      }
    }

    #Funcion para eliminar un determinado Hashtag
    function eliminarHashtag($idHashtag){
        include "config.php";
        
        $eliminar = "UPDATE `hashtags` SET `eliminado`='1' WHERE `id` = $idHashtag";
        $result = mysqli_query($db,$eliminar);
        ?>
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Eliminado</span>
            Se elimino el hashtag con exito.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }

    #Consulta de datos del filtro
    function consultarHashtags($filtro){
      include "config.php";
      if ($filtro == 2){
        $query = "SELECT * FROM `hashtags` where `eliminado`='0'  order by countres DESC LIMIT 50";
      }elseif ($filtro == 3){
        $query = "SELECT * FROM `hashtags` where `eliminado`='0' order by countsemana DESC LIMIT 50";

      }elseif ($filtro == 0){
        $query = "SELECT * FROM `hashtags` where `eliminado`='0'  order by counttotal DESC LIMIT 50";

      } else {
        $query = "SELECT * FROM `hashtags` where `eliminado`='0'  order by `count` DESC LIMIT 50";
      }         
      return mysqli_query($db,$query);
    }
    
    #Consulta de datos del filtro
    function consultarPadreHashtag($hashtag){
      include "config.php";
      $padre = "0";
      $sentenciaPadre = "SELECT `idh1`,`idh2`, `count` FROM `hhp` WHERE `idh2` = (SELECT id from hashtags WHERE hashtag LIKE '".$hashtag."' LIMIT 1) order by `count` DESC LIMIT 1";
      $result = mysqli_query($db,$sentenciaPadre);
      if($result){
        while($row = mysqli_fetch_array($result)){
          $idhashtag = $row['idh1'];
          $idhashtag2 = $row['idh2'];
          if ($idhashtag != $idhashtag2){
            $obtenerPadre = "SELECT `hashtag` FROM `hashtags` WHERE `id` = ". $idhashtag."";

            $resultPadre = mysqli_query($db,$obtenerPadre);
            if($resultPadre){
              while($rowPadre = mysqli_fetch_array($resultPadre)){
                $padre = $rowPadre['hashtag'];
              }
            }
          }
        }
      }else{
        $padre = "0";
      }
      
      return $padre;
    }

    function checkHashtagsSeleccionados(){
      include "config.php";

      #Comprobar si tenemos hashtags seleccionados
      $seleccionados = "SELECT COUNT(*) FROM `hashtags` WHERE `eliminado` = 0 and seleccionado = 1";
      $result = mysqli_query($db,$seleccionados);
      if($result){
          while($row = mysqli_fetch_array($result)){
              $cantidadSeleccionados = $row[0];
          }
      }
      return $cantidadSeleccionados;
    }

    function resumenComparacionHashtags(){
      include "config.php";
      $clasificacion = "SELECT * FROM `hashtags` WHERE `eliminado` = 0 and `seleccionado` = 1 and `count` > 1 order by count DESC LIMIT 10";
      $result = mysqli_query($db,$clasificacion);
      if($result){
          while($row = mysqli_fetch_array($result)){
              $cantidad = $row['count'];
              $cantidadtres = $row['countres'];
              $cantidadsemana = $row['countsemana'];
              echo"<tr><td>#".$row['hashtag']."</td><td class='text-right'>";
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
    }

    
   ?>
