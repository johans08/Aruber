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
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span>
        </a>
    </li>

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

    <?php if($_SESSION['tipo'] == "administrador"): ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    
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
            <span>Charts</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pedir Viaje:</h6>
                <a class="collapse-item" href="chart1.php">Facturado al mes</a>
                <a class="collapse-item" href="chart2.php">Ingreso por año</a>
                <a class="collapse-item" href="chart3.php">Clientes por Chofer</a>
                <a class="collapse-item" href="chart4.php">Viajes de clientes</a>
            </div>
        </div>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>