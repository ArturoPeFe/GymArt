<?php

$email = $_POST['user'];
$pass = $_POST['pass'];

$consulta = "SELECT pass FROM contrasenas WHERE id_contrasena = (SELECT id_contrasena FROM clientes WHERE email = :email)";
$exec = $bdGym->prepare($consulta);
$exec->bindParam(':email', $email);

try {
    $exec->execute();
} catch (PDOException $e) {
    $error = true;
    $mensaje = $e->getMessage();
    $bdGym = null;
}

$passObtenida = $exec->fetch(PDO::FETCH_OBJ);

// Configuración del tiempo de vida de la sesión en segundos
$_SESSION['timeout'] = time() + 600;

if (password_verify($pass, $passObtenida->pass)) {
    if (isset($_SESSION['credencialesErroneas']) && $_SESSION['credencialesErroneas'] == True) $_SESSION['credencialesErroneas'] = False;
    $_SESSION['user'] = $email;
    header('Location: datosCliente.php');
} else {
    $_SESSION['credencialesErroneas'] = True;
    header('Location: acceso.php');
}
