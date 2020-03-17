<?php
//include_once("../controladores/conexion.php");
include_once("../controladores/conexionEspecial.php");

$nombre = $_POST['id'];
echo $nombre;
echo $usuario;

$cuery = "DELETE FROM empleados WHERE nombre='$nombre'";

echo $cuery;
$result = mysqli_query($BD, $cuery);

if ($result) {
  header('Location: ../vistas/admin_cEmp.php');
} else {
  header('Location: ../vistas/admin_cEmp.php');
}
?>
