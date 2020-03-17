<?php
$nombre_base_de_datos = "sistema";
$usuario = "root";
$contraseña = "";

$BD = mysqli_connect("localhost", "root", "", "sistema");

if(mysqli_connect_errno()){
  echo "ERROR";
  exit();
}

?>
