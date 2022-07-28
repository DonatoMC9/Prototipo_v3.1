<?php
include '../connection/config.php';

// recibimos el ID del postulante
$id = $_GET['id'];

// Query para extraer datos para la Tabla Usuarios
$query = "SELECT nombre, rol FROM login WHERE id = '1'";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);
//Asignamos a las variables
$nombre = $row['nombre'];
$rol = $row['rol'];

// Query para los datos del Postulante a Evaluar
$result = mysqli_query($mysqli, "SELECT * FROM postulantes WHERE id='$id'");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Prototipo de un Sistema de Evaluación y Selección de Personal Docente" />
        <meta name="author" content="Donato Molina Cruz" />
        <title>Eval CB</title>
        
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

                            <a class="nav-link" href="../pages/inicio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-house-user"></i></div>
                                Inicio
                            </a>

                            <!-- Primera Parte -->
                            <li><hr class="dropdown-divider" /></li>
                            
                            <a class="nav-link" href="../pages/lista.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div>
                                Postulantes
                            </a>

                            <a class="nav-link" href="../pages/registro.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Registro
                            </a>

                            <!-- Segunda Parte -->
                            <li><hr class="dropdown-divider" /></li>
                            <a class="nav-link" href="../pages/eval_comp.php">
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
                                    <a class="nav-link" href="#">Listado </a> 
                                    <a class="nav-link" href="#">Terna </a>    
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
                            <div class="col-xl-2 col-md-3 "></div>
                            
                            <!-- Div central-->
                            <div class="col-xl-8 ">

                                <!-- Inicio del Card-->
                                <div class="card mb-2">
                                    <div class="card-header text-white rotulo">
                                        <i class="fas fa-address-card me-1"></i>
                                        Postulante - Evaluación Competencias Blandas (CB)
                                    </div>

                                    <div class="card-body ">

                                    <!-- Form -->
                                    <form action="evaluar_cb.php" method="POST">                              
                                        <div class="form-row">
                                            
                                        <!-- Parte de los datos del Postulante a ser evaluado-->                                        

                                        <?php while ($row = mysqli_fetch_array($result)) { 
                                            echo"<input type='hidden' name='id' value='{$row['id']}'>"; ?>
                                            
                                            <div class="col col-md-12">
                                                <div class="form-group">
                                                    <label class="bold tam">Postulante ID: <?php echo $row['id']; ?> </label>
                                                        
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="bold tam">Nombres: </label>
                                                        <input type='text' name='nombres' value="<?php echo $row['nombres']; ?>" class='form-control form-control-sm' readonly>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <label class='bold tam'>Ape. Paterno: </label>
                                                        <input type='text' name='ape_paterno' value='<?php echo $row['ape_paterno']; ?>' class='form-control form-control-sm' readonly>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <label class='bold tam'>Ape. Materno: </label>
                                                        <input type='text' name='ape_materno' value='<?php echo $row['ape_materno']; ?>' class='form-control form-control-sm' readonly>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <label class='bold tam'>C.I.: </label>
                                                        <input type='text' name='ci' value='<?php echo $row['ci']; ?>' class='form-control form-control-sm' readonly>
                                                    </div>
                                                </div>
                                                        
                                        <?php } ?>
                                        <hr>
                                            <!-- Inicio de las Variables a ser evaluadas -->

                                        <h6>COMPETENCIAS BLANDAS (Subjetivas) </h6>   

                                        <div class="form-row">
                                            <div class="col col-md-12"> 

                                                <!-- Comunicación -->
                                                <div class="slidecontainer">
                                                <label class="col-form-label bold tam">Comunicación:</label></br>
                                                <p class="tam">Competencia para escuchar y entender al otro, para transmitir en forma clara 
                                                    y oportuna la información requerida por los demás y y para mantener canales de comunicación abiertos 
                                                    y redes contacto formales e informales. </p>
                                                <input type="range" min="1" max="100" value="1" class="slider" name="vcb_com">
                                                <img src="../imagenes/rango.png" width="100%" height="15px">    
                                                <hr>                                            
                                                </div>

                                                <!-- Capacidad de decisión -->
                                                <div class="slidecontainer">
                                                <label class="col-form-label bold tam">Capacidad de decisión:</label>
                                                <p class="tam">Competencia para ser capaz de elegir la mejor opción entre varias para conseguir el objetivo buscado. 
                                                    Pero va más allá de la mera decisión, se trata de decidir de forma sistemática, comprometiéndose 
                                                    y siendo coherentes. </p>
                                                <input type="range" min="1" max="100" value="1" class="slider" name="vcb_cdd">
                                                <img src="../imagenes/rango.png" width="100%" height="15px">
                                                <hr>
                                                </div>

                                                <!-- Iniciativa -->
                                                <div class="slidecontainer">
                                                <label class="col-form-label bold tam">Iniciativa:</label>
                                                <p class="tam">Competencia para actuar proactivamente y pensar en acciones futuras con el propósito 
                                                    de crear oportunidades o evitar problemas que no son evidentes para los demás.</p>
                                                <input type="range" min="1" max="100" value="1" class="slider" name="vcb_ini">
                                                <img src="../imagenes/rango.png" width="100%" height="15px">
                                                <hr>
                                                </div>

                                                <!-- Trabajo en equipo -->
                                                <div class="slidecontainer">
                                                <label class="col-form-label bold tam">Trabajo en equipo:</label>
                                                <p class="tam">Competencia para colaborar con los demás, formar parte de un grupo 
                                                    y trabajar con otras áreas de la institución con el propósito de alcanzar los obejtivos en conjunto.</p>
                                                <input type="range" min="1" max="100" value="1" class="slider" name="vcb_tre">
                                                <img src="../imagenes/rango.png" width="100%" height="15px">
                                                <hr>
                                                </div>

                                                <!-- Integridad -->
                                                <div class="slidecontainer">
                                                <label class="col-form-label bold tam">Integridad:</label>
                                                <p class="tam">Competenia para comportarse de acuerdo con los valores morales, las buenas costumbres 
                                                    y prácticas profesionales, y para actuar con seguridad y congruencia entre el decir y el hacer.</p>
                                                <input type="range" min="1" max="100" value="1" class="slider" name="vcb_inte">
                                                <img src="../imagenes/rango.png" width="100%" height="15px">

                                                </div>

                                            </div>          
                                        </div>


                                        <!-- FINAL DE LA EVALUACIÓN -->
                                        <hr>
                                        <div class="clearfix">

                                            <button type="submit" class="btn btn-success">Evaluar</button>
                                            <button type="reset" class="btn btn-danger">Limpiar</button>
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