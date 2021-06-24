<?php
header('Content-Type: application/json');

//Configuracion base de datos
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'twitter');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//Consulta
$query = sprintf("SELECT sum(`countotal`) as verificados, (SELECT sum(`countotal`) from menciones where `verificado` = 0) as noverificados from menciones where `verificado` = 1");
$result = $mysqli->query($query);
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//Liberar espacio y cerrar conexion
$result->close();
$mysqli->close();

//now print the data
print json_encode($data);