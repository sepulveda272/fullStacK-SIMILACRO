<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config.php");


$recordC = new Clientes();

if (isset($_GET['idClientes']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
        $recordC -> setIdClientes($_GET['idClientes']);
        $recordC -> delete();
        echo "<script>alert('Dato borrado satisfactoriamenteE ');document.location='clientes.php'</script>";        
    }
}
?>