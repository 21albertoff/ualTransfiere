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
$query = sprintf("SELECT sum(`tweetstotal`) as verificados, (SELECT sum(`tweetstotal`) from usuarios where `verificado` = 0) as noverificados from usuarios where `verificado` = 1");
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