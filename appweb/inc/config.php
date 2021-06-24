<?php
/**
 * 
 * @package  UAL Transfiere
 * @author   Alberto Fuentes <aff012@inlumine.ual.es>
 * @link     https://twitter.com/21albertoff
 *
 */
    $hostname="localhost";
	$username="root";
	$password="";
	$dbname="twitter";
    $db= mysqli_connect($hostname,$username, $password) 
    or die("<html><script language='JavaScript'>alert('¡No es posible conectarse a la base de datos! Vuelve a intentarlo más tarde.'),history.go(-1)</script></html>");  
    mysqli_select_db($db,$dbname);                                     
?>