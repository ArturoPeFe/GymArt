<?php
//Obtener datos valoraciones
$consulta = "CALL ObtenerValoraciones";
$exec = $bdGym->prepare($consulta);

try {
  $exec->execute();
} catch (PDOException $e) {
  $error = true;
  $mensaje = $e->getMessage();
  $bdGym = null;
}
?>