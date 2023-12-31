<?php
session_start();
require('../src/php/validarSesion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Contacto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/contacto.css">
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
                    <li><a href="../pages/valoraciones.php">Valoraciones</a></li>
                    <li><a href="../pages/miembros.php">Miembros</a></li>
                    <li><a class="pagActiva" href="../pages/contacto.php">Contacto</a></li>
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
                            <a class="nav-link text-center" href="../pages/valoraciones.php">Valoraciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="../pages/miembros.php">Miembros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center naranja" href="../pages/contacto.php">Contacto</a>
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
            <h1>Contacta con Nosotros</h1>
        </div>
    </div>

    <div id="cuerpo">
        <h1>Ourense</h1>
        <div id="espaciador">
            <hr class="naranja border-3 opacity-75">
        </div>
        <p>Estamos ubicados en el centro de la ciudad y es fácil llegar con cualquier tipo de transporte público.</p>
        <p>Calle de la calle, 22 - 32003 Ourense</p>
        <p>Teléfono: 988 123 456</p>
        <p>Correo: info@ejemplocorreo.com</p>
    </div>

    <div id="mapa">
        <iframe title="mapa del sitio" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11798.175935803689!2d-7.8744937!3d42.3309242!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2ff932917ad993%3A0x5143d80e114ada98!2sC.I.F.P%20A%20Carballeira!5e0!3m2!1ses!2ses!4v1698603128050!5m2!1ses!2ses" width="900" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <footer id="footerDatos">
        <div id="redes">
            <a title="instagram" href="https://www.instagram.com/"><i class="fa-brands fa-square-instagram fa-2xl"></i></a>
            <a title="facebook" href="https://www.facebook.com/"><i class="fa-brands fa-square-facebook fa-2xl"></i></a>
            <a title="twitter" href="https://twitter.com/"><i class="fa-brands fa-square-x-twitter fa-2xl"></i></a>
        </div>
        <div id="infoFooter">
            <h3>GymArt</h3>
            <p>988 123 456</p>
            <p>info@ejemplocorreo.com</p>
            <p>Calle de la calle, 22 - 32003 Ourense</p>
            <p><a>Aviso Legal</a></p>
            <a href="../priv/accesoTrabajadores.php">Acceso Trabajadores</a>
        </div>
    </footer>
</body>

</html>