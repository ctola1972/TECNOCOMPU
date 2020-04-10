<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once './constants/sessionControl.php';
?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">

<head>
    <?php require_once './constants/head.html'; ?>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/products.css">
    <link id="toast-status" rel="stylesheet" href="./css/toast-red.css">
</head>

<body class="text-center">
    <header>
        <style>
            main {
                padding: 0;
                width: 100%;
                display: flex;
                justify-content: center;
                height: 100%;
                align-items: center;
                margin: 0;
            }

            #form-find {
                margin-top: 0;
                width: 30%;
            }

            input {
                color: #2D3A54;
                background-color: #505488;
            }

            .img-box {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }


            @media only screen and (min-width: 332px) and (max-width: 798px) {

                #form-find {
                    width: 80%;
                    margin-top: 0%;
                }
            }
        </style>
    </header>


    <main>
        <div class="section container" id="form-find">
            <div class="row card-panel">
                <div class="header-card">
                    <div class="center"> <span>Login</span></div>

                </div>

                <div class="img-box">
                    <img src="./images/logo_tecno.png">
                </div>

                <div class="boxes">
                    <form action="./controllers/ControllerLogin.php" method="POST" enctype="multipart/form-data" id="formLogin" class="col s12">
                        <div class="center">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input autocomplete="off" required="true" id="usuario" name="usuario" type="text" class="validate">
                                    <label id="select-input" for="usuario">USUARIO * </label>
                                </div>
                                <div class="input-field col s12">
                                    <input required="true" id="password" name="password" type="password" class="validate">
                                    <label id="select-input" for="password">CONTRASEÑA * </label>
                                </div>

                                <div class="input-field col s12">
                                    <button style="background-color: #00B7D4;" type="submit" class="btn waves-effect waves-light" name="action" id="action">Iniciar Sesión
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>


    <?php require_once './constants/footer.html'; ?>
    <script src="./js/login.js"></script>
</body>

</html>