<?php
session_start();
require('../pages/conexion.php');

if(!isset($_SESSION['user'])){
    session_destroy();
    header('Location: ../priv/accesoTrabajadores.php');
}
?>
<!DOCTYPE html>

<head>
    <title>Trabajadores</title>
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
            <a href="../pages/cerrarSesion.php" id="salir">Salir</a>
        </div>
    </nav>
    <!-- Opciones... -->
    <div id="acordeon">
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Alta usuarios
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body text-center">
                        <p><a href="../priv/datosClientes.php">Consulta/Modificación Clientes</a></p>
                        <p><a href="../priv/datosTrabajadores.php">Consulta/Modificación Trabajador</a></p>
                        <p><a href="../priv/altas.php">Alta usuarios</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>