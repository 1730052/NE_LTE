<?php
  include_once("../controladores/conexion.php");
  include_once("../controladores/conexionEspecial.php");

  $nombreFijo = $_POST['editar'];
  $cliente = $_POST['cliente'];
  $empleado = $_POST['empleado'];
  $admin = $_POST['admin'];
  $newFechaSolicitud = $_POST['solicitud'];
  $newFechaFin = $_POST['fin'];
  $newMaterial = $_POST['material'];
  $newDestino = $_POST['destino'];

  // echo $nombreFijo;
  // echo "Cliente-";echo $cliente;
  // echo "Empleado-";echo $empleado;
  // echo "Admin-";echo $admin;
  // echo "-";echo $newFechaSolicitud;
  // echo "-";echo $newFechaFin;
  // echo "-";echo $newMaterial;
  // echo "-";echo $newDestino;

  $cuery = "UPDATE viajes SET id_cliente = '$cliente', id_empleado = '$empleado', id_admin = '$admin', fecha_solicitud = '$newFechaSolicitud', fecha_fin = '$newFechaFin', material = '$newMaterial', destino = '$newDestino' WHERE id = $nombreFijo";
  echo $cuery;

  $result = mysqli_query($BD, $cuery);

  if ($result) {
    header('Location: ../vistas/admin_cViajes.php');
  }
?>
