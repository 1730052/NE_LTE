<?php
  include_once("../controladores/conexion.php");
  include_once("../controladores/conexionEspecial.php");
    // echo $nombre;
    // echo $usuario;
    // echo $contra;
    // echo $correo;
    // echo $socio;
    // echo $vehiculo;

  $nombreFijo = $_POST['editar'];
  echo $nombreFijo;
  $newNombre = $_POST['nombre'];
  echo $newNombre;
  $newUsuario = $_POST['usuario'];
  echo $newUsuario;
  $newContra = $_POST['contra'];
  echo $newContra;
  $newCorreo = $_POST['correo'];
  echo $newCorreo;
  $newSocio = $_POST['socio'];
  echo $newSocio;
  $newVehiculo = $_POST['vehiculo'];
  echo $newVehiculo;

  $cuery = "UPDATE empleados SET nombre = '$newNombre', usuario = '$newUsuario', contra = '$newContra', correo = '$newCorreo', socio = '$newSocio', vehiculo = '$newVehiculo' WHERE nombre = '$nombreFijo'";
  echo $cuery;

  $result = mysqli_query($BD, $cuery);

  if ($result) {
    header('Location: ../vistas/admin_cEmp.php');
  }
?>
