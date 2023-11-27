<?php
$consulta = "SELECT * FROM trabajadores";
$exec = $bdGym->prepare($consulta);

try {
    $exec->execute();
} catch (PDOException $e) {
    $error = true;
    $mensaje = $e->getMessage();
    $bdGym = null;
}