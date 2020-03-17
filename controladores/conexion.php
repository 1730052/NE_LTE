<?php

//Variables que tienen los datos de la BD
$nombre_base_de_datos = "sistema";
$usuario = "root";
$contraseña = "";

try{
  //Metodo PDO con el que se hace la conexion a la BD
  $BD = new PDO('mysql:host=localhost;dbname='. $nombre_base_de_datos, $usuario, $contraseña);
  $BDO = new PDO('mysql:host=localhost;dbname='. $nombre_base_de_datos, $usuario, $contraseña);
  //echo "Conexion exitosa";

} catch (PDOException $e){
  //Mensaje de error
  echo "Ocurrio un error" . $e->getMessage();
}

?>
