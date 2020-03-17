<?php
session_start();
if (!isset($_SESSION['sesion']) || $_SESSION['tipo'] != 'admin') {
  header('Location: ../index.php');
}

include_once "../modelos/selectTables.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administradores</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/adminlte.min.css">
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
              <a href="inicio_Admin.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inicio</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="admin_cAdmin.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Administradores</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="admin_cEmp.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Empleados</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="admin_cCli.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Clientes</p>
              </a>
            </li>
          </ul>
        </nav>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="admin_cViajes.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Viajes</p>
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


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3>Administradores</h3>
                </div>

                <a href="agregarAdministrador.php">
                  <input type="submit" name="" value="Añadir" class="btn btn-primary">
                </a>

                <form action="../controladores/editAdministrador.php" method="post" role="form" id="quickForm">

                  <!--nombre, usuario, correo-->
                  <div class="crudAdmin" align="center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Usuario</th>
                          <th>Correo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($resultado_Admin as $resultado_Admin){ ?>
                          <tr>

                            <?php $nombreUsr = $resultado_Admin -> nombre ?>
                            <?php //echo $nombreUsr ?>
                            <td> <?php echo $resultado_Admin -> nombre ?></td>
                            <td> <?php echo $resultado_Admin -> usuario ?></td>
                            <td><?php echo $resultado_Admin -> correo ?></td>
                            <td>
                              <form action="../controladores/editAdministrador.php" method="post">
                                <button class="btn btn-success" type="submit" name="editar"
                                value="<?php echo htmlspecialchars($nombreUsr); ?>">Editar</button>
                              </form>
                            </td>
                            <td><form method="post" action="../controladores/borrar_Admin.php">
                            <button type="submit" class="btn btn-danger" name="id" value="<?php echo htmlspecialchars($nombreUsr); ?>">Borrar
                            </button>
                            </form>
                            </td>
                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

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
