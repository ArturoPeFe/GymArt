<?php
$dni = $_POST['dni'];

$exec = $bdGym->prepare("CALL BorrarCliente(:dni)");

$exec->bindParam(':dni', $dni);

try {
    $exec->execute();
} catch (PDOException $e) {
    $error = true;
    $mensaje = $e->getMessage();
    $bdGym = null;
}

if (!$error) {
    $mensaje = 'Cliente borrado con éxito';
}
