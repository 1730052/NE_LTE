<?php

  function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }

//Mando a llamar el archivo con la conexion a la BD
include_once("conexion.php");

//Verifica que si tenga un valor el campo con id nombre y asigna el resto de las variables
  if (isset($_POST['nombre'])) {

      $nombre = $_POST['nombre'];
      $usuario = $_POST['usuario'];
      $contrasena = $_POST['contrasena'];
      $correo = $_POST['correo'];
  }

//Sentencia donde indico cual tabla va a tener los nuevos valores
$sentencia=$BD->prepare("INSERT INTO administradores (nombre, usuario, contra, correo)
                         VALUES (?,?,?,?)");
$resultado = $sentencia->execute([$nombre, $usuario, $contrasena, $correo]);
if ($resultado) {
    //Redirecciona en caso de que se añada correctamente
       phpAlert("Registro añadido correctamente");
       header('Location: ../vistas/admin_cAdmin.php');
  }else{
      //Mensaje en el caso contrario
      phpAlert("Error");
      header('Location: addAdministrador.php');
  }

?>
