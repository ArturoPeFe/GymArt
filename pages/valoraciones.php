<?php
session_start();
require('../src/conexion.php');
$_SESSION['credencialesErroneas'] = False;

// Verificar si la sesión ha expirado
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();
    header('Location: ../pages/acceso.php');
}

$_SESSION['timeout'] = time() + 600;

//Obtener datos valoraciones
$consulta = "CALL ObtenerValoraciones";
$exec = $bdGym->prepare($consulta);

try {
    $exec->execute();
} catch (PDOException $e) {
    $error = true;
    $mensaje = $e->getMessage();
    $bdGym = null;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Valoraciones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/valoraciones.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/2eff857ffa.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div id="inicio"></div>
    <!-- Menú de pc... -->
    <nav id="menuPc">
        <div id="menu">
            <div id="logo">
                <a href="./">
                    <h2 class="w700">Gym<span class="naranja">Art</span></h2>
                </a>
            </div>
            <div id="opcionesMenu">
                <ul>
                    <li><a href="../#inicio">Inicio </a> </li>
                    <li><a href="../#precios">Precios</a></li>
                    <li><a class="pagActiva" href="../pages/valoraciones.php">Valoraciones</a></li>
                    <li><a href="../pages/miembros.php">Miembros</a></li>
                    <li><a href="../pages/contacto.php">Contacto</a></li>
                    <li><a href="../pages/acceso.php">Acceder</a></li>
                </ul>
            </div>
            <div id="acceso">
                <a href="./pages/acceso.php" class="naranja">
                    <h5><i class="bi bi-person-circle"></i></h5>&nbsp
                    <p>
                        <?php
                        if (isset($_SESSION['nombre']))  echo $_SESSION['nombre'];
                        else echo 'Inicia Sesión';
                        ?>
                    </p>
                </a>
            </div>
        </div>
    </nav>
    <!-- Menú de móvil -->
    <nav id="menuMovil" class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand w700" href="./">Gym<span class="naranja">Art</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                        <a href="./pages/acceso.php"><i class="bi bi-person-circle"></i>
                            <?php
                            if (isset($_SESSION['nombre']))  echo $_SESSION['nombre'];
                            else echo 'Inicia Sesión';
                            ?>
                        </a>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close" id="cerrarMenu"></button>
                </div>
                <div class="offcanvas-body" id="opMM">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link text-center" href="../#inicio" id="bInicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="../#precios" id="bPrecios">Precios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center naranja" href="../pages/valoraciones.php" id="bValoraciones">Valoraciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="../pages/miembros.php">Miembros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="../pages/contacto.php">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="../pages/acceso.php">Acceder</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="fondo"></div>
    <div id="mensPrincipal">
        <div>
            <h1>Valoraciones de nuestros clientes</h1>
        </div>
    </div>

    <div id="valoraciones-container">
        <!-- Aquí se mostrarán las valoraciones cargadas dinámicamente -->
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Enlaces de paginación Bootstrap -->
        </ul>
    </nav>

    <script>
        $(document).ready(function() {
            // Función para cargar valoraciones de una página específica
            function cargarValoraciones(pagina) {
                $.ajax({
                    url: 'cargar_valoraciones.php', // Ruta a un archivo PHP que recupera las valoraciones de la base de datos
                    type: 'POST',
                    data: {
                        page: pagina
                    }, // Envía el número de página a través de POST
                    success: function(data) {
                        $('#valoraciones-container').html(data);
                    }
                });
            }

            // Inicialmente, cargar la primera página de valoraciones
            cargarValoraciones(1);

            // Manejo de la paginación: escucha los clics en los enlaces de paginación
            $('ul.pagination').on('click', 'a.page-link', function(e) {
                e.preventDefault();
                var pagina = $(this).text(); // Obtiene el número de página desde el enlace
                cargarValoraciones(pagina);
            });
        });
    </script>

</body>

</html>