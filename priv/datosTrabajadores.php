<?php
session_start();
require('../src/conexion.php');

if (!isset($_SESSION['userT'])) {
    session_destroy();
    header('Location: ../priv/accesoTrabajadores.php');
}

if (isset($_POST['borrar'])) {
    $dni = $_POST['dni'];

    $exec = $bdGym->prepare("CALL BorrarTrabajador(:dni)");

    $exec->bindParam(':dni', $dni);

    try {
        $exec->execute();
    } catch (PDOException $e) {
        $error = true;
        $mensaje = $e->getMessage();
        $bdGym = null;
    }

    if (!$error) {
        $mensaje = 'Trabajador borrado con éxito';
    }
}

if (isset($_POST['modificar'])) {
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $dni = $_POST['dni'];
    $email = $_POST['emailN'];

    $exec = $bdGym->prepare("CALL UpdateTrabajador(:dni,:nom,:ap1,:ap2,:email)");
    $exec->bindParam(':dni', $dni);
    $exec->bindParam(':nom', $nombre);
    $exec->bindParam(':ap1', $apellido1);
    $exec->bindParam(':ap2', $apellido2);
    $exec->bindParam(':email', $email);
    try {
        $exec->execute();
    } catch (PDOException $e) {
        $error = true;
        $mensaje = $e->getMessage();
        $bdGym = null;
    }

    if (!$error) {
        $mensaje = 'Usuario actualizado';
    }
}
?>
<!DOCTYPE html>

<head>
    <title>Datos Trabajadores</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/trabajadores.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                        Consulta/Modificación Trabajadores
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
        if (isset($mensaje)) {
            echo '<p style="margin-top: 20px;text-align: center;color: green;">' . $mensaje . '</p>';
            unset($mensaje);
        }
        if (isset($_POST['buscar'])) {
            if (!isset($_POST['opcion'])) {
                echo '<p style="margin-top: 20px;text-align: center;color: red;">No has seleccionado tipo de búsqueda</p>';
            } elseif (isset($_POST['opcion']) && $_POST['datoEntrada'] == '') {
                echo '<p style="margin-top: 20px;text-align: center;color: red;">El valor introducido no es correcto</p>';
            } else {
                if ($_POST['opcion'] == 'dni') {
                    $dni = $_POST['datoEntrada'];
                    $consulta = "SELECT * FROM trabajadores WHERE dni = :dni";
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
                    $consulta = "SELECT * FROM trabajadores WHERE email = :email";
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
                                <div class="col-md-6 mb-3">
                                    <label for="dni" class="form-label">Dni</label>
                                    <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $datos->dni ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="emailN" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="emailN" name="emailN" value="<?php echo $datos->email ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="descripcion" class="form-label">Descripción Puesto:</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" style="height: 150px;"><?php echo $datos->descripcion_puesto ?></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">Modificar</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">Borrar</button>

                            <button type="submit" id="modificar" name="modificar" hidden></button>
                            <button type="submit" id="borrar" name="borrar" hidden></button>
                        </form>
                    </div>

                    <!-- Modal de confirmar modificar -->
                    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title " id="modalLabel">¿Confirmar los cambios?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" name="confirmarModificar" id="confirmarModificar">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de confirmar borrar -->
                    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title " id="modalLabel">¿Seguro que quiere eliminar el usuario?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" name="confirmarBorrar" id="confirmarBorrar">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Script para confirmar envío formulario con modal -->
                    <script>
                        document.getElementById("confirmarModificar").addEventListener("click", function() {
                            document.getElementById("modificar").click();
                        });

                        document.getElementById("confirmarBorrar").addEventListener("click", function() {
                            document.getElementById("borrar").click();
                        });
                    </script>

        <?php }
            }
        } ?>
    </div>
</body>

</html>