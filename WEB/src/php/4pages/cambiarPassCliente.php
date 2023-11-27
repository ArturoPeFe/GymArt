<?php

$dni = $_POST['dniN'];
$nuevaPass = $_POST['nuevaPass'];
$confirmarNuevaPass = $_POST['confirmarNuevaPass'];

if ($nuevaPass == $confirmarNuevaPass) {
    $exec = $bdGym->prepare("CALL ActualizarPass(:dni,:nuevaPass)");
    $exec->bindParam(':dni', $dni);
    $exec->bindParam(':nuevaPass', password_hash($nuevaPass, PASSWORD_DEFAULT));

    try {
        $exec->execute();
    } catch (PDOException $e) {
        $error = true;
        $mensaje = $e->getMessage();
        $bdGym = null;
    }
}