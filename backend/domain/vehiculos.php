<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Vehiculos extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idPlaca;
    private $modelo;
    private $color;
    private $ano;
    private $choferes_idchoferes;
    private $administradores_idAdministrador;


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullVehiculos() {
        $instance = new self();
        return $instance;
    }

    public static function createVehiculos($idPlaca, $modelo, $color, $ano, $choferes_idchoferes, $administradores_idAdministrador) {
        $instance = new self();
        $instance->idPlaca        = $idPlaca;
        $instance->modelo           = $modelo;
        $instance->color        = $color;
        $instance->ano        = $ano;
        $instance->choferes_idchoferes        = $choferes_idchoferes;
        $instance->administradores_idAdministrador        = $administradores_idAdministrador;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getIdPlaca() {
        return $this->idPlaca;
    }

    public function setIdPlaca($idPlaca) {
        $this->idPlaca = $idPlaca;
    }

    /****************************************************************************/

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    /****************************************************************************/

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    /****************************************************************************/

    public function getAno() {
        return $this->ano;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function getChoferes_idchoferes() {
        return $this->choferes_idchoferes;
    }

    public function setChoferes_idchoferes($choferes_idchoferes) {
        $this->choferes_idchoferes = $choferes_idchoferes;
    }

    public function getAdministradores_idAdministrador() {
        return $this->administradores_idAdministrador;
    }

    public function setAdministradores_idAdministrador($administradores_idAdministrador) {
        $this->administradores_idAdministrador = $administradores_idAdministrador;
    }



 /****************************************************************************/


    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
