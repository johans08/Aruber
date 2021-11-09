<!DOCTYPE HTML>
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
?>

<?php
require_once ('conexion.php');
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Highcharts Example</title>

        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <style type="text/css">
            #container {
                height: 400px; 
            }

            .highcharts-figure, .highcharts-data-table table {
                min-width: 310px; 
                max-width: 800px;
                margin: 1em auto;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #EBEBEB;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }
            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }
            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }
            .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
                padding: 0.5em;
            }
            .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }
            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }

        </style>
    </head>
    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Viaje Seguro <sup>ARUBER</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Usuarios
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                       aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Usuarios</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Registros:</h6>
                            <a class="collapse-item" href="registerAdministradores.php">Administradores</a>
                            <a class="collapse-item" href="choferes.php">Choferes</a>
                            <a class="collapse-item" href="register.php">Usuarios</a>
                            <a class="collapse-item" href="vehiculos.php">Vehiculos</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="viajes.php">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Pedir viaje</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <?php if ($_SESSION['tipo'] == "administrador"): ?>
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Administradores
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item active">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                           aria-controls="collapsePages">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Administradores</span>
                        </a>
                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                             data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Mantenimientos:</h6>
                                <a class="collapse-item" href="registerAdministradoresTable.php">Administradores</a>
                                <a class="collapse-item" href="facturasTable.php">Facturas</a>
                                <a class="collapse-item" href="choferesTable.php">Choferes</a>
                                <a class="collapse-item" href="registerAdmin.php">Usuarios</a>
                                <a class="collapse-item" href="vehiculosTable.php">Vehiculos</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                           aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Gráficos</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                             data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Graficos de:</h6>
                                <a class="collapse-item" href="IngresosAnuales.php">Facturado al mes</a>
                                <a class="collapse-item" href="ViajesCliente.php">Viajes de clientes</a>
                                <a class="collapse-item" href="IngresosAño.php">Ingrsos Anuales</a>
                                <a class="collapse-item" href="ClientesChofer.php">Clientes por chofer</a>
                            </div>
                        </div>
                    </li>

                <?php endif; ?>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                     aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                   placeholder="Search for..." aria-label="Search"
                                                   aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            
                            
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario'] . ' (' . $_SESSION['tipo'] . ')' ?> </span>
                                    <img class="img-profile rounded-circle"
                                         src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Salir
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <script src="code/highcharts.js"></script>
                        <script src="code/highcharts-3d.js"></script>
                        <script src="code/modules/exporting.js"></script>
                        <script src="code/modules/export-data.js"></script>
                        <script src="code/modules/accessibility.js"></script>

                        <figure class="highcharts-figure">
                            <div id="container"></div>
                            <p class="highcharts-description">
                                Tabla de los diferentes viajes, con especificaciones del idAdministrador, Usuario y Chofer.
                            </p>
                        </figure>


                        <script type="text/javascript">
                            Highcharts.chart('container', {
                                chart: {
                                    type: 'column',
                                    options3d: {
                                        enabled: true,
                                        alpha: 10,
                                        beta: 25,
                                        depth: 70
                                    }
                                },
                                title: {
                                    text: 'Viajes por Cliente'
                                },
                                subtitle: {
                                    text: 'Viajes realizados, con idChofer, Usuario y idAdministrador'
                                },
                                plotOptions: {
                                    column: {
                                        depth: 25
                                    }
                                },
                                xAxis: {
                                    categories: [ 
                                        <?php
                                        $sql = "SELECT * FROM Usuarios";
                                        $result = mysqli_query($connection,$sql);
                                        while ($registros = mysqli_fetch_array($result))
                                        {
                                        ?>
                                            '<?php echo $registros["usuario"]; ?>',

                                        <?php    
                                        }
                                        ?>
                                    ],
                                    labels: {
                                        skew3d: true,
                                        style: {
                                            fontSize: '16px'
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: null
                                    }
                                },
                                series: [{
                                    name: 'Viajes Realizados',
                                    data: [
                                        <?php
                                        $sql = "SELECT * FROM vehiculos";
                                        $result = mysqli_query($connection,$sql);
                                        while ($registros = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        ['<?php echo $registros["choferes_idChoferes"]; ?>', <?php echo $registros["Administradores_idAdministrador"] ?>],

                                        <?php    
                                        }
                                        ?>
                                    ]
                                }]
                            });
                        </script>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Quieres salir?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecciona "Salir" para salir de la página.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="login.php">Salir</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    </body>
</html>
