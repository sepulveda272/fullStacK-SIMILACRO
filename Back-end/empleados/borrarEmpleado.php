<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config.php");


$recordC = new Empleados();

if (isset($_GET['idEmpleados']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
        $recordC -> setIdEmpleados($_GET['idEmpleados']);
        $recordC -> delete();
        echo "<script>alert('Dato borrado satisfactoriamenteE ');document.location='empleados.php'</script>";        
    }
}
?>