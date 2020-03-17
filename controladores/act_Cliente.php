<?php
  include_once("../controladores/conexion.php");
  include_once("../controladores/conexionEspecial.php");


  $nombreFijo = $_POST['editar'];
  echo $nombreFijo;
  $newNombre = $_POST['nombre'];
  echo $newNombre;
  $newCorreo = $_POST['correo'];
  echo $newCorreo;
  $newTelefono = $_POST['telefono'];
  echo $newTelefono;

  $cuery = "UPDATE clientes SET nombre = '$newNombre', correo = '$newCorreo', telefono = '$newTelefono' WHERE nombre = '$nombreFijo'";
  echo $cuery;

  $result = mysqli_query($BD, $cuery);

  if ($result) {
    header('Location: ../vistas/admin_cCli.php');
  }
?>
