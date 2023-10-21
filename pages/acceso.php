<?php
session_start();
require('./conexion.php');

if ($_SESSION['user']) {
  header('Location: datosCliente.php');
} else {
  if (isset($_POST['user'])) {
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

    if ($passObtenida->pass == $pass) {
      $_SESSION['user'] = $email;
      header('Location: datosCliente.php');
    }
  } else {
?>

    <!DOCTYPE html>

    <head>
      <title>Gimnasio</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../css/all.css">
      <link rel="stylesheet" type="text/css" href="../css/menu.css">
      <link rel="stylesheet" type="text/css" href="../css/log.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
      <nav id="navbar">
        <div id="menu">
          <div id="logo">
            <a href="../index.php">
              <h2>Gym<span class="naranja">Art</span></h2>
            </a>
          </div>
          <div id="opcionesMenu">
            <ul>
              <li><a href="/Proyecto/index.php">Inicio </a> </li>
              <li><a href="#">Galería</a></li>
              <li><a href="#">Valoraciones</a></li>
              <li><a href="#">Miembros</a></li>
              <li><a href="#">Contacto</a></li>
              <li><a href="./acceso.php" class="naranja">Clientes</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div id="img"></div>
      <div id="formAcceso">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <fieldset>
            <label for="user">Email:</label><br>
            <div class="input-group mb-3">
              <input id="user" name="user" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <label for="pass">Contraseña:</label><br>
            <div class="input-group mb-3">
              <input id="pass" name="pass" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
          </fieldset>
          <div id="boton"><button type="submit" class="btn btn-primary">Acceder</button></div>
        </form>
      </div>
  <?php }
} ?>
    </body>

    </html>