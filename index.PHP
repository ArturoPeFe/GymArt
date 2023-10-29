<?php session_start();
$_SESSION['credencialesErroneas'] = False
?>
<!DOCTYPE html>

<head>
  <title>GymArt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/all.css">
  <link rel="stylesheet" type="text/css" href="./css/menu.css">
  <link rel="stylesheet" type="text/css" href="./css/fondoIndex.css">
  <link rel="stylesheet" type="text/css" href="./css/mensBienvenidoIndex.css">
  <link rel="stylesheet" type="text/css" href="./css/cardsYcarrusel.css">
  <link rel="stylesheet" type="text/css" href="./css/precios.css">
  <link rel="stylesheet" type="text/css" href="./css/footer.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/2eff857ffa.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</head>

<body>
  <div id="fondo"></div>
  <!-- Menú de pc... -->
  <nav id="menuPc">
    <div id="menu">
      <div id="logo">
        <a href="./">
          <h2 class="w700">Gym<span class="naranja">Art</span></h2>
        </a>
      </div>
      <div id="opcionesMenu">
        <ul>
          <li><a class="pagActiva" href="./">Inicio </a> </li>
          <li><a href="#">Galería</a></li>
          <li><a href="#">Valoraciones</a></li>
          <li><a href="#">Miembros</a></li>
          <li><a href="./pages/contacto.php">Contacto</a></li>
          <li><a href="./pages/acceso.php">Acceder</a></li>
        </ul>
      </div>
      <div id="acceso">
        <a href="./pages/acceso.php" class="naranja">
          <h5><i class="bi bi-person-circle"></i></h5>&nbsp
          <p>
            <?php
            if (isset($_SESSION['nombre']))  echo $_SESSION['nombre'];
            else echo 'Inicia Sesión';
            ?>
          </p>
        </a>
      </div>
    </div>
  </nav>
  <!-- Menú de móvil -->
  <nav id="menuMovil" class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand w700" href="./">Gym<span class="naranja">Art</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
            <a href="./pages/acceso.php"><i class="bi bi-person-circle"></i>
              <?php
              if (isset($_SESSION['nombre']))  echo $_SESSION['nombre'];
              else echo 'Inicia Sesión';
              ?>
            </a>
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active text-center naranja" aria-current="page" href="./">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="#">Galería</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="#">Valoraciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="#">Miembros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="./pages/contacto.php">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-center" href="./pages/acceso.php">Acceder</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div id="mensPrincipal">
    <div>
      <h1>El camino hacia el éxito siempre está en construcción</h1>
    </div>
    <button>Únete a nosotros</button>
  </div>
  <div id="bienvenido">
    <h1>Bienvenido</h1>
    <div id="espaciador">
      <hr class="naranja border-3 opacity-75">
    </div>
    <p>
      ¡Bienvenidos al sitio web de GymArt! Esperamos que aprecie nuestros servicios y oportunidades que ofrecemos a nuestros clientes leales y potenciales.
      Éstos son algunos de ellos:
    </p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100 ">
          <h1 class="mTop"><i class="bi bi-people-fill"></i></h1>
          <div class="card-body">
            <h4 class="card-title naranja w700">Entrenadores calificados</h4>
            <p class="card-text">Nuestros entrenadores tienen años de experiencia en diversos tipos de fitness y deportes.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 ">
          <h1 class="mTop"><i class="bi bi-hand-thumbs-up-fill"></i></h1>
          <div class="card-body">
            <h4 class="card-title naranja w700">Enfoque individual</h4>
            <p class="card-text">Cada cliente de Intense tiene un programa personalizado de entrenamiento y nutrición.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 ">
          <h1 class="mTop"><i class="fa-solid fa-dumbbell"></i></h1>
          <div class="card-body">
            <h4 class="card-title naranja w700">Equipo de fitness moderno</h4>
            <p class="card-text">Cooperamos con los principales proveedores de equipos de fitness para brindarle resultados superiores.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="tamCarrusel">
    <div id="carrusel" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carrusel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carrusel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carrusel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row row-cols-1 row-cols-md-2">
            <div class="col sinSep">
              <img src="./assets/img/bg/gallery-04.jpg" class="d-block w-100" alt="Imagen 1">
              <div class="carousel-caption">
                <p>FITNESS</p>
              </div>
            </div>
            <div class="col sinSep sHidden1">
              <img src="./assets/img/bg/gallery-03.jpg" class="d-block w-100" alt="Imagen 2">
              <div class="carousel-caption">
                <p>FITNESS</p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row row-cols-1 row-cols-md-2">
            <div class="col sinSep">
              <img src="./assets/img/bg/gallery-01.jpg" class="d-block w-100 opacidad" alt="Imagen 1">
              <div class="carousel-caption">
                <p>BODYBUILDING</p>
              </div>
            </div>
            <div class="col sinSep sHidden1">
              <img src="./assets/img/bg/gallery-06.jpg" class="d-block w-100" alt="Imagen 2">
              <div class="carousel-caption">
                <p>BODYBUILDING</p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row row-cols-1 row-cols-md-2">
            <div class="col sinSep">
              <img src="./assets/img/bg/gallery-05.jpg" class="d-block w-100" alt="Imagen 1">
              <div class="carousel-caption">
                <p>CROSSFIT</p>
              </div>
            </div>
            <div class="col sinSep sHidden1">
              <img src="./assets/img/bg/gallery-02.jpg" class="d-block w-100" alt="Imagen 2">
              <div class="carousel-caption">
                <p>CROSSFIT</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carrusel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carrusel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div id="precios">
    <h2>Precios</h2>
    <div id="espaciador">
      <hr class="naranja border-3 opacity-75">
    </div>
    <p>Disponemos de varios precios mensuales, según opciones.<br>* Consultar ofertas promocionales.</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100 ">
          <div class="card-header">
            <h4 class="card-title naranja w700">Estándar 35€/mes</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Todas nuestras instalaciones, tu programa de entrenamiento periódico y el mejor equipo a tu disposición los 365 días del año por tan solo 35,00 euros al mes.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 ">
          <div class="card-header">
            <h4 class="card-title naranja w700">Premium 45€/mes</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Todos los servicios y nuestras actividades en una tarifa única. Disfruta por 45,00 euros mensuales de todas las instalaciones y nuestro entrenamiento en grupo.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 ">
          <div class="card-header">
            <h4 class="card-title naranja w700">PremiumPlus 65€/mes</h4>
          </div>
          <div class="card-body">
            <p class="card-text">El entrenamiento TOTAL por 65,00 euros mensuales. Incorpora a nuestra tarifa Premium una completa sesión al mes de una hora con nuestros GymArt Trainers.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div id="redes">
      <a href="#"><i class="fa-brands fa-square-instagram fa-2xl"></i></a>
      <a href="#"><i class="fa-brands fa-square-facebook fa-2xl"></i></a>
      <a href="#"><i class="fa-brands fa-square-x-twitter fa-2xl"></i></a>
    </div>
    <div id="infoFooter">
      <h3>GymArt</h3>
      <p>988 123 456</p>
      <p>info@ejemplocorreo.com</p>
      <p>Calle de la calle, 22 - 32003 Ourense</p>
      <a href="#">Aviso Legal</a>
    </div>
  </footer>
</body>

</html>