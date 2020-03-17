<?php
session_start();
if (!isset($_SESSION['sesion']) || $_SESSION['tipo'] != 'admin') {
  header('Location: ../index.php');
}

//include_once("conexion.php");
include_once("conexionEspecial.php");
//include_once "../modelos/selectTables.php";

$nombreFijo = $_POST['editar'];
//echo $nombreFijo;

$cuery = "SELECT nombre, usuario, contra, correo FROM administradores WHERE nombre = '$nombreFijo'";
$result = mysqli_query($BD,$cuery);

$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result)){
  $nombre = $row['nombre'];
  $usuario = $row['usuario'];
  $contra = $row['contra'];
  $correo = $row['correo'];

  //echo $nombre ;
  //echo $usuario;
  //echo $contra ;
  //echo $correo ;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Editar Administradores</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../vistas/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../vistas/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../vistas/inicio_Admin.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inicio</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../vistas/admin_cAdmin.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Administradores</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../vistas/admin_cEmp.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Empleados</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../vistas/admin_cCli.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Clientes</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../vistas/admin_cViajes.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Viajes</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cerrar sesión</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div align="left" class="content-wrapper">
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3>Editar administradores</h3>
              </div>
              <form method="post" role="form" id="quickForm" action="act_Admin.php" method="post">

                <center>
                <table class="table table-hover">
                <tr>
                <td><B>Nombre:</B></td>
                <td> <INPUT TYPE="text" NAME="nombre" id="nombre" value="<?php echo $nombre; ?>" SIZE=40 MAXLENGTH=50 required></td>

                <tr>
                <td><B>Usuario:</B></td>
                <td> <INPUT TYPE="text" NAME="usuario" id="usuario" value="<?php echo $usuario; ?>" SIZE=22 MAXLENGTH=48 required></td>

                <tr>
                <td><B>Contraseña:</B></td>
                <td> <INPUT TYPE="password" NAME="contrasena" id="contrasena" value="<?php echo $contra; ?>" SIZE=22 MAXLENGTH=48 required></td>

                <tr>
                <td><B>Correo:</B></td>
                <td> <INPUT TYPE="email" NAME="correo" id="correo" value="<?php echo $correo; ?>" required></td>

                <tr>

                <td ALIGN=CENTER colspan="2">
                <!--<INPUT NAME = "agregar" TYPE="submit" VALUE="Agregar Administrador"></INPUT>-->
                <button class="btn btn-success" type="submit" name="editar"
            value="<?php echo htmlspecialchars($nombreFijo); ?>">Editar</button>

                </table>
                </center>

              </form>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>


  <script src="../../plugins/jquery/jquery.min.js"></script>
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="../../dist/js/adminlte.min.js"></script>
  <script src="../../dist/js/demo.js"></script>

</body>
</html>
