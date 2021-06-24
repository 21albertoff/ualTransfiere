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
$query = sprintf("SELECT (SELECT hashtag from hashtags where id = idh) as Nombre, `idh`,`semana0`,`semana1`,`semana2`,`semana3`,`semana4`,`semana5`,`semana6`,`semana7`,`semana8`,`semana9`,`semana10` FROM `seguimientografica`");
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