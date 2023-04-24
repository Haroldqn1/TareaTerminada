<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false){
  header('Location:../index.php');
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Seleccionar opción</title>
    <!-- Agregar los archivos CSS y JS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container my-5">
      <h2 class="text-center mb-4">¿Deseas ingresar como estudiante o colaborador?</h2>
      <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="../iconos/estudiante.jpg" class="card-img-top" alt="Estudiante">
            <div class="card-body">
              <h5 class="card-title">Ingresar como estudiante</h5>
              <a href="./estudiantes.php" class="btn btn-primary stretched-link">Ingresar</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="../iconos/colaboradores.jpg" class="card-img-top" alt="Colaborador">
            <div class="card-body">
              <h5 class="card-title">Ingresar como colaborador</h5>
              <a href="./colaboradores.php" class="btn btn-primary stretched-link">Ingresar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

