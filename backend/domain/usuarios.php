<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Usuarios extends BaseDomain implements \JsonSerializable {

    //attributes
    private $idUsuarios;
    private $nombreUsuario;
    private $apellido1Usuario;
    private $apellido2Usuario;
    private $fechaNacimientoUsuario;
    private $telefonoTrabajo;
    private $celular;
    private $usuario;
    private $correoUsuario;
    private $contrasenaUsuario;
    private $sexo;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullUsuarios() {
        $instance = new self();
        return $instance;
    }

    public static function createUsuarios($idUsuarios, $nombreUsuario, $apellido1Usuario, $apellido2Usuario, $fechaNacimientoUsuario, $sexo, $telefonoTrabajo, $correoUsuario, $contrasenaUsuario, $celular, $usuario, $ultUsuario, $ultModificacion, $lastUser, $lastModification) {
        $instance = new self();
        $instance->idUsuarios = $idUsuarios;
        $instance->nombreUsuario = $nombreUsuario;
        $instance->apellido1Usuario = $apellido1Usuario;
        $instance->apellido2Usuario = $apellido2Usuario;
        $instance->fechaNacimientoUsuario = $fechaNacimientoUsuario;
        $instance->telefonoTrabajo = $telefonoTrabajo;
        $instance->celular = $celular;
        $instance->usuario = $usuario;
        $instance->correoUsuario = $correoUsuario;
        $instance->contrasenaUsuario = $contrasenaUsuario;
        $instance->sexo = $sexo;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /*     * ************************************************************************* */

    //properties
    /*     * ************************************************************************* */
    public function getIdUsuarios() {
        return $this->idUsuarios;
    }

    public function setIdUsuarios($idUsuarios) {
        $this->idUsuarios = $idUsuarios;
    }

    /*     * ************************************************************************* */

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    /*     * ************************************************************************* */

    public function getApellido1Usuario() {
        return $this->apellido1Usuario;
    }

    public function setApellido1Usuario($apellido1Usuario) {
        $this->apellido1Usuario = $apellido1Usuario;
    }

    /*     * ************************************************************************* */

    public function getApellido2Usuario() {
        return $this->apellido2Usuario;
    }

    public function setApellido2Usuario($apellido2Usuario) {
        $this->apellido2Usuario = $apellido2Usuario;
    }

    /*     * ************************************************************************* */

    public function getFechaNacimientoUsuario() {
        return $this->fechaNacimientoUsuario;
    }

    public function setFechaNacimientoUsuario($fechaNacimientoUsuario) {
        $this->fechaNacimientoUsuario = $fechaNacimientoUsuario;
    }

    /*     * ************************************************************************* */

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    /*     * ************************************************************************* */

    public function getTelefonoTrabajo() {
        return $this->telefonoTrabajo;
    }

    public function setTelefonoTrabajo($telefonoTrabajo) {
        $this->telefonoTrabajo = $telefonoTrabajo;
    }

    /*     * ************************************************************************* */

    public function getCorreoUsuario() {
        return $this->correoUsuario;
    }

    public function setCorreoUsuario($correoUsuario) {
        $this->correoUsuario = $correoUsuario;
    }

    /*     * ************************************************************************* */

    public function getCelular() {
        return $this->celular;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    /*     * ************************************************************************* */

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /*     * ************************************************************************* */

    public function getcontrasenaUsuario() {
        return $this->contrasenaUsuario;
    }

    public function setcontrasenaUsuario($contrasenaUsuario) {
        $this->contrasenaUsuario = $contrasenaUsuario;
    }

    /*     * ************************************************************************* */

    //Convertir el obj a JSON
    /*     * ************************************************************************* */


    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
