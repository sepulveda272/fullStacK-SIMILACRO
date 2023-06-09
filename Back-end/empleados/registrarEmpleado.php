<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['guardar'])) {
    require_once('../config.php');

    $config = new Empleados();
    
    $config -> setNombres($_POST['nombres']);
    $config -> setCelular($_POST['celular']);
    $config -> setDireccion($_POST['direccion']);

    $config -> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamentee ');document.location='empleados.php'</script>";
}

?>