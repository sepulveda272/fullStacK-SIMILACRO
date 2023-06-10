<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST['guardar'])) {
    require_once('../config.php');

    $config = new Productos();
    
    $config -> setNombres_productos($_POST['nombres_productos']);
    $config -> setPrecios_productos($_POST['precios_productos']);

    $config -> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamentee ');document.location='productos.php'</script>";
}

?>