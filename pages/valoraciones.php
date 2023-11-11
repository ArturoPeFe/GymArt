<?php
session_start();
require('../src/php/conexion.php');
$_SESSION['credencialesErroneas'] = False;
require('../src/php/validarSesion.php');
require('../src/php/4pages/paginarValoraciones.php');

if (isset($_POST['valorar']) && !isset($_SESSION['user'])) {
    header('Location: ../pages/acceso.php');
} else if (isset($_POST['valorar']) && isset($_SESSION['user'])) {
    require('../src/php/4pages/hacerValoracion.php');
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="inicio"></div>
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
                    <li><a class="pagActiva" href="../pages/valoraciones.php">Valoraciones</a></li>
                    <li><a href="../pages/miembros.php">Miembros</a></li>
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

    <div id="mensaje"><?php if (isset($mensaje)) echo '<p style="text-align: center;color: red; margin-top: 20px">' . $mensaje . '</p>'; ?></div>

    <div id="valoraciones">
        <?php
        $i = True;
        while ($i == True) {
            if ($datos = $exec->fetch(PDO::FETCH_OBJ)) {
        ?>
                <div class="card mb-3" style="margin: 40px 0px;">
                    <div class="row g-0">
                        <div class="col">
                            <h3 class="card-header w700"><?php echo $datos->nombre ?></h3>
                            <div class="card-body">
                                <p class="card-text"><?php echo $datos->comentario ?></p>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            } else $i = False;
        } ?>
        <div id="paginacion">
            <?php
            // Muestra controles de paginación
            $totalValoraciones = 5;
            $totalPaginas = ceil($totalValoraciones / $valoracionesPorPagina);

            if (isset($mensaje)) {
                echo "<a style='min-width:35px; margin:0px 5px;' class='btn btn-secondary' href='../pages/valoraciones.php'><span>Ver valoraciones</span></a>";
            } else {
                for ($i = 1; $i <= $totalPaginas; $i++) {
                    echo "<a style='min-width:35px; border-radius:20px; margin:0px 5px;' class='btn btn-secondary' href='?pagina=" . $i . "'><span>" . $i . "</span></a>";
                }
            }
            ?>
        </div>
    </div>

    <hr>
    <div id="tuValoracion">
        <p class="d-inline-flex gap-1">
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#formValoracion" aria-expanded="false" aria-controls="formValoracion">
                Haz tu valoración
            </button>
        </p>
        <div class="collapse" id="formValoracion">
            <p>*Debes haber iniciado sesión para valorar</p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-3">
                    <textarea style="height: 100px;" type="text" class="form-control" id="valoracion" name="valoracion" aria-describedby="aviso"></textarea>
                    <div id="aviso" class="form-text">Si ya has valorado antes, se actualizará dicha valoración</div>
                </div>
                <button type="submit" class="btn btn-primary" id="valorar" name="valorar">Valorar</button>
                <a hidden href="?pagina=1"></a>
            </form><br>
        </div>
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