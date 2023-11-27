<?php

$cliente = $_SESSION['idCl'];
$comentario =  $_POST['valoracion'];

$exec = $bdGym->prepare("SELECT * FROM valoraciones WHERE id_cliente=:id");
$exec->bindParam(':id', $cliente);

try {
    $exec->execute();
} catch (PDOException $e) {
    $error = true;
    $mensaje = $e->getMessage();
    $bdGym = null;
}
$datos = $exec->fetch(PDO::FETCH_OBJ);

if ($datos == null) {

    $exec = $bdGym->prepare("INSERT INTO valoraciones (id_cliente, comentario) VALUES (:id, :comentario)");
    $exec->bindParam(':id', $cliente);
    $exec->bindParam(':comentario', $comentario);

    try {
        $exec->execute();
    } catch (PDOException $e) {
        $error = true;
        $mensaje = $e->getMessage();
        $bdGym = null;
    }

    if (!$error) {
        $mensaje = 'Valoracion añadida con éxito';
    }

} else {
    $exec = $bdGym->prepare("UPDATE valoraciones SET comentario = :comentario WHERE id_cliente = :id");
    $exec->bindParam(':id', $cliente);
    $exec->bindParam(':comentario', $comentario);

    try {
        $exec->execute();
    } catch (PDOException $e) {
        $error = true;
        $mensaje = $e->getMessage();
        $bdGym = null;
    }

    if (!$error) {
        $mensaje = 'Valoracion modificada con éxito';
    }
}
