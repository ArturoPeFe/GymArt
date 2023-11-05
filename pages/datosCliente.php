<?php
session_start();
require('../src/conexion.php');

if (!isset($_SESSION['user'])) {
    session_destroy();
    header('Location: ../pages/acceso.php');
}

// Verificar si la sesión ha expirado
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();
    header('Location: ../pages/acceso.php');
}

if (isset($_SESSION['user'])) {
    $_SESSION['timeout'] = time() + 600;

    $email = $_SESSION['user'];
    $consulta = "SELECT * FROM clientes WHERE email = :email";
    $exec = $bdGym->prepare($consulta);
    $exec->bindParam(':email', $email);

    try {
        $exec->execute();
    } catch (PDOException $e) {
        $error = true;
        $mensaje = $e->getMessage();
        $bdGym = null;
    }

    $datos = $exec->fetch(PDO::FETCH_OBJ);

    if (!isset($_SESSION['nombre'])) {
        $_SESSION['nombre'] = $datos->nombre . ' ' . $datos->apellido1 . ' ' . $datos->apellido2;
    }
}

if (isset($_POST['cambiarPass'])) {
    $dni = $_POST['dniN'];
    $nuevaPass = $_POST['nuevaPass'];
    $confirmarNuevaPass = $_POST['confirmarNuevaPass'];

    if ($nuevaPass == $confirmarNuevaPass) {
        $exec = $bdGym->prepare("CALL ActualizarPass(:dni,:nuevaPass)");
        $exec->bindParam(':dni', $dni);
        $exec->bindParam(':nuevaPass',password_hash($nuevaPass, PASSWORD_DEFAULT));

        try {
            $exec->execute();
        } catch (PDOException $e) {
            $error = true;
            $mensaje = $e->getMessage();
            $bdGym = null;
        }

        if (!$error) {
            $mensaje = 'Contraseña actualizada';
        }
    } else {
        $mensaje = "Las contraseñas no coinciden";
    }
}

?>

<!DOCTYPE html>

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
                                <form id="modifPass" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input hidden id="dniN" name="dniN" value="<?php echo "{$datos->dni}"; ?>">
                                    <div class="mb-2">
                                        <label for="nuevaPass" class="form-label">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="nuevaPass" name="nuevaPass">
                                    </div>
                                    <div class="mb-2">
                                        <label for="confirmarNuevaPass" class="form-label">Confirmar contraseña</label>
                                        <input type="password" class="form-control" id="confirmarNuevaPass" name="confirmarNuevaPass">
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="cambiarPass" name="cambiarPass">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($mensaje)) echo '<p style="text-align: center;color: red;">' . $mensaje . '</p>'; ?>
            <div id="divBoton"><button id="boton" onclick="cerrarSesion()"><a href="../src/cerrarSesion.php" id="cerrarSesion">Cerrar Sesión</a></button></div>
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