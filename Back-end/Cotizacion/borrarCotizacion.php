<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config.php");


$recordC = new Cotizaciones();

if (isset($_GET['idCotizacion']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
        $recordC -> setIdCotizacion($_GET['idCotizacion']);
        $recordC -> delete();
        echo "<script>alert('Dato borrado satisfactoriamenteE ');document.location='cotizacion.php'</script>";        
    }
}
?>