<?php


require_once("../domain/Vehiculos.php");
require_once("../dao/VehiculosDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class VehiculosBo {

    private $vehiculosDao;

    public function __construct() {
        $this->vehiculosDao = new VehiculosDao();
    }

    public function getVehiculosDao() {
        return $this->VehiculosDao;
    }

    public function setVehiculosDao(VehiculosDao $vehiculosDao) {
        $this->vehiculosDao = $vehiculosDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Vehiculos $vehiculos) {
        try {
            if (!$this->vehiculosDao->exist($vehiculos)) {
                $this->vehiculosDao->add($vehiculos);
            } else {
                throw new Exception("El Vehiculos ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Vehiculos $vehiculos) {
        try {
            $this->vehiculosDao->update($vehiculos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Vehiculos $vehiculos) {
        try {
            $this->vehiculosDao->delete($vehiculos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Vehiculos $vehiculos) {
        try {
            return $this->vehiculosDao->searchById($vehiculos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Vehiculos de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->vehiculosDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class VehiculosBo
?>

