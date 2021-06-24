<?php
    $query = "TRUNCATE TABLE `seguimientografica`";
    $result = mysqli_query($db,$query);
    $query3 = "SELECT * FROM `seguimiento` where `idh`=".$IdH."";
    $result3 = mysqli_query($db,$query3);
    if($result3){
        while($row3 = mysqli_fetch_array($result3)){
            $s0 = $row3['semana0'];
            $s1 = $row3['semana1'];
            $s2 = $row3['semana2'];
            $s3 = $row3['semana3'];
            $s4 = $row3['semana4'];
            $s5 = $row3['semana5'];
            $s6 = $row3['semana6'];
            $s7 = $row3['semana7'];
            $s8 = $row3['semana8'];
            $s9 = $row3['semana9'];
            $s10 = $row3['semana10']; 

            $queryseg = "INSERT INTO `seguimientografica`(`idh`, `semana0`, `semana1`, `semana2`, `semana3`, `semana4`, `semana5`, `semana6`, `semana7`, `semana8`, `semana9`, `semana10`) VALUES (".$IdH.",".$s0.",".$s1.",".$s2.",".$s3.",".$s4.",".$s5.",".$s6.",".$s7.",".$s8.",".$s9.",".$s10.")"; 
            $result = mysqli_query($db,$queryseg);
        }
    }
?>