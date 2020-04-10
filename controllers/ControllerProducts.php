<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../constants/Conexion.php';
require_once '../models/ModelProducts.php';

class ControllerProducts
{
    private $objProducts;
    private $products;

    public function __construct()
    {
        $this->objProducts = new ModelProducts();
        $this->products = $this->objProducts;
    }

    public function setProducts($argCodigoP,$argImagenP, $argNombreP, $argDescripcionP, $argPrecioP, $argAction)
    {
        try {
            $result = $this->products->setProducts($argCodigoP,$argImagenP, $argNombreP, $argDescripcionP, $argPrecioP, $argAction);
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            if ($result != NULL) {
                return $result;
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }
    }

    public function uploadImage($argCodigo)
    {
        $formatos = array('image/jpg', 'image/pjpeg', 'image/bmp', 'image/jpeg', 'image/gif', 'image/png');
        try {
            if (in_array($_FILES["imagen_producto"]["type"], $formatos)) {
                $imagen_producto = "img_" . $argCodigo . "." . str_replace("image/", "", $_FILES['imagen_producto']["type"]);
                $x_ruta = "../images/productos/" . $imagen_producto;
                $estado_est = move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $x_ruta);
            }
        } catch (PDOException $e) {
            die("Ocurrio un Error:" . $e->getMessage());
        }

        if ($estado_est) {
            return $imagen_producto;
        } else {
            return NULL;
        }

    }

    public function findProduct($argCodProduct){

        try {
            $data = $this->products->findProduct($argCodProduct);
            return $data;
        }catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }
    }

    Public function getDataProductos($argCodigoProducto){
        try {
            return  $this->products->findProduct($argCodigoProducto);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }
}

$objProducts = new ControllerProducts();
$products = $objProducts;

if (isset($_POST)) {
    if (isset($_POST["form_action"], $_POST["form_check"])) {
        if ($_POST["form_check"] == "true") {
            extract($_POST);
            if ($_POST["form_action"] == "1") {
                $uploadImg = $products->uploadImage($codigo_producto);
                if ($uploadImg != NULL) {
                    $message = $products->setProducts($codigo_producto, $uploadImg, $nombre_producto, $descripcion_producto, $precio,$form_action);
                    if ($message != NULL){
                        echo $message;
                    }else{
                        echo "0";
                    }
                } else {
                    echo "ERROR AL SUBIR LA IMAGEN";
                }
            } elseif ($_POST["form_action"] == "2") {
                $uploadImg = $products->uploadImage($codigo_producto);
                if ($uploadImg != NULL) {
                    $message = $products->setProducts($codigo_producto, $uploadImg, $nombre_producto, $descripcion_producto, $precio,$form_action);
                    if ($message != NULL){
                        echo $message;
                    }else{
                        echo "0";
                    }
                } else {
                    echo "ERROR AL ACTUALIZAR LA IMAGEN";
                }
            } elseif ($_POST["form_action"] == "3") {

            }
        }
    }

    if(isset($_POST["findProducts"])) {
        if ($_POST["findProducts"] == "true") {
            $result = $products->findProduct($_POST["codProduct"]);
            echo json_encode($result);
        }
    }
}


if (isset($_GET)){
    if (isset($_GET["get_product"],$_GET["codigo_producto"])){
        if ($_GET["get_product"] == 1){
            extract($_GET);
            echo json_encode($products->getDataProductos($codigo_producto));
        }
    }
}



