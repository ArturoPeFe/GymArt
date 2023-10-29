<?php
    /*Hay que modificar los datos para la bdd final, estos son para la de Xampp*/

    $host="localhost";
    $bd="gimnasio"; 
    $user="root";
    $dsn = "mysql:host=$host; dbname=$bd; charset=utf8mb4";
    $error=false;
    $mensaje;

    try{
        $bdGym = new PDO($dsn, $user);
        $bdGym -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }catch(PDOException $e){
        $mensaje = $e->getMessage();
        $error = true;
    }

    if($error){
        echo "<h2 style='text-align:center;'>A ocurrido un error al intentar conectar con la base de datos.<h2>";
    }

?>