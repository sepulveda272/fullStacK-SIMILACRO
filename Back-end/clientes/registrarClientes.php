<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['guardar'])) {
    require_once('../config.php');

    $config = new Clientes();
    
    $config -> setNombres_Clientes($_POST['nombres_Clientes']);
    $config -> setCelular_Clientes($_POST['celular_Clientes']);
    $config -> setCompañia($_POST['compañia']);

    $config -> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamentee ');document.location='clientes.php'</script>";
}

?>