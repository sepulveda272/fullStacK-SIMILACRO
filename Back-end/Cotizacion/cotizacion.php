<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config.php");

$data = new Cotizaciones();
$all = $data -> obtainAll();

$idClientes = $data -> obtenerIdClientes();
$idEmpleados = $data -> obtenerIdEmpleados();
$idProducto = $data -> obtenerIdProducto();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Cotizaciones.</h3>
        <img src="../images/sepulveda.jpg" alt="" class="imagenPerfil">
        <h3>juan david</h3>
      </div>
      <div class="menus">
        <a href="/Home/home.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Home</h3>
        </a>
        <a href="../empleados/empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
        </a>
        <a href="../clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="../productos/productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
        <a href="cotizacion.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Cotizacion</h3>
        </a>

      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Cotizacion</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NOMBRE DEL CLIENTE</th>
              <th scope="col">NOMBRE DEL EMPLEADO</th>
              <th scope="col">NOMBRE DEL PRODUCTO</th>
              <th scope="col">FECHA DEL ALQUILER</th>
              <th scope="col">TOTAL</th>
              <th scope="col">BORRAR</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php
              foreach ($all as $key => $val){
            ?>

              <tr>
              <td class=""><?php echo $val['idCotizacion']?></td>
              <td><?php echo $val['nombres_Clientes']?></td>
              <td><?php echo $val['nombres_Empleados']?></td>
              <td><?php echo $val['nombres_productos']?></td>
              <td><?php echo $val['fecha_alquiler']?></td>
              <td><?php echo $val['total']?></td>
              <td>
                <a class="btn btn-danger" href="borrarCotizacion.php?idCotizacion=<?=$val['idCotizacion']?>&req=delete">Borrar</a>
              </td>
              </tr>
              <?php } ?>
       

          </tbody>
        
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Estudiantes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Estudiante</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form action="registrarCotizacion.php" class="col d-flex flex-wrap" method="post">
            <div class="mb-1 col-12">
                <label for="idClientes" class="form-label">Cliente Id</label>
                <select class="form-select" aria-label="Default select example" id="idClientes" name="idClientes" required>
                  <option selected>Seleccione el id del Empleados</option>
                  <?php
                    foreach($idClientes as $key => $valor){
                    ?> 
                  <option value="<?= $valor["idClientes"]?>"><?= $valor["nombres_Clientes"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="idEmpleados" class="form-label">Empleado Id</label>
                <select class="form-select" aria-label="Default select example" id="idEmpleados" name="idEmpleados" required>
                  <option selected>Seleccione el id del Empleados</option>
                  <?php
                    foreach($idEmpleados as $key => $valor){
                    ?> 
                  <option value="<?= $valor["idEmpleados"]?>"><?= $valor["nombres_Empleados"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="idProducto" class="form-label">Producto Id</label>
                <select class="form-select" aria-label="Default select example" id="idProducto" name="idProducto" required>
                  <option selected>Seleccione el id del Empleados</option>
                  <?php
                    foreach($idProducto as $key => $valor){
                    ?> 
                  <option value="<?= $valor["idProducto"]?>"><?= $valor["nombres_productos"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="fecha_alquiler" class="form-label">Fecha del alquiler</label>
                <input 
                  type="date"
                  id="fecha_alquiler"
                  name="fecha_alquiler"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="total" class="form-label">Total</label>
                <input 
                  type="number"
                  id="total"
                  name="total"
                  class="form-control"  
                 
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>