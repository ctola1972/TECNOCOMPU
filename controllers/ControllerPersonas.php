<?php
require_once '../constants/Conexion.php';
require_once '../models/ModelPersonas.php';
class ControllerPersonas{
    private $objModelPersonas;
    private $modelPersonas;

    public function __construct()
    {
        $this->objModelPersonas = new ModelPersonas();
        $this->modelPersonas = $this->objModelPersonas;
    }

    public function getNamesVendedor($argCedula){
        try {
            $result = $this->modelPersonas->getNombresVendedor($argCedula);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            if ($result != NULL){
                return $result;
            }else{
                return "ERROR AL BUSCAR EL NOMBRE";
            }
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }
    }
}

$objControllerPersonas = new ControllerPersonas();
$controllerPersonas = $objControllerPersonas;

if (isset($_GET)){
    if (isset($_GET["id_vendedor"])){
        echo $result = $controllerPersonas->getNamesVendedor($_GET["id_vendedor"]);
    }
}


