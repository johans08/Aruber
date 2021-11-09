<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Login</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Mensaje de alerta -->
        <script src="backend/lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="backend/lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

    </head>

    <body class="bg-gradient-primary">

        <div class="container">
            
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">
                    <br><br>
                    <button class="btn btn-primary btn-user btn-block" onclick="location.href='index.php'">Inicio</button>
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->

                                
                                
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Bienvenido a Aruber!</h1>
                                        </div>
                                        <form class="user" id="loginForm" method="POST">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                       placeholder="Enter Email Address..." name="usuario" id="txtusuario">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                       placeholder="Password" name="contrasena" id="txtcontrasena">
                                            </div>
                                            <div class="form-group d-block d-md-flex justify-content-between">
                                                <div>
                                                    <input type="radio" id="usuario" name="tipo" value="usuario" checked>
                                                    <label for="usuario">Usuario</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="chofer" name="tipo" value="chofer">
                                                    <label for="chofer">Chofer</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="administrador" name="tipo" value="administrador">
                                                    <label for="administrador">Administrador</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                            <hr>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.php">Forgot Password?</a>
                                        </div>

                                        <div class="text-center">
                                            <a class="small" href="register.php">Crear cuenta de Usuario -</a>
                                            <a class="small" href="choferes.php">Crear cuenta de Chofer -</a>
                                            <a class="small" href="registerAdministradores.php">Crear cuenta de Administrador </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script>
            function validar() {
                var validacion = true;

                if ($("#txtusuario").val() === "") {
                    validacion = false;
                }

                if ($("#txtcontrasena").val() === "") {
                    validacion = false;
                }

                return validacion;
            }

            $("#loginForm").submit(function (e) {
                e.preventDefault();
                if (validar()) {
                    $.ajax({
                        url: './backend/controller/authController.php',
                        method: 'post',
                        data: $(this).serialize(),
                        success: function (data) {
                            data = JSON.parse(data);
                            if (data.status) {
                                if(data.tipo == "usuario" || data.tipo == "chofer"){
                                    location.href = "viajes.php";
                                }else if(data.tipo == "administrador"){
                                    location.href = "admin.php";
                                }
                            } else {
                                swal("Error", "Usuario o contraseña incorrectos, verifique", "error");
                            }
                        },
                        error: function () { //si existe un error en la respuesta del ajax
                            swal("Error", "Se presento un error al enviar la informacion", "error");
                        }
                    });
                } else {
                    swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
                }
            });
        </script>
    </body>
</html>