<?php
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$suscripcion = $_POST['suscripcion'];

$exec = $bdGym->prepare("CALL InsertarCliente(:dni,:nom,:ap1,:ap2,:email,:tel,:direccion,:suscripcion,:pass)");

$exec->bindParam(':dni', $dni);
$exec->bindParam(':nom', $nombre);
$exec->bindParam(':ap1', $apellido1);
$exec->bindParam(':ap2', $apellido2);
$exec->bindParam(':email', $email);
$exec->bindParam(':tel', $telefono);
$exec->bindParam(':direccion', $direccion);
$exec->bindParam(':suscripcion', $suscripcion);
$exec->bindParam(':pass', password_hash($dni, PASSWORD_DEFAULT));

try {
    $exec->execute();
} catch (PDOException $e) {
    $error = true;
    $mensaje = $e->getMessage();
    $bdGym = null;
}

if (!$error) {
    $mensaje = 'Cliente registrado con éxito';
}
