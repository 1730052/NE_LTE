<?php

  $fecha_inicio = "";
  $fecha_fin = "";
  $material = "";
  $destino = "";

  function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }

  //Mando a llamar el archivo con la conexion a la BD
  include_once("conexion.php");

  //Verifica que si tenga un valor el campo con id nombre y asigna el resto de las variables
  if (isset($_POST['fecha_inicio'])) {
    $empleado = $_POST['empleado'];
    $cliente = $_POST['cliente'];
    $admin = $_POST['admin'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $material = $_POST['material'];
    $destino = $_POST['destino'];
  }

  //Sentencia donde indico cual tabla va a tener los nuevos valores
  $sentencia = $BD -> prepare("INSERT INTO viajes (id_empleado, id_cliente, fecha_solicitud, fecha_fin, material, destino, id_admin)
  VALUES (?, ?, ?, ?, ?, ?, ?)");
  $resultado = $sentencia -> execute([$empleado, $cliente, $fecha_inicio, $fecha_fin, $material, $destino, $admin]);

  //Redirecciona en caso de que se añada correctamente
  if ($resultado) {
  phpAlert("Registro añadido correctamente");
  header('Location: ../vistas/admin_cViajes.php');
  } else {
  //Mensaje en el caso contrario
  phpAlert("Error");
  header('Location: addViaje.php');
  }



?>
