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

    <title>Pedir Viaje</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="index.js"></script>

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

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Viajes</h1>
    <p class="mb-4">Con Aruber siempre viajaras economicamente seguro!</p>



    <!-- Content Row -->
    <div class="container-fluid">

        <input class="form-control bg-light border-0 small" id="start" placeholder="Lugar, Provincia, País..">
        <br><br>
        <input class="form-control bg-light border-0 small" id="end" placeholder="Lugar, Provincia, País..">
        <br><br>
        <input class="btn btn-primary" type="button" onclick="submit_form()" value="Calcular Ruta"> 
        <br><br>

        <div id="map" style="height: 1000px; width: 1625px;"></div>   

        <script>
            var directionsDisplayDriving;
            var directionsDisplayWalking;
            var infowindowDriving;
            var infowindowWalking;
            var directionsService;
            var map;

            // returns a polyline.  Depending on the travelMode
            function getPolylineOptions(travelMode) {

            }

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: new google.maps.LatLng(9.9354849, -84.0353893), // Lausanne
                    zoom: 15
                });
                directionsService = new google.maps.DirectionsService();


                const icons = {
                    info: {
                        icon: "img/Black.png",
                    }
                };
                const features = [
                {
                    position: new google.maps.LatLng(9.936305446658666, -84.03357423404692),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.943717725229552, -84.03336139014571),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.93607234038951, -84.05500318126238),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.941232007202089, -84.0385334049984),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.93708402443446, -84.04713591130688),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.931663984917499, -84.03809905670703),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.931894505334112, -84.06208612155824),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.937981182132784, -84.04268336926603),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.938055157079974, -84.03487277699715),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.941663368734773, -84.02909435554949),
                    type: "info",
                },
                {
                    position: new google.maps.LatLng(9.94911808408621, -84.04900664192758),
                    type: "info",
                }
                ];

                // Create markers.
                for (let i = 0; i < features.length; i++) {
                    const marker = new google.maps.Marker({
                        position: features[i].position,
                        icon: icons[features[i].type].icon,
                        map: map,
                    });
                }
            }

            // reads the inputs and calculates the route
            function submit_form() {
                // remove previous routes
                if (directionsDisplayDriving) {
                    directionsDisplayDriving.setMap(null);
                    directionsDisplayDriving = null;
                }
                // calculate the route, both Driving and Walking
                calcRoute(
                    document.getElementById('start').value,
                    document.getElementById('end').value,
                    'DRIVING',
                    function (display) {
                            // we put an infoWindow, 20% along the Driving route, and display the total length and duration in the content.
                            directionsDisplayDriving = display;
                            var point = distanceAlongPath(display, null, .2);
                            var content = '<h1>Driving - total distance: ' + getTotalDistance(display) + ' m </h1><h1><br/> total duration: ' + getTotalDuration(display) + 's </h1> <br/> ' + '<h1>Precio del Viaje: ' + (Math.trunc(2 + (getTotalDistance(display) / 1050))) + '</h1>';
                            if (infowindowDriving) {
                                infowindowDriving.setMap(null);
                            }
                            infowindowDriving = new google.maps.InfoWindow({
                                content: content,
                                map: map,
                                position: point
                            });
                        }
                        );



                ////absolute (in meter) 
                //var point = distanceAlongPath(directionsDisplay, 100000);
                // as a ratio (0 to 1)  of the route
                //var point = distanceAlongPath(directionsDisplay, null, 0.3);  // at 30% from the origin
            }

            function calcRoute(start, end, travelMode, onReady) {
                // alert(travelMode);
                var mode = google.maps.TravelMode[travelMode];
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: mode
                };
                directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        var polylineOptions = getPolylineOptions(travelMode);
                        var directionsDisplay = new google.maps.DirectionsRenderer({
                            map: map,
                            polylineOptions: polylineOptions,
                            preserveViewport: false
                        });
                        directionsDisplay.setDirections(response);
                        if (typeof onReady == 'function') {
                            onReady(directionsDisplay);
                        }
                    } else {
                        console.log('status: ' + status);
                    }
                });
            }


            function getTotalDuration(directionsDisplay) {
                var directionsResult = directionsDisplay.getDirections();
                var route = directionsResult.routes[0];
                var totalDuration = 0;
                var legs = route.legs;
                for (var i = 0; i < legs.length; ++i) {
                    totalDuration += legs[i].duration.value;
                }
                return totalDuration;
            }

            function getTotalDistance(directionsDisplay) {
                var directionsResult = directionsDisplay.getDirections();
                var route = directionsResult.routes[0];
                var totalDistance = 0;
                var legs = route.legs;
                for (var i = 0; i < legs.length; ++i) {
                    totalDistance += legs[i].distance.value;
                }
                return totalDistance;
            }
            //  Returns a point along a route; at a requested distance ( either absolute (in meter) or as a ratio (0 to 1)  of the route)
            //     example : you have a random route ( 100km long), and you want to put a marker, 30km from the origin.
            //     we add the distances of the waypoints and stop when we reach the requested total length.
            //     nothing stops you from making it even more precise by interpolling.
            // the function returns a location (LatLng) along the route
            function distanceAlongPath(directionsDisplay, distanceFromOrigin, ratioFromOrigin) {
                var directionsResult = directionsDisplay.getDirections();
                var route = directionsResult.routes[0];
                var totalDistance = getTotalDistance(directionsDisplay);
                var tempDistanceSum = 0;
                var dist = 0;

                if (ratioFromOrigin) {
                    distanceFromOrigin = ratioFromOrigin * totalDistance;
                }

                // we prepare the object 
                var result = new Object();
                result.routes = new Array();
                result.routes[0] = route;
                for (var i in result.routes[0].overview_path) {
                    if (i > 0) {
                        dist = google.maps.geometry.spherical.computeDistanceBetween(result.routes[0].overview_path[i], result.routes[0].overview_path[i - 1]);
                    }
                    tempDistanceSum += dist;
                    if (tempDistanceSum > distanceFromOrigin) {
                        return result.routes[0].overview_path[i];
                    }
                    // console.log(dist+' '+tempDistanceSum);
                }
            }
        </script>    

        <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwlfK39eHtAoRvMLuu_sBTO8W3f3NGX9Q&callback=initMap&libraries=&v=weekly"
        async
        ></script>
        <br><br><br><br><br>

        <div class="text-center mb-4">
            <h5>Tipo de cambio:</h5>
            <span>1 USD = 622 CRC</span>
        </div>
        <div class="text-center mb-4">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div>
                        <label for="">Dólares</label>
                        <input type="number" class="form-control" id="usd" min="0">
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <label for="">Colones</label>
                        <input type="number" class="form-control" id="crc" disabled>
                    </div>
                </div>
            </div>
            
        </div>
        <div id="smart-button-container">
            <div style="text-align: center"><label for="description">Cobro Por El Uso De Viaje En Aruber </label><input type="number" name="descriptionInput" id="description" maxlength="127" value=""></div>
            <p id="descriptionError" style="visibility: hidden; color:red; text-align: center;">Please enter a description</p>
            <div style="text-align: center"><label for="amount">Monto Total A Pagar </label><input name="amountInput" type="number" id="amount" value="" ><span> CRC</span></div>
            <p id="priceLabelError" style="visibility: hidden; color:red; text-align: center;">Please enter a price</p>
            <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value="" ></div>
            <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>
            <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
        </div>
        <script src="https://www.paypal.com/sdk/js?client-id=AWWacnTCG8rUc5zZ5XkP_DbInjklk4i-8s8AfA3UhwEBAxixmcWo5FPBitf8lp9fzI-C20IJjR99pgu-&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
        <script>
        function initPayPalButton() {
            var description = document.querySelector('#smart-button-container #description');
            var amount = document.querySelector('#smart-button-container #amount');
            var descriptionError = document.querySelector('#smart-button-container #descriptionError');
            var priceError = document.querySelector('#smart-button-container #priceLabelError');
            var invoiceid = document.querySelector('#smart-button-container #invoiceid');
            var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
            var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

            var elArr = [description, amount];

            if (invoiceidDiv.firstChild.innerHTML.length > 1) {
                invoiceidDiv.style.display = "block";
            }

            var purchase_units = [];
            purchase_units[0] = {};
            purchase_units[0].amount = {};

            function validate(event) {
                return event.value.length > 0;
            }

            paypal.Buttons({
                style: {
                    color: 'gold',
                    shape: 'pill',
                    label: 'pay',
                    layout: 'vertical',

                },

                onInit: function (data, actions) {
                    actions.disable();

                    if (invoiceidDiv.style.display === "block") {
                        elArr.push(invoiceid);
                    }

                    elArr.forEach(function (item) {
                        item.addEventListener('keyup', function (event) {
                            var result = elArr.every(validate);
                            if (result) {
                                actions.enable();
                            } else {
                                actions.disable();
                            }
                        });
                    });
                },

                onClick: function () {
                    if (description.value.length < 1) {
                        descriptionError.style.visibility = "visible";
                    } else {
                        descriptionError.style.visibility = "hidden";
                    }

                    if (amount.value.length < 1) {
                        priceError.style.visibility = "visible";
                    } else {
                        priceError.style.visibility = "hidden";
                    }

                    if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
                        invoiceidError.style.visibility = "visible";
                    } else {
                        invoiceidError.style.visibility = "hidden";
                    }

                    purchase_units[0].description = description.value;
                    purchase_units[0].amount.value = amount.value;

                    if (invoiceid.value !== '') {
                        purchase_units[0].invoice_id = invoiceid.value;
                    }
                },

                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: purchase_units,
                    });
                },

                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (orderData) {

                        // Full available details
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                        // Show a success message within this page, e.g.
                        const element = document.getElementById('paypal-button-container');
                        element.innerHTML = '';
                        element.innerHTML = '<h3>Thank you for your payment!</h3>';

                        // Or go to another URL:  actions.redirect('thank_you.html');

                    });
                },

                onError: function (err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
            }
        initPayPalButton();
</script>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

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

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script>

    $("#usd").on('keyup',function(){
        var usd = $(this).val() ? $(this).val() : 0 ;
        var compra = 622;
        crc = parseFloat(usd) * parseFloat(compra);
        console.log($("#crc"));
        $("#crc").val(crc);
    });
</script>

</body>

</html>
