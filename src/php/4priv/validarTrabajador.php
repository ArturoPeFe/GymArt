<?php
$dni = $_POST['dni'];
$pass = $_POST['pass'];

$consulta = "SELECT pass FROM contrasenas WHERE id_contrasena = (SELECT id_contrasena FROM trabajadores WHERE dni = :dni)";
$exec = $bdGym->prepare($consulta);
$exec->bindParam(':dni', $dni);

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
    $_SESSION['userT'] = $dni;
    header('Location: datosClientes.php');
} else {
    $_SESSION['credencialesErroneas'] = True;
    header('Location: accesoTrabajadores.php');
}
