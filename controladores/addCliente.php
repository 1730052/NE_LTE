<?php

  function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }

//Mando a llamar el archivo con la conexion a la BD
include_once("conexion.php");

//Verifica que si tenga un valor el campo con id nombre y asigna el resto de las variables
  if (isset($_POST['nombre'])) {

      $nombre = $_POST['nombre'];
      $correo = $_POST['correo'];
      $numero = $_POST['numero'];
  }

//Sentencia donde indico cual tabla va a tener los nuevos valores
$sentencia=$BD->prepare("INSERT INTO clientes (nombre, correo, telefono)
                         VALUES (?,?,?)");
$resultado = $sentencia->execute([$nombre, $correo, $numero]);
if ($resultado) {
    //Redirecciona en caso de que se añada correctamente
       phpAlert("Registro añadido correctamente");
       header('Location: ../vistas/admin_cCli.php');
  }else{
      //Mensaje en el caso contrario
      phpAlert("Error");
      header('Location: addCliente.php');
  }

?>
