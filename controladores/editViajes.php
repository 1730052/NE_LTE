<?php
session_start();
if (!isset($_SESSION['sesion']) || $_SESSION['tipo'] != 'admin') {
  header('Location: ../index.php');
}

include "../controladores/conexion.php";
include "../controladores/conexionEspecial.php";

$id = $_POST['editar'];

$cuery4 = "SELECT fecha_solicitud, fecha_fin, material, destino FROM viajes WHERE id = $id";
$result4 = mysqli_query($BD, $cuery4);

$numrows4 = mysqli_num_rows($result4);
 while ($row4 = mysqli_fetch_assoc($result4)) {
   $fecha_solicitud = $row4['fecha_solicitud'];
   $fecha_fin = $row4['fecha_fin'];
   $material = $row4['material'];
   $destino = $row4['destino'];

 }

//$cuery = "SELECT Nombre, NumEmpleado, Departamento, Turno,Linea, Ruta FROM Transporte WHERE NumEmpleado = '$numero_emp'";
$cuery = "SELECT  id,nombre FROM clientes WHERE id BETWEEN 1 AND 10000";
$result = mysqli_query($BD, $cuery);

$numrows = mysqli_num_rows($result);

$cuery2 = "SELECT  id, nombre FROM empleados WHERE id BETWEEN 1 AND 10000";
$result2 = mysqli_query($BD, $cuery2);

$numrows2 = mysqli_num_rows($result2);

$cuery3 = "SELECT  id, nombre FROM administradores WHERE id BETWEEN 1 AND 10000";
$result3 = mysqli_query($BD, $cuery3);

$numrows3 = mysqli_num_rows($result3);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Editar Viajes</title>

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
                <h3>Editar Viajes</h3>
              </div>
              <form method="post" role="form" id="quickForm" action="act_Viaje.php" method="post">

                <center>
                <table class="table table-hover">

                <tr>
                <td><B>Cliente:</B></td>
                <td> <SELECT NAME="cliente">
                <?php
                while($row = mysqli_fetch_assoc($result)){
                  $id_cliente = $row['id'];
                  $nombre_cliente = $row['nombre'];
                  echo "<option value = '".$id_cliente."'>".$nombre_cliente."</option>";
                }
                ?>

                <tr>
                <td><B>Empleado:</B></td>
                <td> <SELECT NAME="empleado">
                <?php
                while($row2 = mysqli_fetch_assoc($result2)){
                  $id_empleado = $row2['id'];
                  $nombre_empleado = $row2['nombre'];
                  echo "<option value = '".$id_empleado."'>".$nombre_empleado."</option>";
                }
                ?>

                <tr>
                <td><B>Admin:</B></td>
                <td> <SELECT NAME="admin">
                <?php
                while($row3 = mysqli_fetch_assoc($result3)){
                  $id_admin = $row3['id'];
                  $nombre_admin = $row3['nombre'];
                  echo "<option value = '".$id_admin."'>".$nombre_admin."</option>";
                }
                ?>

                <tr>
                <td><B>Fecha Solicitud:</B></td>
                <td> <INPUT TYPE="text" NAME="solicitud" id="nombre" value="<?php echo $fecha_solicitud; ?>" SIZE=40 MAXLENGTH=50 required></td>

                <tr>
                <td><B>Fecha Fin:</B></td>
                <td> <INPUT TYPE="text" NAME="fin" id="nombre" value="<?php echo $fecha_fin; ?>" SIZE=40 MAXLENGTH=50 required></td>

                <tr>
                <td><B>Material:</B></td>
                <td> <INPUT TYPE="text" NAME="material" id="nombre" value="<?php echo $material; ?>" SIZE=40 MAXLENGTH=50 required></td>

                <tr>
                <td><B>Destino:</B></td>
                <td> <INPUT TYPE="text" NAME="destino" id="correo" value="<?php echo $destino; ?>" required></td>

                <tr>

                <td ALIGN=CENTER colspan="2">
                <!--<INPUT NAME = "agregar" TYPE="submit" VALUE="Agregar Administrador"></INPUT>-->
                <button class="btn btn-success" type="submit" name="editar"
                value="<?php echo htmlspecialchars($id); ?>">Editar</button>

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
