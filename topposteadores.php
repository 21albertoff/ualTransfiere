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
$query = sprintf("SELECT * FROM `usuarios` WHERE `seleccionado`='1' and `eliminado` ='0' and `post`='0' order by tweets DESC LIMIT 15");
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