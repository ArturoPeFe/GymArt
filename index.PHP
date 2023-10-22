<?php session_start(); ?>
<!DOCTYPE html>

<head>
  <title>Gimnasio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/all.css">
  <link rel="stylesheet" type="text/css" href="./css/menu.css">
  <link rel="stylesheet" type="text/css" href="./css/fondoIndex.css">
  <link rel="stylesheet" type="text/css" href="./css/cardsYcarrusel.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/2eff857ffa.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</head>

<body>
  <div id="fondo"></div>
  <nav id="navbar">
    <div id="menu">
      <div id="logo">
        <a href="/Proyecto/">
          <h2 class="w700">Gym<span class="naranja">Art</span></h2>
        </a>
      </div>
      <div id="opcionesMenu">
        <ul>
          <li><a href="/Proyecto/">Inicio </a> </li>
          <li><a href="#">Galería</a></li>
          <li><a href="#">Valoraciones</a></li>
          <li><a href="#">Miembros</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="./pages/acceso.php" class="naranja">Clientes</a></li>
        </ul>
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
      ¡Bienvenidos al sitio web de Intense Gym! Esperamos que aprecie nuestros servicios y oportunidades que ofrecemos a nuestros clientes leales y potenciales.
      Éstos son algunos de ellos:
    </p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100 padd">
          <h1><i class="bi bi-people-fill"></i></h1>
          <div class="card-body">
            <h4 class="card-title naranja w700">Entrenadores calificados</h4>
            <p class="card-text">Nuestros entrenadores tienen años de experiencia en diversos tipos de fitness y deportes.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 padd">
          <h1><i class="bi bi-hand-thumbs-up-fill"></i></h1>
          <div class="card-body">
            <h4 class="card-title naranja w700">Enfoque individual</h4>
            <p class="card-text">Cada cliente de Intense tiene un programa personalizado de entrenamiento y nutrición.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 padd">
          <h1><i class="fa-solid fa-dumbbell"></i></h1>
          <div class="card-body">
            <h4 class="card-title naranja w700">Equipo de fitness moderno</h4>
            <p class="card-text">Cooperamos con los principales proveedores de equipos de fitness para brindarle resultados superiores.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="fondoCarrusel">
    <div id="tamCarrusel">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row row-cols-1 row-cols-md-2">
              <div class="col sinSep">
                <img src="./assets/img/bg/bg-5.jpg" class="d-block w-100" alt="Imagen 1">
              </div>
              <div class="col sinSep sHidden1">
                <img src="./assets/img/bg/bg-cta.jpg" class="d-block w-100" alt="Imagen 2">
              </div>
            </div>
          </div>
          <div class="carousel-item active">
            <div class="row row-cols-1 row-cols-md-2">
              <div class="col sinSep">
                <img src="./assets/img/bg/bg-5.jpg" class="d-block w-100" alt="Imagen 1">
              </div>
              <div class="col sinSep sHidden1">
                <img src="./assets/img/bg/bg-cta.jpg" class="d-block w-100" alt="Imagen 2">
              </div>
            </div>
          </div>
          <div class="carousel-item active">
            <div class="row row-cols-1 row-cols-md-2">
              <div class="col sinSep">
                <img src="./assets/img/bg/bg-5.jpg" class="d-block w-100" alt="Imagen 1">
              </div>
              <div class="col sinSep sHidden1">
                <img src="./assets/img/bg/bg-cta.jpg" class="d-block w-100" alt="Imagen 2">
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

</body>

</html>