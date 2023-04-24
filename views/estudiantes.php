<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false){
  header('Location:../index.php');
}

?>

<!doctype html>
<html lang="es">

<head>
  <title>Estudiantes</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!--ICONOS-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <!--Lighbox CSS-->
  <link rel="stylesheet" href="../dist/lightbox2/src/css/lightbox.css">


</head>

<body>
  <div class="container mt-3">
    <div class="card">
      <div class="card-header bg-primary text-light">
        <div class="row">
          <div class="col-md-6">
            <strong>LISTA DE ESTUDIANTES</strong>
          </div>
          <div class="col-md-6 text-end">
            <button type="button" class="btn btn-secondary btn-sm" id="abrir-modal" data-bs-toggle="modal" data-bs-target="#modal-estudiante"><i class="bi bi-person-add"></i> Registrar Estudiante</button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm table-striped" id="tabla-estudiantes">
            <thead>
              <tr>
                <th>#</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Tipo</th>
                <th>Documento</th>
                <th>Nacimiento</th>
                <th>Carrera</th>
                <th>Operaciones</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-md-6">
          <button type="button" class="btn btn-primary" onclick="window.location.href='./colaboradores.php'">Ir a tabla Colaboradores</button>
        </div>
        <div class="mb-3 col-md-6">
          <button type="button" class="btn btn-danger" onclick="window.location.href='./cerrar.session.php'">Cerrar Cession</button>
        </div>
      </div>
      <!--<div class="row">
        <div class="col-md-12 text-center">
          <a href='../views/cerrar.session.php' id="cerrar-session" >Salir</a>
        </div>
        <div class="col-md-12 text-start">
          <a href='../views/colaboradores.php' id="cerrar-session" >Colaboradores</a>
        </div>
      </div>-->
      <div class="card-footer text-end">
        <div id="copyright">Pagina creada por <a href="https://www.instagram.com/uwbs.hardd/" >Harold Qn</a></div>
      </div>
    </div>
  </div>
  <!-- Modal trigger button -->
  <!--<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modal-estudiante">Ver</button>-->
  
  <!--<div class="container">
    <table id="tabla-estudiantes" class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>Tipo</th>
          <th>Documento</th>
          <th>Nacimiento</th>
          <th>Carrera</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>-->

  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modal-estudiante" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary text-light">
          <h5 class="modal-title" id="modalTitleId">Registrar Estudiantes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action ="" autocomplete="off" id="formulario-estudiantes" enctype="multipart/form-data">
            <!------------------------------------------------------------->
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control form-control-sm" id="apellidos">
              </div>
              <div class="mb-3 col-md-6">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control form-control-sm" id="nombres">
              </div>
            </div>
            <!------------------------------------------------------------->
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="tipodocumento" class="form-label">Tipo de Documento</label>
                <select name="tipodocumento" id="tipodocumento" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                  <option value="D">DNI</option>
                  <option value="C">Carnet de Extranjeria</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="nrodocumento" class="form-label">Numero de documento:</label>
                <input type="text" class="form-control form-control-sm" id="nrodocumento">
              </div>
            </div>
            <!------------------------------------------------------------->
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="fechanacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control form-control-sm" id="fechanacimiento">
              </div>
              <div class="mb-3 col-md-6">
                <label for="sede" class="form-label">Elija la Sede:</label>
                <select type="text" id="sede" class="form-select form-select-sm">
                </select>
              </div>
            </div>
            <!------------------------------------------------------------->

            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="escuela" class="form-label">Elija la Escuela</label>
                <select id="escuela" class="form-select form-select-sm">
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="carrera" class="form-label">Elija la Carrera</label>
                <select id="carrera" class="form-select form-select-sm">
                </select>
              </div>
            </div>
            <!------------------------------------------------------------->
            <div class="row">
              <div class="mb-3">
                <label for="fotografia" class="form-label">Fotografia:</label>
                <input type="file" class="form-control form-control-sm" id="fotografia" accept=".jpg" />
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardar-estudiante">Guardar</button>
          

        </div>
      </div>
    </div>
  </div>
  
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <!-- jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!--SweetAlert2-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!--LightBox JS-->
  <script src="../dist/lightbox2/src/js/lightbox.js"></script>


  <script>
    $(document).ready(function(){   
      //FALTA ESTO
      
      function mostrarEstudiantes(){
        $.ajax({
          url:'../controllers/estudiante.controller.php',
          type:'POST',
          data:{operacion : 'listar'},
          dataType: 'text',
          success: function(result){
            $("#tabla-estudiantes tbody").html(result);
          }
        });
      }
      mostrarEstudiantes();
      
      function obtenerSedes(){
        $.ajax({
          url: '../controllers/sede.controller.php',
          type: 'POST',
          data:{operacion: 'listar'},
          dataType:'text',
          success: function(result){
            $("#sede").html(result);
          }
        });
      }

      function obtenerEscuela(){
        $.ajax({
          url: '../controllers/escuela.controller.php',
          type: 'POST',
          data:{operacion: 'listar'},
          dataType:'text',
          success: function(result){
            $("#escuela").html(result);
          }
        })
      }

      function registrarEstudiante(){

        //Enviaremos los datos dentro de un OBJETO
        var formData = new FormData();

        formData.append("operacion"       , "registrar");
        formData.append("apellidos"       , $("#apellidos").val());
        formData.append("nombres"         , $("#nombres").val());
        formData.append("tipodocumento"   , $("#tipodocumento").val());
        formData.append("nrodocumento"    , $("#nrodocumento").val());
        formData.append("fechanacimiento" , $("#fechanacimiento").val());
        formData.append("idcarrera"       , $("#carrera").val());
        formData.append("idsede"          , $("#sede").val());
        formData.append("fotografia"      , $("#fotografia")[0].files[0]);

        $.ajax({
          url: '../controllers/estudiante.controller.php',
          type: 'POST',
          data: formData,
          contentType:false,
          processData:false,
          cache: false,
          success: function(){
            $("#formulario-estudiantes")[0].reset();
            $("#modal-estudiante").modal("hide");
            //alert("Guardado correctamente");
            mostrarEstudiantes();
          }
        });
      }

      function preguntarRegistro(){
        Swal.fire({
          icon: 'question',
          title: 'Matriculas',
          text:'¿Seguro de registrar al estudiante?',
          footer: 'Desarrolado con PHP',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#2874A6',
          showCancelButton:true,
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          //Identificando la accion del usuario
          if(result.isConfirmed){
            registrarEstudiante();
          }
        });
      }

      $("#guardar-estudiante").click(preguntarRegistro);
      //ACABA

      function eliminarEstudiante(){
        console.log("eliminado...");
      }

      $("#tabla-estudiantes tbody").on("click", ".eliminar",function(){
        const idestudianteEliminar = $(this).data("idestudiante");
        if(confirm("¿Estas seguro de eliminar al estudiante?")){
          $.ajax({
            url: '../controllers/estudiante.controller.php',
            type:'POST',
            data:{
              operacion : 'eliminar',
              idestudiante : idestudianteEliminar
            },
            success: function(result){
              if(result == ""){
                mostrarEstudiantes();
              }
            }
          })
        }
      });

      //Al cambiar una escuela , se actualizara las carreras
      $("#escuela").change(function(){
        const idescuelaFiltro = $(this).val();

        $.ajax({
          url: '../controllers/carrera.controller.php',
          type: 'POST',
          data: {
            operacion   : 'listar',
            idescuela   : idescuelaFiltro
          },
          dataType: 'text',
          success: function(result){
            $('#carrera').html(result);
          }
        });
      });


      //Evento de apertura del modal

      //Predeterminamos un control dentro del modal
      $("#modal-estudiante").on("shown.bs.modal", event =>{
        $("#apellidos").focus();

        obtenerSedes();
        obtenerEscuela();
      });


      //FUNCIONES DE CARGA AUTOMATICA
      

    });
  </script>


</body>

</html>