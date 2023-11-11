<?php
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
