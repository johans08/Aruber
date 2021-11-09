<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Administradores extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idAdministrador;
    private $nombreAdmin;
    private $apellido1Admin;
    private $apellido2Admin;
    private $correoAdmin;
    private $contrasenaAdmin;
    private $usuarioAdmin;
    private $tipoUsuario;
    private $Activo;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullAdministradores() {
        $instance = new self();
        return $instance;
    }

    public static function createAdministradores($idAdministrador, $nombreAdmin, $apellido1Admin, $apellido2Admin, $correoAdmin, $contrasenaAdmin, $usuarioAdmin, $tipoUsuario, $Activo, $ultUsuario, $ultModificacion, $lastUser, $lastModification) {
        $instance = new self();
        $instance->idAdministrador        = $idAdministrador;
        $instance->nombreAdmin           = $nombreAdmin;
        $instance->apellido1Admin        = $apellido1Admin;
        $instance->apellido2Admin        = $apellido2Admin;
        $instance->correoAdmin    = $correoAdmin;
        $instance->contrasenaAdmin    = $contrasenaAdmin;
        $instance->usuarioAdmin             = $usuarioAdmin;
        $instance->tipoUsuario    = $tipoUsuario;
        $instance->Activo    = $Activo;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getIdAdministrador() {
        return $this->idAdministrador;
    }

    public function setidAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador;
    }

    /****************************************************************************/

    public function getNombreAdmin() {
        return $this->nombreAdmin;
    }

    public function setNombreAdmin($nombreAdmin) {
        $this->nombreAdmin = $nombreAdmin;
    }

    /****************************************************************************/

    public function getApellido1Admin() {
        return $this->apellido1Admin;
    }

    public function setApellido1Admin($apellido1Admin) {
        $this->apellido1Admin = $apellido1Admin;
    }

    /****************************************************************************/

    public function getApellido2Admin() {
        return $this->apellido2Admin;
    }

    public function setApellido2Admin($apellido2Admin) {
        $this->apellido2Admin = $apellido2Admin;
    }

    /****************************************************************************/

    public function getCorreoAdmin() {
        return $this->correoAdmin;
    }

    public function setCorreoAdmin($correoAdmin) {
        $this->correoAdmin = $correoAdmin;
    }

    /****************************************************************************/

    public function getUsuarioAdmin() {
        return $this->usuarioAdmin;
    }

    public function setUsuarioAdmin($usuarioAdmin) {
        $this->usuarioAdmin = $usuarioAdmin;
    }

    /****************************************************************************/

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    /****************************************************************************/
        public function getActivo() {
        return $this->Activo;
    }

    public function setActivo($Activo) {
        $this->Activo = $Activo;
    }

    /****************************************************************************/
    
            public function getcontrasenaAdmin() {
        return $this->contrasenaAdmin;
    }

    public function setcontrasenaAdmin($contrasenaAdmin) {
        $this->contrasenaAdmin = $contrasenaAdmin;
    }

    /****************************************************************************/

    public function getUltUsuario() {
        return $this->ultUsuario;
    }

    public function setUltUsuario($ultUsuario) {
        $this->ultUsuario = $ultUsuario;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
