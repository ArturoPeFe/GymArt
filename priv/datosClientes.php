<?php
session_start();
require('../src/conexion.php');

if(!isset($_SESSION['userT'])){
    session_destroy();
    header('Location: ../priv/accesoTrabajadores.php');
}

if (isset($_POST['modificar'])) {
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $dni = $_POST['dni'];
    $email = $_POST['emailN'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $suscripcion = $_POST['suscripcion'];

    $update = "UPDATE clientes SET nombre=:nom,apellido1=:ap1,apellido2=:ap2,email=:email,`telefono`=:tel,direccion=:direccion,`suscripcion`=:suscripcion WHERE dni=:dni";
    $exec = $bdGym->prepare($update);
    $exec->bindParam(':dni', $dni);
    $exec->bindParam(':nom', $nombre);
    $exec->bindParam(':ap1', $apellido1);
    $exec->bindParam(':ap2', $apellido2);
    $exec->bindParam(':email', $email);
    $exec->bindParam(':tel', $telefono);
    $exec->bindParam(':direccion', $direccion);
    $exec->bindParam(':suscripcion', $suscripcion);

    try {
        $exec->execute();
    } catch (PDOException $e) {
        $error = true;
        $mensaje = $e->getMessage();
        $bdGym = null;
    }

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
            <a href="../src/cerrarSesion.php" id="salir">Salir</a>
        </div>
    </nav>
    <!-- Opciones... -->
    <div id="acordeon">
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Consulta/Modificación Clientes
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
    <!-- Datos búsqueda -->
    <div id="formBusqueda">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <select class="form-select" id="opcion" name="opcion">
                    <option selected disabled>Tipo de búsqueda</option>
                    <option value="dni">DNI</option>
                    <option value="email">Email</option>
                </select><br>
                <input type="text" class="form-control" id="datoEntrada" name="datoEntrada" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" id="buscar" name="buscar">Buscar</button>
            <button type="clear" class="btn btn-primary" id="limpiar" name="limpiar">Limpiar</button>
        </form>
    </div>
    <!-- Mostrar datos -->
    <div id="datos">
        <?php
        if (isset($_POST['modificar'])) {echo '<p style="margin-top: 20px;text-align: center;">Usuario actualizado</p>';}
        if (isset($_POST['buscar'])) {
            if (!isset($_POST['opcion'])) {
                echo '<p style="margin-top: 20px;text-align: center;color: red;">No has seleccionado tipo de búsqueda</p>';
            } elseif (isset($_POST['opcion']) && $_POST['datoEntrada'] == '') {
                echo '<p style="margin-top: 20px;text-align: center;color: red;">El valor introducido no es correcto</p>';
            } else {
                if ($_POST['opcion'] == 'dni') {
                    $dni = $_POST['datoEntrada'];
                    $consulta = "SELECT * FROM clientes WHERE dni = :dni";
                    $exec = $bdGym->prepare($consulta);
                    $exec->bindParam(':dni', $dni);

                    try {
                        $exec->execute();
                    } catch (PDOException $e) {
                        $error = true;
                        $mensaje = $e->getMessage();
                        $bdGym = null;
                    }

                    $datos = $exec->fetch(PDO::FETCH_OBJ);
                } elseif ($_POST['opcion'] == 'email') {
                    $email = $_POST['datoEntrada'];
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
                }
                if (!$datos) {
                    echo '<p style="margin-top: 20px;text-align: center; color: red;">El usuario no existe</p>';
                }

                if ($datos) {
        ?>
                    <hr>
                    <div class="container">
                        <form id="formModif" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos->nombre ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="apellido1" class="form-label">Apellido1</label>
                                    <input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo $datos->apellido1 ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="apellido2" class="form-label">Apellido2</label>
                                    <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $datos->apellido2 ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="dni" class="form-label">Dni</label>
                                    <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $datos->dni ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="emailN" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="emailN" name="emailN" value="<?php echo $datos->email ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $datos->telefono ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $datos->direccion ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="suscripcion" class="form-label">Suscripción</label>
                                    <select class="form-select" id="suscripcion" name="suscripcion">
                                        <option hidden selected><?php echo $datos->suscripcion ?></option>
                                        <option value="Activa">Activa</option>
                                        <option value="Inactiva">Inactiva</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger" id="modificar" name="modificar">Modificar</button>
                        </form>
                    </div>
        <?php }
            }
        } ?>
    </div>
</body>

</html>