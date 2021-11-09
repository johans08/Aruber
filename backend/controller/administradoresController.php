<?php

require_once("../bo/administradoresBo.php");
require_once("../domain/administradores.php");


/**
 * This class contain all services methods of the table Administradores
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created

 */
//************************************************************
// Administradores Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myAdministradoresBo = new AdministradoresBo();
        $myAdministradores = Administradores::createNullAdministradores();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_administradores" or $action === "update_administradores") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idAdministrador') != null) && (filter_input(INPUT_POST, 'nombreAdmin') != null) && (filter_input(INPUT_POST, 'apellido1Admin') != null) && (filter_input(INPUT_POST, 'apellido2Admin') != null) && (filter_input(INPUT_POST, 'correoAdmin') != null) && (filter_input(INPUT_POST, 'usuarioAdmin') != null)&& (filter_input(INPUT_POST, 'contrasenaAdmin') != null)&& (filter_input(INPUT_POST, 'tipoUsuario') != null)&& (filter_input(INPUT_POST, 'Activo') != null)) {
                $myAdministradores->setidAdministrador(filter_input(INPUT_POST, 'idAdministrador'));
                $myAdministradores->setnombreAdmin(filter_input(INPUT_POST, 'nombreAdmin'));
                $myAdministradores->setapellido1Admin(filter_input(INPUT_POST, 'apellido1Admin'));
                $myAdministradores->setapellido2Admin(filter_input(INPUT_POST, 'apellido2Admin'));
                $myAdministradores->setcorreoAdmin(filter_input(INPUT_POST, 'correoAdmin'));
                $myAdministradores->setusuarioAdmin(filter_input(INPUT_POST, 'usuarioAdmin'));
                $myAdministradores->setcontrasenaAdmin(filter_input(INPUT_POST, 'contrasenaAdmin'));
                $myAdministradores->settipoUsuario(filter_input(INPUT_POST, 'tipoUsuario'));
                $myAdministradores->setActivo(filter_input(INPUT_POST, 'Activo'));

                if ($action == "add_administradores") {
                    $myAdministradoresBo->add($myAdministradores);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_administradores") {
                    $myAdministradoresBo->update($myAdministradores);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************
        
        if ($action === "showAll_administradores") {//accion de consultar todos los registros
            $resultDB   = $myAdministradoresBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_administradores") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idAdministrador') != null) {
                $myAdministradores->setidAdministrador(filter_input(INPUT_POST, 'idAdministrador'));
                $myAdministradores = $myAdministradoresBo->searchById($myAdministradores);
                if ($myAdministradores != null) {
                    echo json_encode(($myAdministradores));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_administradores") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idAdministrador') != null) {
                $myAdministradores->setidAdministrador(filter_input(INPUT_POST, 'idAdministrador'));
                $myAdministradoresBo->delete($myAdministradores);
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

