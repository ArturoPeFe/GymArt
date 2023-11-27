<?php
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$puesto = $_POST['puesto'];
$descripcion = $_POST['descripcion'];

$exec = $bdGym->prepare("CALL InsertarTrabajador(:dni,:nom,:ap1,:ap2,:email, :puesto, :descripcion,:pass)");

$exec->bindParam(':dni', $dni);
$exec->bindParam(':nom', $nombre);
$exec->bindParam(':ap1', $apellido1);
$exec->bindParam(':ap2', $apellido2);
$exec->bindParam(':email', $email);
$exec->bindParam(':puesto', $puesto);
$exec->bindParam(':descripcion', $descripcion);
$exec->bindParam(':pass', password_hash($dni, PASSWORD_DEFAULT));

try {
    $exec->execute();
} catch (PDOException $e) {
    $error = true;
    $mensaje = $e->getMessage();
    $bdGym = null;
}

if (!$error) {
    $mensaje = 'Trabajador registrado con éxito';
}