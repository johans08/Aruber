<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Choferes extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idChoferes;
    private $usuario;
    private $contraseña;
    private $Ubicacion;
    private $tiempo;
    private $latActual;
    private $longActual;


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullChoferes() {
        $instance = new self();
        return $instance;
    }

    public static function createChoferes($idChoferes, $usuario, $contraseña, $Ubicacion, $tiempo, $latActual, $longActual) {
        $instance = new self();
        $instance->idChoferes        = $idChoferes;
        $instance->usuario           = $usuario;
        $instance->contraseña        = $contraseña;
        $instance->Ubicacion        = $Ubicacion;
        $instance->tiempo    = $tiempo;
        $instance->latActual             = $latActual;
        $instance->longActual    = $longActual;      
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getIdChoferes() {
        return $this->idChoferes;
    }

    public function setIdChoferes($idChoferes) {
        $this->idChoferes = $idChoferes;
    }

    /****************************************************************************/

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /****************************************************************************/

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    /****************************************************************************/

    public function getUbicacion() {
        return $this->Ubicacion;
    }

    public function setUbicacion($Ubicacion) {
        $this->Ubicacion = $Ubicacion;
    }

    /****************************************************************************/

    public function getTiempo() {
        return $this->tiempo;
    }

    public function setTiempo($tiempo) {
        $this->tiempo = $tiempo;
    }

    /****************************************************************************/

    public function getLatActual() {
        return $this->latActual;
    }

    public function setLatActual($latActual) {
        $this->latActual = $latActual;
    }

    /****************************************************************************/

    public function getLongActual() {
        return $this->longActual;
    }

    public function setLongActual($longActual) {
        $this->longActual = $longActual;
    }


    /****************************************************************************/

    public function getUltTipoUsuario() {
        return $this->ultTipoUsuario;
    }

    public function setUltTipoUsuario($ultTipoUsuario) {
        $this->ultTipoUsuario = $ultTipoUsuario;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}