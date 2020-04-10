<?php
session_start();
if (isset($_GET["login"])){
    if ($_GET["login"] == "true"){
        if (isset($_SESSION)) {
            if (isset ($_SESSION["tecnoUser"])) {
                if ($_SESSION['tecnoUserType'] == 1) {
                    header("location: ../views/administrator/");
                } elseif ($_SESSION["tecnoUserType"] == 2) {
                    header("location: ../views/assistant/");
                }
            }
        }
    }
}
if (empty($_GET["login"])) {
    if (isset($_SESSION)) {
        if (isset ($_SESSION["tecnoUser"])) {
            if ($_SESSION['tecnoUserType'] == 1) {
                header("location: ./views/administrator/");
            } elseif ($_SESSION["tecnoUserType"] == 2) {
                header("location: ./views/assistant/");
            }
        }
    }
}