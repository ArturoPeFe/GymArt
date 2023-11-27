<?php
session_start();
require('../src/php/conexion.php');
require('../src/php/validarSesion.php');

if (isset($_SESSION['userT'])) {
    header('Location: datosClientes.php');
} else {
    if (isset($_POST['dni'])) {
        require('../src/php/4priv/validarTrabajador.php');
    } else {
?>

        <!DOCTYPE html>

        <head>
            <title>Acceso Trabajadores</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../css/all.css">
            <link rel="stylesheet" type="text/css" href="../css/menu.css">
            <link rel="stylesheet" type="text/css" href="../css/trabajadores.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        </head>

        <body>
            <nav id="menuPc">
                <div id="menu">
                    <div id="logo">
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <h2 class="w700">Gym<span class="naranja">Art</span> Trabajadores</h2>
                        </a>
                    </div>
                    <a href="../src/php/cerrarSesion.php" id="salir">Salir</a>
                </div>
            </nav>
            <div id="formAcceso">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">
                        <label for="dni" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="dni" name="dni">
                        <div id="emailHelp" class="form-text">Introduce tu dni</div>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="pass" name="pass">
                    </div>
                    <button type="submit" class="btn btn-primary">Acceder</button>
                </form>
                <?php if (isset($_SESSION['credencialesErroneas']) && $_SESSION['credencialesErroneas'] == True) {
                    echo '<p style="color:red;width:max-content;margin:20px auto;">Credenciales incorrectas.</p>';
                } ?>
            </div>
    <?php }
} ?>
        </body>

        </html>