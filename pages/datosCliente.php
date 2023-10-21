<?php
session_start();
require('./conexion.php');

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

?>

<!DOCTYPE html>

<head>
    <title>Gimnasio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/log.css">

    <link rel="stylesheet" type="text/css" href="../css/datosCliente.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav id="navbar">
        <div id="menu">
            <div id="logo">
                <a href="../index.php">
                    <h2>Gym<span class="naranja">Art</span></h2>
                </a>
            </div>
            <div id="opcionesMenu">
                <ul>
                    <li><a href="/Proyecto/index.php">Inicio </a> </li>
                    <li><a href="#">Galería</a></li>
                    <li><a href="#">Valoraciones</a></li>
                    <li><a href="#">Miembros</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="./acceso.php" class="naranja">Clientes</a></li>
                </ul>
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
                <div id="email" class="col"><strong>Email:&nbsp;</strong><?php echo "{$datos->email}"; ?></div>
                <div id="telefono" class="col"><strong>Teléfono:&nbsp;</strong><?php echo "{$datos->telefono}"; ?></div>
            </div>
            <div id="datos3" class="row justify-content-center">
                <div id="direccion" class="col"><strong>Dirección:&nbsp;</strong><?php echo "{$datos->direccion}"; ?></div>
            </div>
            <div id="datos4" class="row justify-content-center">
                <div id="suscripcion" class="col"><strong>Estado suscripción:&nbsp;</strong><?php echo "{$datos->suscripcion}"; ?></div>
            </div>
            <div id="boton"><button type="submit"><a href="cerrarSesion.php">Cerrar Sesión</a></button></div>
        </div>
    </div>
</body>

</html>