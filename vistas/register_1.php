<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Register</title>

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
        <script type="text/javascript" src="backend/js/usuariosFunctions.js"></script>

    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Crear nuevo usuario!</h1>
                                </div>
                                <form class="user" role="form" onsubmit="return false;" id="formusuarios" action="backend/controller/usuariosController.php">
                                    <div class="form-group row">
                                        <div class="form-group" id="groupidUsuarios">
                                            <input type="text" class="form-control form-control-user" id="txtidUsuarios"  placeholder="Id Usuario">
                                        </div>
                                        <div class="form-group" id="groupnombreUsuario">
                                            <input type="text" class="form-control form-control-user" id="txtnombreUsuario"  placeholder="Nombre Usuario">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group" id="groupapellido1Usuario">
                                            <input type="text" class="form-control form-control-user" id="txtapellido1Usuario"  placeholder="Primer Apellido Usuario">
                                        </div>
                                        <div class="form-group" id="groupapellido2Usuario">
                                            <input type="text" class="form-control form-control-user" id="txtapellido2Usuario"  placeholder="Segundo Apellido Usuario">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group" id="groupfechaNacimientoUsuario">
                                            <input type="date" class="form-control form-control-user" id="txtfechaNacimientoUsuario"  placeholder="Fec. Nacimiento">
                                        </div>
                                        <div class="form-group" id="grouptelefonoTrabajo">
                                            <input type="text" class="form-control form-control-user" id="txttelefonoTrabajo"  placeholder="Telefono Trabajo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group" id="groupcelular">
                                            <input type="text" class="form-control form-control-user" id="txtcelular"  placeholder="celular">
                                        </div>
                                        <div class="form-group" id="groupusuario">
                                            <input type="text" class="form-control form-control-user" id="txtusuario"  placeholder="Usuario">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group" id="groupcorreoUsuario">
                                            <input type="text" class="form-control form-control-user" id="txtcorreoUsuario"  placeholder="correo usuario">
                                        </div>
                                        <div class="form-group" id="groupcontrasenaUsuario">
                                            <input  type="password" class="form-control form-control-user" id="txtcontrasenaUsuario" name="password" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group" id="groupsexo">
                                            <input type="text" class="form-control form-control-user" id="txtsexo"  placeholder="Genero">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <input type="hidden" id="typeAction" value="add_usuarios" />
                                        <button type="submit" class="btn btn-primary btn-user btn-block" id="enviar">Guardar</button>
                                        <button type="reset"  class="btn btn-primary btn-user btn-block" id="cancelar">Cancelar</button>
                                    </div>
                                    <a href="login.php" class="btn btn-primary btn-user btn-block">
                                        Registrar Cuenta
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>

</html>