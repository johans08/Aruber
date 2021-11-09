<?php

require_once("../bo/VehiculosBo.php");
require_once("../domain/Vehiculos.php");


/**
 * This class contain all services methods of the table Vehiculos
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 * private $idPlaca;
    private $modelo;
    private $color;
    private $ano;
    private $numeroPedido;
    private $monto;
 *
 */
//************************************************************
// Vehiculos Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myVehiculosBo = new VehiculosBo();
        $myVehiculos = Vehiculos::createNullVehiculos();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_vehiculos" or $action === "update_vehiculos") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idPlaca') != null) && (filter_input(INPUT_POST, 'modelo') != null) && (filter_input(INPUT_POST, 'color') != null) && (filter_input(INPUT_POST, 'ano') != null) && (filter_input(INPUT_POST, 'choferes_idchoferes') != null) && (filter_input(INPUT_POST, 'administradores_idAdministrador') != null)) {
                $myVehiculos->setidPlaca(filter_input(INPUT_POST, 'idPlaca'));
                $myVehiculos->setmodelo(filter_input(INPUT_POST, 'modelo'));
                $myVehiculos->setcolor(filter_input(INPUT_POST, 'color'));
                $myVehiculos->setano(filter_input(INPUT_POST, 'ano'));
                $myVehiculos->setChoferes_idchoferes(filter_input(INPUT_POST, 'choferes_idchoferes'));
                $myVehiculos->setAdministradores_idAdministrador(filter_input(INPUT_POST, 'administradores_idAdministrador'));

                if ($action == "add_vehiculos") {
                    $myVehiculosBo->add($myVehiculos);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_vehiculos") {
                    $myVehiculosBo->update($myVehiculos);
                    echo('M~Registro Modificado Correctamente');
                }
            } else{
                echo('no envia los valores del if');
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_vehiculos") {//accion de consultar todos los registros
            $resultDB   = $myVehiculosBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_vehiculos") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idPlaca') != null) {
                $myVehiculos->setidPlaca(filter_input(INPUT_POST, 'idPlaca'));
                $myVehiculos = $myVehiculosBo->searchById($myVehiculos);
                if ($myVehiculos != null) {
                    echo json_encode(($myVehiculos));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_vehiculos") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idPlaca') != null) {
                $myVehiculos->setidPlaca(filter_input(INPUT_POST, 'idPlaca'));
                $myVehiculosBo->delete($myVehiculos);
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
