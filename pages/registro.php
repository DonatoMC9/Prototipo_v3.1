<?php
	include("../connection/config.php");
        
// Query para extraer datos para la Tabla Usuarios
$query = "SELECT nombre, rol FROM login WHERE id = '1'";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);
//Asignamos a las variables
$nombre = $row['nombre'];
$rol = $row['rol'];

// Query para extraer datos para la Tabla Postulantes
$sql = "SELECT * FROM postulantes";
$resultado = mysqli_query($mysqli, $sql);;

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Prototipo de un Sistema de Evaluación y Selección de Personal Docente" />
        <meta name="author" content="Donato Molina Cruz" />
        <title>Registro</title>
        
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

                            <a class="nav-link" href="inicio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-house-user"></i></div>
                                Inicio
                            </a>

                            <!-- Primera Parte -->
                            <li><hr class="dropdown-divider" /></li>
                            
                            <a class="nav-link" href="lista.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div>
                                Postulantes
                            </a>

                            <a class="nav-link text-white" href="registro.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card text-white"></i></div>
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
                        
                        
                        <div class="row">
                            <!-- Espacio para centrar el form -->
                            <div class="col-xl-3 col-md-6 "></div>
                            
                            <!-- Div central-->
                            <div class="col-xl-6 col-md-6 ">

                                <!-- Inicio del Card-->
                                <div class="card mb-2">
                                    <div class="card-header text-white rotulo">
                                        <i class="fas fa-address-card me-1"></i>
                                        Registro de Postulantes
                                    </div>

                                    <div class="card-body">

                                    <!-- Form -->
                                    <form action="../util/register.php" method="POST">                              
                                            <div class="form-row">
                                            
                                                <div class="col col-md-10">
                                                    <div class="form-group">
                                                        <label class="bold tam">Nombres:</label>
                                                        <input type="text" class="form-control tam" name="nombres" placeholder="Nombres" required autocomplete="off" >
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="bold tam">Apellido Paterno:</label>
                                                        <input type="text" class="form-control tam" name="ape_paterno" placeholder="Apellido Paterno" required autocomplete="off" >
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label class="bold tam">Apellido Materno:</label>
                                                        <input type="text" class="form-control tam" name="ape_materno" placeholder="Apellido Materno" required autocomplete="off" >
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <labe class="bold tam"l>C.I.:</label>
                                                        <input type="text" class="form-control tam" name="ci" placeholder="Cedula de Identidad" required autocomplete="off" >
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label class="bold tam">Edad:</label>
                                                        <input type="text" class="form-control tam" name="edad" placeholder="Edad" required autocomplete="off" >
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label class="bold tam">Telefono:</label>
                                                        <input type="text" class="form-control tam" name="telefono" placeholder="Telefono" required autocomplete="off" >
                                                    </div>
                                                    <br>                                                
                                                    <!-- Botones-->
                                                    <button type="submit" class="btn btn-success">Registrarse</button>
                                                    <button type="reset" class="btn btn-danger">Cancelar</button>
                                                    
                                                </div>
                                            </div>
                                            
                                        </form>
                                        <!-- Final del Form-->
                                
                                    </div>
                                </div>

                            </div>
                            <!-- Fin del Div central-->

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
        <script src="../assets/charts/chart-area-demo.js"></script>
        <script src="../assets/charts/chart-bar-demo.js"></script>

        <!-- Libreria de Data Tables -->
        
        <script src="../js/simple-datatables@latest.js"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>

