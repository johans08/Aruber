<?php
session_start();

require_once './seguridad.php';

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MANTENIMIENTO FACTURAS</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">


        <script src="backend/lib/jquery/dist/jquery.min.js" type="text/javascript"></script>

        <!-- common css. required for every page-->
        <link href="backend/lib/bootstrap/dist/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css"/>
        <link href="backend/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="backend/lib/bootstrap/dist/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>

        <script src="backend/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="backend/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

        <link href="backend/lib/animate.css/animate.min.css" rel="stylesheet" type="text/css"/>


        <!-- Page scripts -->
        <!-- Datatables -->
        <script src="backend/lib/dataTableFull/datatables/media/js/jquery.dataTables.js"></script>
        <script src="backend/lib/dataTableFull/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="backend/lib/dataTableFull/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="backend/lib/dataTableFull/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="backend/lib/dataTableFull/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="backend/lib/dataTableFull/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="backend/lib/dataTableFull/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="backend/lib/dataTableFull/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="backend/lib/dataTableFull/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="backend/lib/dataTableFull/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="backend/lib/dataTableFull/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>


        <link href="backend/lib/dataTableFull/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="backend/lib/dataTableFull/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="backend/lib/dataTableFull/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="backend/lib/dataTableFull/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="backend/lib/dataTableFull/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="backend/lib/dataTableFull/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <!-- Mensaje de alerta -->
        <script src="backend/lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="backend/lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

        <!-- Script propios de la pagina -->
        <script src="backend/js/utils.js" type="text/javascript"></script>
        <script type="text/javascript" src="backend/js/facturasFunctions.js"></script>

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
                        <!-- Content Row -->
                        <div class="row">

                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">MANTEMIENTO DE FACTURAS!</h1>
                                    </div>
                                    <form class="user" role="form" onsubmit="return false;" id="formFacturas" action="backend/controller/facturasController.php">
                                        <div class="form-group row">
                                            <div class="form-group" id="groupidFactura">
                                                <input type="text" class="form-control form-control-user" id="txtidFactura"  placeholder="Factura">
                                            </div>
                                            <div class="form-group" id="groupUsuarios_idUsuarios">
                                                <input type="text" class="form-control form-control-user" id="txtUsuarios_idUsuarios"  placeholder="id Usuario">
                                            </div>
                                            <div class="form-group" id="groupnombreFactura">
                                                <input type="text" class="form-control form-control-user" id="txtnombreFactura"  placeholder="Nombre de la factura">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group" id="groupdireccionFactura">
                                                <input type="text" class="form-control form-control-user" id="txtdireccionFactura"  placeholder="Direccion de factura">
                                            </div>
                                            <div class="form-group" id="groupfechaFactura">
                                                <input type="date" class="form-control form-control-user" id="txtfechaFactura"  placeholder=" FECHA ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group" id="groupnumeroPedido">
                                                <input type="text" class="form-control form-control-user" id="txtnumeroPedido"  placeholder="Numero de factura">
                                            </div>
                                            <div class="form-group" id="groupmonto">
                                                <input type="text" class="form-control form-control-user" id="txtmonto"  placeholder="Monto a pagar">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <input type="hidden" id="typeAction" value="add_facturas" />
                                            <button type="submit" class="btn btn-primary btn-user btn-block" id="enviar">Guardar</button>
                                            <button type="reset"  class="btn btn-primary btn-user btn-block" id="cancelar">Cancelar</button>
                                        </div>
                                    </form>
                                </div>

                                <br>
                                <h3>Tabla con informacion de facturas</h3>


                                <br><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="dt_facturas"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID FACTURA</th>
                                                    <th>NOMBRE</th>
                                                    <th>DIRECCION</th>
                                                    <th>FECHA</th>
                                                    <th>N PEDIDO</th>
                                                    <th>MONTO</th>
                                                    <th>ID USUARIO</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                        <h5 class="modal-title" id="exampleModalLabel">Quieres cerrar sesión?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Estas seguro que quieres cerrar sesión?.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>