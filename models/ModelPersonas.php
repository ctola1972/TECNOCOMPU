<?php
class ModelPersonas{
    private $objConexion;
    private $conexion;

    public function __construct()
    {
        $this->objConexion = new Conexion();
        $this->conexion = $this->objConexion->get_Conexion();
    }


    public function getNombresVendedor($argCedula){
        try {
            $this->query = "SELECT CONCAT(PRIMER_NOMBRE,' ',SEGUNDO_NOMBRE,' ',PRIMER_APELLIDO,' ',SEGUNDO_APELLIDO) AS NOMBRES FROM TECNOCOMPU.PERSONAS WHERE CEDULA = :CEDULA";
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":CEDULA",$argCedula,PDO::PARAM_STR,13);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            if (isset($this->stmt)){
                if ($this->stmt->execute()){
                    $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result != NULL){
                        return $result[0]["NOMBRES"];
                    }else{
                        return NULL;
                    }
                }else{
                    return NULL;
                }
            }else{
                return NULL;
            }
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

    }
}