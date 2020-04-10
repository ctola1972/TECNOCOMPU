<?php
class ModelQuotes
{
    private $objConexion;
    private $conexion;
    private $query;
    private $stmt;

    public function __construct()
    {
        $this->objConexion = new Conexion();
        $this->conexion = $this->objConexion->get_Conexion();
    }

    public function getNumQuotes()
    {
        try {
            $this->query = "SELECT MAX(ID) AS CODIGO FROM TECNOCOMPU.COTIZACIONES";
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $data = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($data[0]["CODIGO"] != NULL) {
                        $codQuote = "TEC-00" . $data[0]["CODIGO"];
                    } else {
                        $codQuote = "TEC-001";
                    }

                    return $codQuote;
                } else {
                    return NULL;
                }
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getCodTransaction()
    {
        try {
            $this->query = "SELECT MAX(ID) AS CODIGO FROM TECNOCOMPU.ITEMS_COTIZACIONES";
            $this->stmt = $this->conexion->query($this->query);
            $codigo = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($codigo[0]["CODIGO"] != NULL) {
                $newCod = "TEC-00" . $codigo[0]["CODIGO"];
                return $newCod;
            } else {
                $newCod = "TEC-001";
                return $newCod;
            }
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }
    }

    public function setNewTransaction($argCodTransaction, $argCantidad, $argCodProducto)
    {
        try {
            $this->query = "CALL TECNOCOMPU.CREATE_NEW_TRANSACTION(:COD_TRANSACTION,:CANTIDAD,:COD_PRODUCTO,@ESTADO)";
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }


        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_TRANSACTION", $argCodTransaction, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":CANTIDAD", $argCantidad, PDO::PARAM_INT, 11);
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_PRODUCTO", $argCodProducto, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }


        if (isset($this->stmt)) {
            if ($this->stmt->execute()) {
                $this->stmt->closeCursor();
                $this->query = null;
                $this->query = "SELECT @ESTADO AS ESTADO";
                $this->stmt = null;
                $this->stmt = $this->conexion->query($this->query);
                $estatus = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($estatus[0]["ESTADO"] == 1) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }
}
