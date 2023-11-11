<?php

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
