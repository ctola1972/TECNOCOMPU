<?php

class Conexion
{
    public function __construct()
    {
    }

    private $host = "3.14.82.157"; // variable para definir el host
    private $db = "TECNOCOMPU"; // variable para definir la base de datos en la que vamos a trabajar
    private $user = "jszambranor"; // variable para definir el usuario que usaremos para ejecutar las consultas en la base de datos
    private $pass = "#passwordJszr2020"; // variable para definir la contraseña del usuario para mysql_server
    private $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    private function conexion() // nombre de la funcion para obtener la conexion es de tipo privada
    {
        try { // try para detectar errores en la conexion

            $con = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass, $this->opciones); // linbea de codigo para establecer la conexion al servidor de base d edatos
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) { // catch sirve ṕara obtener el tipo d error si llegara a proceder errores en la conexion
            echo "¡Error!" . " " . $e->getMessage() . "<br>"; // se imprime el tipo d error gracias a la funcion getMessage()
            $con = null; // establecemos la conexion en nulo
            die(); // el programa se detiene
        }
        try {
            if (!isset($con)) { // preguntamos si nuestra variable de conexion es nulla
                echo "¡Error!" . " " . "<br>"; // si fuera nula imprmimos el mensaje que lo indique
                $con = null;
                die();
            } else { // si la conexion se establece ejecutamos el codigo siguiente
                return $con; // retornamos la varuable de conexion
            }
        } catch (PDOException $e) {
            echo "¡Error!" . " " . $e->getMessage() . "<br>";
            $con = null;
            die();
        }
    }

    public function get_Conexion()
    {
        return $this->conexion();
    }
}
