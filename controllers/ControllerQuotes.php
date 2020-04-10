<?php
require_once '../constants/Conexion.php';
require_once '../models/ModelQuotes.php';
class ControllerQuotes{
    private $objModelQuotes;
    private $modelQuotes;

    public function __construct()
    {
        $this->objModelQuotes = new ModelQuotes();
        $this->modelQuotes = $this->objModelQuotes;
    }

    public function getNumQuotes(){
        try {
            $result = $this->modelQuotes->getNumQuotes();
            if ($result != NULL){
                return $result;
            }else{
                return NULL;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getNewTransaction(){
        try {
            $estatus = $this->modelQuotes->getCodTransaction();
            if ($estatus != NULL){
                return $estatus;
            }else{
                return NULL;
            }
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }
    }

    public function setNewTransaction($argCodTransaction,$argCantidad,$argCodProducto){
        try {
            $estatus = $this->modelQuotes->setNewTransaction($argCodTransaction,$argCantidad,$argCodProducto);
            if ($estatus == 1){
                return 1;
            }else{
                return 0;
            }
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

    }
}

$objControllerQuote = new ControllerQuotes();
$controllerQuote = $objControllerQuote;

if (isset($_GET)){

    if ($_GET["quotes"] == 1){
        $result = $controllerQuote->getNumQuotes();
        echo $result;
    }
}

if(isset($_POST)){
    // var_dump($_POST);
    if (isset($_POST["facturacion_validate"]) == "true"){
        extract($_POST);
        $cont = (int)0;
        $codTransactionGet = $controllerQuote->getNewTransaction();

        if ($codTransactionGet != NULL) {
            foreach ($codigo_producto as $item) {
                $status = $controllerQuote->setNewTransaction($codTransactionGet,$cantidad[$cont],$codigo_producto[$cont]);

                if ($status == 0){
                    break;
                }else{
                    if ($status == 1){
                        $cont++;
                    }
                }
            }

            if ($cont > 0){
                $result = $controllerQuote->setNewFactura($numero_factura,$id_vendedor,$cedula_cliente,$name_cliente,$telefono_cliente,$codTransactionGet);
                if ($result == 1){
                    echo "1";
                }else{
                    echo "0";
                }
            }
        }
    }

}
