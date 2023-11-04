<?php
session_start();
require('../src/conexion.php');

// Verificar si la sesión ha expirado
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();
    header('Location: ../pages/acceso.php');
}

$_SESSION['timeout'] = time() + 600;

$consulta = "SELECT * FROM trabajadores";
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
<html>

<head>
    <title>Contacto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/miembros.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/2eff857ffa.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Menú de pc... -->
    <nav id="menuPc">
        <div id="menu">
            <div id="logo">
                <a href="../">
                    <h2 class="w700">Gym<span class="naranja">Art</span></h2>
                </a>
            </div>
            <div id="opcionesMenu">
                <ul>
                    <li><a href="../">Inicio </a> </li>
                    <li><a href="../#precios">Precios</a></li>
                    <li><a href="#">Valoraciones</a></li>
                    <li><a class="pagActiva" href="../pages/miembros.php">Miembros</a></li>
                    <li><a href="../pages/contacto.php">Contacto</a></li>
                    <li><a href="../pages/acceso.php">Acceder</a></li>
                </ul>
            </div>
            <div id="acceso">
                <a href="../pages/acceso.php" class="naranja">
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
            <a class="navbar-brand w700" href="../">Gym<span class="naranja">Art</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                        <a href="../pages/acceso.php"><i class="bi bi-person-circle"></i>
                            <?php
                            if (isset($_SESSION['nombre']))  echo $_SESSION['nombre'];
                            else echo 'Inicia Sesión';
                            ?>
                        </a>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link text-center" aria-current="page" href="../">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="../#precios">Precios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="#">Valoraciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center naranja" href="../pages/miembros.php">Miembros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="../pages/contacto.php">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-center" href="../pages/acceso.php">Acceder</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="fondo"></div>
    <div id="mensPrincipal">
        <div>
            <h1>Nuestro Equipo</h1>
        </div>
    </div>

    <div id="miembros">
        <?php
        $i = True;
        while ($i == True) {
            if ($datos = $exec->fetch(PDO::FETCH_OBJ)) {
        ?>
                <div class="card" style="margin: 40px 0px;">
                    <h3 class="card-header w700"><?php echo $datos->nombre . ' ' . $datos->apellido1 ?></h3>
                    <div class="card-body">
                        <h5 class="card-title naranja"><?php echo $datos->puesto ?></h5>
                        <p class="card-text"><?php echo $datos->descripcion_puesto ?></p>
                    </div>
                </div>
        <?php
            } else $i = False;
        } ?>

    </div>

    <footer id="footerDatos">
        <div id="redes">
            <a href="#"><i class="fa-brands fa-square-instagram fa-2xl"></i></a>
            <a href="#"><i class="fa-brands fa-square-facebook fa-2xl"></i></a>
            <a href="#"><i class="fa-brands fa-square-x-twitter fa-2xl"></i></a>
        </div>
        <div id="infoFooter">
            <h3>GymArt</h3>
            <p>988 123 456</p>
            <p>info@ejemplocorreo.com</p>
            <p>Calle de la calle, 22 - 32003 Ourense</p>
            <p><a href="#">Aviso Legal</a></p>
            <a href="../priv/accesoTrabajadores.php">Acceso Trabajadores</a>
        </div>
    </footer>
</body>

</html>