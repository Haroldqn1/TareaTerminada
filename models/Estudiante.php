<?php

require_once 'Conexion.php';

class Estudiante extends Conexion{
  private $accesoBD;

  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  //Dtos[] es un array asociativo , que contiene la informacion
  // a guardar proveniente del controlador
  public function registrarEstudiante($datos = []){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_estudiantes_registrar(?,?,?,?,?,?,?,?)");
      $consulta->execute(
        array(
          $datos['apellidos'],
          $datos['nombres'],
          $datos['tipodocumento'],
          $datos['nrodocumento'],
          $datos['fechanacimiento'],
          $datos['idcarrera'],
          $datos['idsede'],
          $datos['fotografia']
        )
      );
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarEstudiante(){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_estudiantes_listar()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  public function eliminarEstudiante($idestudiante = 0){
    try {
      $consulta = $this->accesoBD->prepare("CALL spu_estudiante_eliminar(?)");
      $consulta->execute(array($idestudiante));
    }
    catch (Exception $e){
      die ($e->getMessage());
    }
  }

}