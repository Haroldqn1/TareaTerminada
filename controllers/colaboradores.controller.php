<?php

require_once '../models/Colaboradores.php';
if (isset($_POST['operacion'])){
    $colaboradores = new Colaboradores();

    if ($_POST['operacion'] == 'registrar'){

        $datosGuardar = [
            "apellidos"     => $_POST['apellidos'],
            "nombres"       => $_POST['nombres'],
            "cargo"         => $_POST['cargo'],
            "sede"          => $_POST['sede'],
            "tipocontrato"  => $_POST['tipocontrato'],
            "telefono"      => $_POST['telefono'],
            "direccion"     => $_POST['direccion'],
            "cv"            =>''
        ];

        //Verificamos si la vista nos envio un PDF
        if(isset($_FILES['cv'])){
            $rutaDestino    = '../views/pdf/documentos/';
            $fechaActual    = date('c');
            $nomnbreArchivo = sha1($fechaActual). ".pdf";
            $rutaDestino .= $nomnbreArchivo;

            //Guardamos el PDF  en el servidor
            if(move_uploaded_file($_FILES['cv']['tmp_name'],$rutaDestino)){
                $datosGuardar['cv'] = $nomnbreArchivo;
            }
        }

        //Enviamos el array
        $colaboradores->registrarColaborador($datosGuardar);
    }

    if($_POST['operacion'] == 'listar'){
        $data = $colaboradores->listarColaboradores();

        if ($data){
            $numeroFila = 1;
            $datosColaborador = '';
            $botonNulo = " <a href='#' class='btn btn-sm btn-warning' title='No tiene Cv'><i class='bi bi-file-earmark-x'></i></a>";

            foreach($data as $registro){
                //$datosColaborador = $registro['apellidos']. ' ' . $registro[''];

                echo"
                    <tr>
                        <td>{$numeroFila}</td>
                        <td>{$registro['apellidos']}</td>
                        <td>{$registro['nombres']}</td>
                        <td>{$registro['cargo']}</td>
                        <td>{$registro['sede']}</td>
                        <td>{$registro['tipocontrato']}</td>
                        <td>{$registro['telefono']}</td>
                        <td>{$registro['direccion']}</td>
                        <td>
                            <a href='#' data-idcolaborador={$registro['idcolaborador']} class='btn btn-sm btn-danger eliminar'><i class='bi bi-trash3'></i></a>
                            <a href='#' class='btn btn-sm btn-info'><i class='bi bi-pencil-fill'></i></a>";
                    //La segunda parte a RENDERIZAR, es el botón VER FOTOGRAFÍA
                    if ($registro['cv'] == ''){
                        echo $botonNulo;
                        // En la linea 66 encontramos el target='_blank que nos permite abrir un documento en otra pagina
                    }else{
                        echo " <a href='../views/pdf/documentos/{$registro['cv']}' data-lightbox='{$registro['idcolaborador']}' data-title='{$datosColaborador}' class='btn btn-sm btn-warning' target='_blank'><i class='bi bi-file-earmark-pdf-fill'></i></a>";
                    }

                    //La tercera parte a RENDERIZAR, cierre de la fila
                    echo "
                        </td>
                    </tr>
                    ";
                    $numeroFila++;
            }   //FIN DEL FOREACH
        }
    }

    if ($_POST['operacion'] == 'eliminar'){
        $colaboradores->eliminarColaborador($_POST['idcolaborador']);
    }

    /*if ($_POST['operacion'] == 'obtenercv'){
        $registro = $colaboradores->obtnerCv($_POST['idcolaborador']);  
        if($registro == ' ' ){
        echo"No hay registro";
        }else{
            unlink("../views/pdf/documentos/{$registro['cv']}");
        }       
    }*/
}
