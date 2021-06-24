<?php

/** 
 *  Funciones para los index
 * 
 * @package  UAL Transfiere
 * @author   Alberto Fuentes <aff012@inlumine.ual.es>
 * @link     https://twitter.com/21albertoff
 *
 */

    #Funcion para eliminar un determinado Hashtag
    function calcularNumTweets(){
        include "config.php";
        
        $sentencia = "SELECT COUNT(*) as `count` from usuarios";
        $result = mysqli_query($db,$sentencia);
        if($result){
          while($row = mysqli_fetch_array($result)){
            $valor = $row['count'];
          }
        }
        return $valor;
    }

   
                                          

    
   ?>
