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

    #Filtro para seleccionar
    if(isset($_POST['seleccionar'])){
       $idEnlace = $_POST['idEnlace'];
       $seleccionar = "UPDATE `enlaces` SET `seleccionado`='1' WHERE `id` = $idEnlace";
       $result = mysqli_query($db,$seleccionar);
   }

   
   #Filtro para deseleccionar
   if(isset($_POST['deseleccionar'])){
       $idEnlace = $_POST['idEnlace'];
       $deseleccionar = "UPDATE `enlaces` SET `seleccionado`='0' WHERE `id` = $idEnlace";
       $result = mysqli_query($db,$deseleccionar);
   }

    #Filtro para recopilar datos
    if(isset($_POST['recopilar'])){
        $recopilar = "UPDATE `enlaces` SET `countsemana`=`countres`";
        $result = mysqli_query($db,$recopilar);
        $recopilar2 = "UPDATE `enlaces` SET `countres`=`count`";
        $result = mysqli_query($db,$recopilar2);
        $recopilar3 = "UPDATE `enlaces` SET `count`=1";
        $result = mysqli_query($db,$recopilar3);
    }

    #Filtro para recopilar datos
    if(isset($_POST['deseleccionarTodos'])){
      $deseleccionartodos = "UPDATE `enlaces` SET `seleccionado`='0'";
      $result = mysqli_query($db,$deseleccionartodos);
  }

    #Filtros de clasificación
    if(isset($_POST['filtrar'])){ 
      $filtro = $_POST['filtro']; 
    }

    function contadorHashtags($filtro){
      ?>Nº Enlaces <span class="badge badge-pill badge-light">
        <?php include "config.php";
        if ($filtro == 1) {
          $contador = "SELECT * FROM `enlaces` where `count` > 1 and `eliminado` = '0' ";
        } else if ($filtro == 2) {
          $contador = "SELECT * FROM `enlaces` where `countres` > 1 and `eliminado` = '0'";
        } else if ($filtro == 3) {
          $contador = "SELECT * FROM `enlaces` where `countsemana` > 1 and `eliminado` = '0'";
        } else {
          $contador = "SELECT * FROM `enlaces` where `counttotal` > 1 and `eliminado` = '0'";
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

    #Funcion para eliminar un determinado Hashtag
    function eliminarHashtag($idEnlace){
        include "config.php";
        
        $eliminar = "UPDATE `enlaces` SET `eliminado`='1' WHERE `id` = $idEnlace";
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
        $query = "SELECT * FROM `enlaces` where `eliminado`='0' order by countres DESC LIMIT 100";
      }elseif ($filtro == 3){
        $query = "SELECT * FROM `enlaces` where `eliminado`='0' order by countsemana DESC LIMIT 100";

      }elseif ($filtro == 0){
        $query = "SELECT * FROM `enlaces` where `eliminado`='0' order by counttotal DESC LIMIT 100";

      } else {
        $query = "SELECT * FROM `enlaces` where `eliminado`='0' order by count DESC LIMIT 100";
      }         
      return mysqli_query($db,$query);
    }
                                          

    
   ?>
