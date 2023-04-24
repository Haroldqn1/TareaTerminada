<?php
session_start();
require_once '../models/Usuario.php';

if (isset($_POST['operacion'])){

    $usuario = new Usuario();

    //Identificamos la operacion...
    if($_POST['operacion'] == 'login'){

        $registro = $usuario->iniciarSesion($_POST['nombreusuario']);
        $_SESSION["login"] = false;

        //Objeto para contener el resultado
        $resultado = [
            "status" => false,
            "mensaje" => ""
        ];

        if ($registro){
            //El usuario existe 
            $claveEncriptada = $registro["clave"];

            //Validar la contraseña
            if (password_verify($_POST['claveIngresada'],$claveEncriptada)){
                $resultado["status"] = true;
                $resultado["mensaje"] = "Bienvenido al sistema";
                $_SESSION["login"] = true;
            }else{
                $resultado["mensaje"] = "Error en la contraseña";
            }
        }else{
            $resultado["mensaje"] = "No encontramos al usuario";
        }
        echo json_encode($resultado);
    }
}
