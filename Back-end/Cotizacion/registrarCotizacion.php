<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST["guardar"])){
    require_once("cotizacion.php");

    print_r($_POST);

    $config = new Cotizaciones();

    /* $config->setIdCotizacion($_POST["idCotizacion"]); */
    $config->setIdClientes($_POST["idClientes"]);
    $config->setIdEmpleados($_POST["idEmpleados"]);
    $config->setIdProducto($_POST["idProducto"]);
    $config->setFecha_alquiler($_POST["fecha_alquiler"]);
    $config->setTotal($_POST["total"]);

    $config->insertData();

    print_r($config);

    echo "
    <script> alert('Los datos fueron guardados exitosamente');
    document.location='cotizacion.php'
    </script>";
}

?>