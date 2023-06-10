<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['guardar'])) {
    require_once('../config.php');

    $config = new Empleados();
    
    $config -> setNombres_Empleados($_POST['nombres_Empleados']);
    $config -> setCelular_Empleados($_POST['celular_Empleados']);
    $config -> setDireccion($_POST['direccion']);

    $config -> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamentee ');document.location='empleados.php'</script>";
}

?>