<?php


require_once("../domain/Facturas.php");
require_once("../dao/FacturasDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class FacturasBo {

    private $facturasDao;

    public function __construct() {
        $this->facturasDao = new FacturasDao();
    }

    public function getFacturasDao() {
        return $this->facturasDao;
    }

    public function setFacturasDao(FacturasDao $facturasDao) {
        $this->facturasDao = $facturasDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Facturas $facturas) {
        try {
            if (!$this->facturasDao->exist($facturas)) {
                $this->facturasDao->add($facturas);
            } else {
                throw new Exception("El Facturas ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Facturas $facturas) {
        try {
            $this->facturasDao->update($facturas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Facturas $facturas) {
        try {
            $this->facturasDao->delete($facturas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Facturas $facturas) {
        try {
            return $this->facturasDao->searchById($facturas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Facturas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->facturasDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class FacturasBo
?>

