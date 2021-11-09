<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Facturas extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idFactura;
    private $nombreFactura;
    private $direccionFactura;
    private $fechaFactura;
    private $numeroPedido;
    private $monto;
    private $Usuarios_idUsuarios;


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullFacturas() {
        $instance = new self();
        return $instance;
    }

    public static function createFacturas($idFactura, $nombreFactura, $direccionFactura, $fechaFactura, $numeroPedido, $monto, $Usuarios_idUsuarios, $ultUsuario, $ultModificacion, $lastUser, $lastModification) {
        $instance = new self();
        $instance->idFactura        = $idFactura;
        $instance->nombreFactura           = $nombreFactura;
        $instance->direccionFactura        = $direccionFactura;
        $instance->fechaFactura        = $fechaFactura;
        $instance->numeroPedido    = $numeroPedido;
        $instance->monto             = $monto;
        $instance->Usuarios_idUsuarios             = $Usuarios_idUsuarios;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getIdFactura() {
        return $this->idFactura;
    }

    public function setIdFactura($idFactura) {
        $this->idFactura = $idFactura;
    }

    /****************************************************************************/

    public function getNombreFactura() {
        return $this->nombreFactura;
    }

    public function setNombreFactura($nombreFactura) {
        $this->nombreFactura = $nombreFactura;
    }

    /****************************************************************************/

    public function getDireccionFactura() {
        return $this->direccionFactura;
    }

    public function setDireccionFactura($direccionFactura) {
        $this->direccionFactura = $direccionFactura;
    }

    /****************************************************************************/

    public function getFechaFactura() {
        return $this->fechaFactura;
    }

    public function setFechaFactura($fechaFactura) {
        $this->fechaFactura = $fechaFactura;
    }

    /****************************************************************************/

    public function getNumeroPedido() {
        return $this->numeroPedido;
    }

    public function setNumeroPedido($numeroPedido) {
        $this->numeroPedido = $numeroPedido;
    }

    /****************************************************************************/

    public function getMonto() {
        return $this->monto;
    }

    public function setMonto($monto) {
        $this->monto = $monto;
    }

    /****************************************************************************/
    
    public function getUsuarios_idUsuarios() {
        return $this->Usuarios_idUsuarios;
    }

    public function setUsuarios_idUsuarios($Usuarios_idUsuarios) {
        $this->Usuarios_idUsuarios = $Usuarios_idUsuarios;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}