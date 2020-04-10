<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../constants/Conexion.php';
require_once '../models/ModelLogin.php';

class ControllerLogin
{
    public function getLogin($usuario, $password)
    {
        $objLoginM = new ModelLogin();
        $control = $objLoginM->LoginControlM($usuario, $password);
        if ($control === '1') {
            session_set_cookie_params(86400);
            ini_set('session.gc_maxlifetime', 86400);
            session_start();
            $_SESSION['tecnoUser'] = (string)$usuario;
            $tipoUsuario = $objLoginM->getTypeUser($usuario);
            $_SESSION['tecnoUserType'] = $tipoUsuario;
            return 1;
        } else {
            return 0;
        }
    }
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];
if (empty($usuario) || empty($password)) {
    echo 2;
} else {
    if (isset($usuario) && isset($password)) {
        $objLoginC = new ControllerLogin();
        echo $status = $objLoginC->getLogin($usuario, $password);
    } else {
        echo 0;
    }
}