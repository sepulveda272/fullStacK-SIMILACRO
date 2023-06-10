<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config.php");


$recordC = new Productos();

if (isset($_GET['idProducto']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
        $recordC -> setIdProducto($_GET['idProducto']);
        $recordC -> delete();
        echo "<script>alert('Dato borrado satisfactoriamenteE ');document.location='productos.php'</script>";        
    }
}
?>