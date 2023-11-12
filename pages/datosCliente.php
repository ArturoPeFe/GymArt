<?php
session_start();

if (!isset($_SESSION['user'])) {
    session_destroy();
    header('Location: ../pages/acceso.php');
}

require('../src/php/conexion.php');
require('../src/php/validarSesion.php');

if (isset($_SESSION['user'])) {
    require('../src/php/4pages/obtenerDatosCliente.php');
}
if (isset($_POST['cambiarPass'])) {
    require('../src/php/4pages/cambiarPassCliente.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Datos Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/log.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/datosCliente.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/2eff857ffa.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        function validarPass() {

            let pass1 = document.getElementById('nuevaPass').value;
            let pass2 = document.getElementById('confirmarNuevaPass').value;
            let mensError = document.getElementById('mensError');

            if (pass1 != pass2) {
                mensError.innerHTML = "Las contraseñas no coinciden";
                return false;
            } else {
                return true;
            }
        }
    </script>
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
                    <li><a href="../pages/contacto.php">Contacto</a></li>
                    <li><a class="pagActiva" href="../pages/acceso.php">Acceder</a></li>
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
                            <a class="nav-link text-center" href="../pages/contacto.php">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-center naranja" href="../pages/acceso.php">Acceder</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="img"></div>
    <div id="divDatos">
        <div>
            <h1>Datos Cliente</h1>
            <div id="datos1" class="row justify-content-center">
                <div id="nombre" class="col"><strong>Nombre:&nbsp;</strong><?php echo "{$datos->nombre}"; ?></div>
                <div id="apellidos" class="col"><strong>Apellidos:&nbsp;</strong><?php echo "{$datos->apellido1} {$datos->apellido2}"; ?></div>
            </div>
            <div id="datos2" class="row justify-content-center">
                <div id="dni" class="col"><strong>DNI:&nbsp;</strong><?php echo "{$datos->dni}"; ?></div>
                <div id="email" class="col"><strong>Email:&nbsp;</strong><?php echo " {$datos->email}"; ?></div>
                <div id="telefono" class="col"><strong>Teléfono:&nbsp;</strong><?php echo "{$datos->telefono}"; ?></div>
            </div>
            <div id="datos3" class="row justify-content-center">
                <div id="direccion" class="col"><strong>Dirección:&nbsp;</strong><?php echo "{$datos->direccion}"; ?></div>
            </div>
            <div id="datos4" class="row justify-content-center">
                <div id="suscripcion" class="col"><strong>Estado suscripción:&nbsp;</strong><?php echo "{$datos->suscripcion}"; ?></div>
            </div>

            <div id="acordeon">
                <div class="accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Modificar contraseña
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-center">
                                <form id="modifPass" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validarPass()">
                                    <input hidden id="dniN" name="dniN" value="<?php echo "{$datos->dni}"; ?>">
                                    <div class="mb-2">
                                        <label for="nuevaPass" class="form-label">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="nuevaPass" name="nuevaPass">
                                    </div>
                                    <div class="mb-2">
                                        <label for="confirmarNuevaPass" class="form-label">Confirmar contraseña</label>
                                        <input type="password" class="form-control" id="confirmarNuevaPass" name="confirmarNuevaPass">
                                    </div>
                                    <p id="mensError" style="color: red;"></p>
                                    <button type="submit" class="btn btn-primary" id="cambiarPass" name="cambiarPass">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="divBoton"><button id="boton" onclick="cerrarSesion()"><a href="../src/php/cerrarSesion.php" id="cerrarSesion">Cerrar Sesión</a></button></div>
            <!-- por si haces click en el boton pero fuera del <a> -->
            <script>
                function cerrarSesion() {
                    let a = document.getElementById('cerrarSesion');
                    a.click();
                }
            </script>
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