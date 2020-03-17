<?php
//Conexion con la BD
include_once "conexion.php";
session_start();

//Tomo los datos ingresados del usuario
$nombre = $_POST['usuario'];
$contra = $_POST['contra'];

//Recorro la tabla administradores buscando un registro que coincida
$sql = "SELECT * FROM administradores WHERE usuario = ? AND contra = ?";
$sentencia = $BD -> prepare($sql);
$sentencia -> execute([$nombre, $contra]);
$resultado = $sentencia -> fetchAll(PDO::FETCH_OBJ);

//Recorro la tabla de empleados buscando un registro que coincida
//Recorro la tabla administradores buscando un registro que coincida
$sql_Emp = "SELECT * FROM empleados WHERE usuario = ? AND contra = ?";
$sentencia_Emp = $BD -> prepare($sql_Emp);
$sentencia_Emp -> execute([$nombre, $contra]);
$resultado_Emp = $sentencia_Emp -> fetchAll(PDO::FETCH_OBJ);

if ($resultado != null) {
  header('Location: ../vistas/inicio_Admin.php');
  $_SESSION['tipo'] = "admin";
  $_SESSION['sesion'] = $nombre;

} elseif ($resultado_Emp != null) {
  header('Location: ../vistas/inicio_Emp.php');
  $_SESSION['tipo'] = "empleado";
  $_SESSION['sesion'] = $nombre;

} else {
  header('Location: ../index.php');
}
?>
