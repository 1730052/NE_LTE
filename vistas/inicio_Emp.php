<?php
session_start();
if (!isset($_SESSION['sesion']) || $_SESSION['tipo'] != 'empleado') {
  header('Location: ../index.php');
}

  $nombreUsuario = $_SESSION['sesion'];

  include "../controladores/conexion.php";
  include "../controladores/conexionEspecial.php";

  $cuery = "SELECT id FROM empleados WHERE usuario = '$nombreUsuario'";

  $result = mysqli_query($BD, $cuery);
  $numrows = mysqli_num_rows($result);

  while ($row = mysqli_fetch_assoc($result)) {
    $Usuario = $row['id'];
  }

  $cuery3 = $BDO -> query("SELECT c.nombre AS Cliente, a.nombre AS Admin, v.fecha_solicitud, v.fecha_fin, v.material, v.destino
            FROM viajes AS v
            INNER JOIN clientes AS c ON c.id = v.id_cliente
            INNER JOIN administradores AS a ON a.id = v.id_admin
            WHERE v.id_empleado = $Usuario");
  $resultadoEmp = $cuery3 -> fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inicio administrador</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
            <a href="inicio_Emp.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inicio</p>
            </a>
          </li>
        </ul>
      </nav>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../controladores/logout.php" class="nav-link">
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

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="content-wrapper">
          <div class="crudAdmin" align="center">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Administrador</th>
                  <th>Fecha de solicitud</th>
                  <th>Fecha de finalización</th>
                  <th>Material</th>
                  <th>Destino</th>
                </tr>
              </thead>
              <tbody>
                <!--c.nombre as Cliente, e.nombre as Empleado, a.nombre as Admin, v.fecha_solicitud, v.fecha_fin, v.material, v.destino-->
                <?php foreach ($resultadoEmp as $resultadoEmp){ ?>
                  <td><?php echo $resultadoEmp -> Cliente ?></td>
                  <td><?php echo $resultadoEmp -> Admin ?></td>
                  <td><?php echo $resultadoEmp -> fecha_solicitud ?></td>
                  <td><?php echo $resultadoEmp -> fecha_fin ?></td>
                  <td><?php echo $resultadoEmp -> material ?></td>
                  <td><?php echo $resultadoEmp -> destino ?></td>
                  <tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

      </div>
    </div>
  </section>
</div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
