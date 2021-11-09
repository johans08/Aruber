<?php

require_once("../bo/usuariosBo.php");
require_once("../domain/usuarios.php");


/**
 * This class contain all services methods of the table Usuarios
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 */
//************************************************************
// Usuarios Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myUsuariosBo = new UsuariosBo();
        $myUsuarios = Usuarios::createNullUsuarios();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_usuarios" or $action === "update_usuarios") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idUsuarios') != null) && (filter_input(INPUT_POST, 'nombreUsuario') != null) && (filter_input(INPUT_POST, 'apellido1Usuario') != null)&& (filter_input(INPUT_POST, 'apellido2Usuario') != null)&& (filter_input(INPUT_POST, 'fechaNacimientoUsuario') != null)&& (filter_input(INPUT_POST, 'telefonoTrabajo') != null)&& (filter_input(INPUT_POST, 'celular') != null)&& (filter_input(INPUT_POST, 'usuario') != null)&& (filter_input(INPUT_POST, 'correoUsuario') != null)&& (filter_input(INPUT_POST, 'contrasenaUsuario') != null)&& (filter_input(INPUT_POST, 'sexo') != null)) {
                $myUsuarios->setidUsuarios(filter_input(INPUT_POST, 'idUsuarios'));
                $myUsuarios->setnombreUsuario(filter_input(INPUT_POST, 'nombreUsuario'));
                $myUsuarios->setapellido1Usuario(filter_input(INPUT_POST, 'apellido1Usuario'));
                $myUsuarios->setapellido2Usuario(filter_input(INPUT_POST, 'apellido2Usuario'));
                $myUsuarios->setfechaNacimientoUsuario(filter_input(INPUT_POST, 'fechaNacimientoUsuario'));
                $myUsuarios->settelefonoTrabajo(filter_input(INPUT_POST, 'telefonoTrabajo'));
                $myUsuarios->setcelular(filter_input(INPUT_POST, 'celular'));
                $myUsuarios->setusuario(filter_input(INPUT_POST, 'usuario'));
                $myUsuarios->setcorreoUsuario(filter_input(INPUT_POST, 'correoUsuario'));
                $myUsuarios->setcontrasenaUsuario(filter_input(INPUT_POST, 'contrasenaUsuario'));
                $myUsuarios->setsexo(filter_input(INPUT_POST, 'sexo'));
                $myUsuarios->setLastUser('112540148');
                if ($action == "add_usuarios") {
                    $myUsuariosBo->add($myUsuarios);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_usuarios") {
                    $myUsuariosBo->update($myUsuarios);
                    echo('M~Registro Modificado Correctamente');
                }
            } else{
                echo ('No envia los valores del if');
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_usuarios") {//accion de consultar todos los registros
            $resultDB   = $myUsuariosBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_usuarios") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idUsuarios') != null) {
                $myUsuarios->setidUsuarios(filter_input(INPUT_POST, 'idUsuarios'));
                $myUsuarios = $myUsuariosBo->searchById($myUsuarios);
                if ($myUsuarios != null) {
                    echo json_encode(($myUsuarios));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_usuarios") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idUsuarios') != null) {
                $myUsuarios->setidUsuarios(filter_input(INPUT_POST, 'idUsuarios'));
                $myUsuariosBo->delete($myUsuarios);
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
