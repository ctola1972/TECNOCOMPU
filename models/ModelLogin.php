<?php
class ModelLogin
{
    private $objConexion;
    private $conexion;
    private $query;
    private $stmt;

    public function __construct()
    {
        $this->objConexion = new Conexion();
        $this->conexion = $this->objConexion->get_Conexion();
        $this->query = "";
    }

    public function loginControlM($usuario, $password)
    {


        try {
            $this->query = "SELECT TECNOCOMPU.FUNC_LOGIN_VERIFY(:_USER,:_PASSWORD)";
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error") . $e->getMessage();
        }

        try {
            $this->stmt->bindParam(':_USER', $usuario, PDO::PARAM_STR, 4000);
            $this->stmt->bindParam(':_PASSWORD', $password, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error") . $e->getMessage();
        }

        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $data = $this->stmt->fetch();
                    $estatus = $data["TECNOCOMPU.FUNC_LOGIN_VERIFY('" . $usuario . "','" . $password . "')"];
                    $this->stmt = null;
                    unset($this->stmt);
                    unset($usuario, $password, $data);
                    return $estatus;
                } else {
                    $this->stmt = null;
                    unset($this->stmt);
                    unset($usuario, $password);
                    return "null";
                }
            }
        } catch (PDOException $e) {
            die();
        }
    }

    public function getTypeUser($argUsuario)
    {
        try {
            $this->query = "SELECT TIPO FROM TECNOCOMPU.USUARIOS WHERE USUARIO = :_USUARIO";
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error") . $e->getMessage();
        }

        try {
            $this->stmt->bindParam(':_USUARIO', $argUsuario, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error") . $e->getMessage();
        }

        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $data = $this->stmt->fetch();
                    $estatus = $data["TIPO"];
                    $this->stmt = null;
                    unset($this->stmt);
                    unset($argUsuario, $data);
                    return $estatus;
                } else {
                    $this->stmt = null;
                    unset($this->stmt);
                    unset($argUsuario);
                    return 0;
                }
            }
        } catch (PDOException $e) {
            die();
        }
    }
}