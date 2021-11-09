<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/personasBo.php");
require_once ("../domain/personas.php");

$obj_persona = new Personas();
$obj_persona->setPK_cedula(121212);
$obj_persona->setNombre("Cristhian mod");
$obj_persona->setApellido1("Garita");
$obj_persona->setApellido2("Fonseca");
$obj_persona->setSexo(1);
$obj_persona->setObservaciones("Prueba");
$obj_persona->setFecNacimiento("19850830");
$obj_persona->setLastUser("chgari");

$bo_persona = new PersonasBo();

$operacion = 4; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_persona->add($obj_persona);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_persona->update($obj_persona);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_persona->delete($obj_persona);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $personaConsultada = $bo_persona->searchById($obj_persona);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($personaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_persona->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
