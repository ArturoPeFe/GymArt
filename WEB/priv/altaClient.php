<?php
session_start();
require('../src/php/conexion.php');

if (!isset($_SESSION['userT'])) {
    session_destroy();
    header('Location: ../priv/accesoTrabajadores.php');
}

if (isset($_POST['crear'])) {
    require('../src/php/4priv/crearCliente.php');
}
?>
<!DOCTYPE html>

<head>
    <title>Alta Cliente</title>
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
    <!-- Opciones... -->
    <div id="acordeon">
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Alta Cliente
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body text-center">
                        <p><a href="../priv/datosClientes.php">Consulta/Modificación Clientes</a></p>
                        <p><a href="../priv/altaClient.php">Alta Cliente</a></p>
                        <p><a href="../priv/datosTrabajadores.php">Consulta/Modificación Trabajador</a></p>
                        <p><a href="../priv/altaTrab.php">Alta Trabajador</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($mensaje)){echo '<p style="margin-top: 20px;text-align: center;color: green;">'. $mensaje .'</p>';} ?>
    <div class="container" id="formCrear">
        <form id="formModif" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="apellido1" class="form-label">Apellido1</label>
                    <input type="text" class="form-control" id="apellido1" name="apellido1" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="apellido2" class="form-label">Apellido2</label>
                    <input type="text" class="form-control" id="apellido2" name="apellido2" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="emai" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="suscripcion" class="form-label">Suscripción</label>
                    <select class="form-select" id="suscripcion" name="suscripcion" required>
                        <option hidden selected></option>
                        <option value="Activa">Activa</option>
                        <option value="Inactiva">Inactiva</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" id="crear" name="crear">Crear</button>
        </form>
    </div>
</body>

</html>