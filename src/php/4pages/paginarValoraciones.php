<?php
// Obtener la página actual desde la URL
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el rango de valoraciones para la página actual
$valoracionesPorPagina = 3; //Ahora porque solo hay 5 valoraciones, luego por defecto será 10
$inicio = ($pagina - 1) * $valoracionesPorPagina;

// Consulta para obtener las valoraciones para la página actual
$consulta = "  SELECT c.nombre, v.comentario FROM valoraciones v INNER JOIN clientes c ON v.id_cliente = c.id_cliente LIMIT $inicio, $valoracionesPorPagina";
$exec = $bdGym->prepare($consulta);

try {
  $exec->execute();
} catch (PDOException $e) {
  $error = true;
  $mensaje = $e->getMessage();
  $bdGym = null;
}

?>