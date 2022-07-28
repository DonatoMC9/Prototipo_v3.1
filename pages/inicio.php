<?php

include '../connection/config.php';
include '../querys/tablero.php';

// Query para extraer datos para la Tabla resumen
$query = "SELECT nombre, rol FROM login WHERE id = '1'";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);
//Asignamos a las variables
$nombre = $row['nombre'];
$rol = $row['rol'];

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Prototipo de un Sistema de Evaluación y Selección de Personal Docente" />
        <meta name="author" content="Donato Molina Cruz" />
        <title>Inicio</title>
        
        <!-- Estilos CSS-->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/estilos.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" ></script>

    </head>
    <body class="sb-nav-fixed fondo">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="inicio.php">Prototipo v3.1</a>
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                        
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Salir</a></li>
                        <li><hr class="dropdown-divider" /></li>
                    </ul>
                </li>
            </ul>
        </nav>


        <!-- MENU LATERAL-->

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <a class="nav-link text-white" href="inicio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-house-user text-white"></i></div>
                                Inicio
                            </a>

                            <!-- Primera Parte -->
                            <li><hr class="dropdown-divider" /></li>
                            
                            <a class="nav-link" href="lista.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div>
                                Postulantes
                            </a>

                            <a class="nav-link" href="registro.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Registro
                            </a>

                            <!-- Segunda Parte -->
                            <li><hr class="dropdown-divider" /></li>
                            <a class="nav-link" href="eval_comp.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Evaluación
                            </a>
                            
                            <!-- Tercera Parte -->
                            <li><hr class="dropdown-divider" /></li>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Resultados
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="listado.php">Listado </a>
                                    <a class="nav-link" href="terna.php">Terna </a>     
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado como:</div>
                        <?php echo $rol; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">



            <!-- CONTENIDO -->

                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-2">Tablero de Postulantes</h4>
                        
                        <div class="row">
                            <div class="col-xl-2 col-md-6">
                                <div class="card registrados text-black mb-4 text-center">
                                    <div class="card-body bold grande"><?php echo($total); ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-center bold peque">
                                    TOTAL </br> Registrados 
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6">
                                <div class="card eval_cd text-black mb-1 text-center">
                                    <div class="card-body bold grande"><?php echo($eval_cd); ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-center peque">
                                    Evaluados </br> Comp. Duras 
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6">
                                <div class="card eval_cb text-black mb-1 text-center">
                                    <div class="card-body bold grande"><?php echo($eval_cb); ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-center peque">
                                    Evaluados </br> Comp. Blandas  
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-2 col-md-6">
                                <div class="card rechazado text-black mb-4 text-center">
                                    <div class="card-body">Rechazados</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center bold tam2">
                                        <?php echo($rech); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6">
                                <div class="card observado text-black mb-4 text-center">
                                    <div class="card-body">Observados</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center bold tam2">
                                        <?php echo($obs); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6">
                                <div class="card aceptado text-black mb-4 text-center">
                                    <div class="card-body">Aceptados</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center bold tam2">
                                        <?php echo($acep); ?>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                        
                        <!-- Inicio de los Graficos Pie-->
                        
                        <div class="row">
                            <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-header text-white rotulo">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Gráfico de las Evaluaciones
                                    </div>

                                    <div class="card-body"><canvas id="Evaluación_PieChart" width="100%" height="50"></canvas></div>
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-2">
                                    <div class="card-header text-white rotulo">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Gráfico de la Salida
                                    </div>

                                    <div class="card-body"><canvas id="Salida_PieChart" width="100%" height="50"></canvas></div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </main>


    <!-- FOOTER  -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">

                            <div class="text-muted">Copyright &copy; Drakho Website 2022</div>
                            
                        </div>
                    </div>
                </footer>

            </div>
        </div>
        
        
        <!-- Libreria de Bootstrap -->
        <script src="../libs/bootstrap.bundle.min.js"></script>
        <script src="../js/scripts.js"></script>

        <!-- Libreria de Chart.js -->
        <script src="../assets/charts/Chart.min.js"></script>
        
        <!-- Libreria de Data Tables -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>

<script>

// Pie Chart de Variables de Evaluación
var ctx = document.getElementById("Evaluación_PieChart");
var Evaluación_PieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Evaluados CD", "Evaluados CB"],
        datasets: [{
            data: [<?php echo($eval_cd) ?>, <?php echo($eval_cb)?>],
            backgroundColor: ['#FBC02D', '#138496'],
        }],
    },  
});

// Pie Chart de Variables de Salida
var ctx = document.getElementById("Salida_PieChart");
var Salida_PieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Aceptado", "Observado", "Rechazado"],
        datasets: [{
            data: [<?php echo($acep) ?>, <?php echo($obs)?>,<?php echo($rech)?>],
            backgroundColor: ['#008000', '#F5872A','#dc3545'],
        }],
    },  
});


</script>