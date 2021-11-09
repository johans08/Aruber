<?php

require_once("../bo/choferesBo.php");
require_once("../domain/choferes.php");


/**
 * This class contain all services methods of the table Choferes
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 * private $idChoferes;
    private $usuario;
    private $contrasena;
    private $Ubicacion;
    private $tiempo;
    private $latActual;
 *
 */
//************************************************************
// Choferes Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myChoferesBo = new ChoferesBo();
        $myChoferes = Choferes::createNullChoferes();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_choferes" or $action === "update_choferes") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idChoferes') != null) && (filter_input(INPUT_POST, 'usuario') != null) && (filter_input(INPUT_POST, 'contraseña') != null) && (filter_input(INPUT_POST, 'ubicacion') != null) && (filter_input(INPUT_POST, 'tiempo') != null) && (filter_input(INPUT_POST, 'latActual') != null)&& (filter_input(INPUT_POST, 'longActual') != null)) {
                $myChoferes->setidChoferes(filter_input(INPUT_POST, 'idChoferes'));
                $myChoferes->setusuario(filter_input(INPUT_POST, 'usuario'));
                $myChoferes->setcontraseña(filter_input(INPUT_POST, 'contraseña'));
                $myChoferes->setUbicacion(filter_input(INPUT_POST, 'ubicacion'));
                $myChoferes->settiempo(filter_input(INPUT_POST, 'tiempo'));
                $myChoferes->setlatActual(filter_input(INPUT_POST, 'latActual'));
                $myChoferes->setlongActual(filter_input(INPUT_POST, 'longActual'));
                if ($action == "add_choferes") {
                    $myChoferesBo->add($myChoferes);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_choferes") {
                    $myChoferesBo->update($myChoferes);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_choferes") {//accion de consultar todos los registros
            $resultDB   = $myChoferesBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_choferes") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idChoferes') != null) {
                $myChoferes->setidChoferes(filter_input(INPUT_POST, 'idChoferes'));
                $myChoferes = $myChoferesBo->searchById($myChoferes);
                if ($myChoferes != null) {
                    echo json_encode(($myChoferes));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_choferes") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idChoferes') != null) {
                $myChoferes->setidChoferes(filter_input(INPUT_POST, 'idChoferes'));
                $myChoferesBo->delete($myChoferes);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }

        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>


