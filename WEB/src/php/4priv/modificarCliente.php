<?php
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$dni = $_POST['dni'];
$email = $_POST['emailN'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$suscripcion = $_POST['suscripcion'];


$exec = $bdGym->prepare("CALL UpdateCliente(:dni,:nom,:ap1,:ap2,:email,:tel,:direccion,:suscripcion)");
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

if (!$error) {
    $mensaje = 'Usuario actualizado';
}
