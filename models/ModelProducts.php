<?php

class ModelProducts
{
    private $objConexion;
    private $conexion;
    private $stmt;
    private $query;

    public function __construct()
    {
        $this->objConexion = new Conexion();
        $this->conexion = $this->objConexion->get_Conexion();
        $this->stmt = "";
        $this->query = "";
    }

    public function setProducts($argCodigoP,$argImagenP, $argNombreP, $argDescripcionP, $argPrecioP, $argAction)
    {

        try {
            $this->query = "CALL TECNOCOMPU.PRODUCTOS(:CODIGO,:IMAGEN,:NOMBRE,:DESCRIPCION,:PRECIO,:ACTION, @MENSAJE)";
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":CODIGO", $argCodigoP, PDO::PARAM_STR, 200);
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":IMAGEN", $argImagenP, PDO::PARAM_STR, 200);
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":NOMBRE", $argNombreP, PDO::PARAM_STR, 200);
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":DESCRIPCION", $argDescripcionP, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":PRECIO", $argPrecioP);
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":ACTION", $argAction, PDO::PARAM_INT, 1);
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $this->stmt->closeCursor();
                    $this->query = null;
                    $this->query = "SELECT @MENSAJE AS MENSAJE";
                    $this->stmt = $this->conexion->query($this->query);
                    $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result != NULL) {
                        return $result[0]["MENSAJE"];
                    } else {
                        return NULL;
                    }

                } else {
                    return NULL;
                }
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

    }

    public function findProduct($argCodProducts){
        try {
            $this->query = "SELECT * FROM TECNOCOMPU.PRODUCTOS WHERE COD_PRDUCTO = :CODPRODUCT";
        }catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        }catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":CODPRODUCT",$argCodProducts,PDO::PARAM_STR,200);
        }catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }


        try {
           if(isset($this->stmt)){
               if($this->stmt->execute()){
                   $data = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

                   if($data != NULL){
                       return $data;
                   }else{
                       return NULL;
                   }
               }
           }
        }catch (PDOException $e) {
            die("¡Error! : " . $e->getMessage());
        }

    }

}