<?php
  include_once("../controladores/conexion.php");
  include_once("../controladores/conexionEspecial.php");


  $nombreFijo = $_POST['editar'];
  echo $nombreFijo;
  $newNombre = $_POST['nombre'];
  echo $newNombre;
  $newUsuario = $_POST['usuario'];
  echo $newUsuario;
  $newCorreo = $_POST['correo'];
  echo $newCorreo;

  $cuery = "UPDATE administradores SET nombre = '$newNombre', usuario = '$newUsuario', correo = '$newCorreo' WHERE nombre = '$nombreFijo'";
  echo $cuery;

  $result = mysqli_query($BD, $cuery);

  if ($result) {
    header('Location: ../vistas/admin_cAdmin.php');
  }
?>
