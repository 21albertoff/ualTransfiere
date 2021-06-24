<?php
header('Content-Type: application/json');

//Configuracion base de datos
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'twitter');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Fallo de conexion: " . $mysqli->error);
}

//Consulta
$query = sprintf("SELECT * FROM `hashtags` WHERE `seleccionado`='1' and `eliminado` ='0' order by `count` DESC LIMIT 15");
$result = $mysqli->query($query);
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//Liberar espacio y cerrar conexion
$result->close();
$mysqli->close();

//Pintar json
print json_encode($data);