<?php
?>

<!DOCTYPE HTML>
<html>
<head>
    <?php require_once '../../constants/head.html';?>
    <link rel="stylesheet" href="../../css/products.css">
    <title>Agregar Productos</title>
</head>

<body>
<header>
    <?php require_once '../../constants/sidenav.html';?>
</header>

<main>
    <div class="section container" id="form-find">

        <div class="row card-panel">
            <div class="header-card">
                <div class="center"> <span>Buscar Productos</span></div>

            </div>

            <div class="boxes">
                <form action="../../controllers/ControllerProducts.php" method="POST" enctype="multipart/form-data" id="update-products-form" class="col s12">
                    <div class="center">
                        <div class="row">
                            <div class="input-field col s12">
                                <input onkeypress="return soloMail(event)";  id="codProduct" name="codProduct" type="text" required class="validate">
                                <label for="codProduct">Código del Producto</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="findProducts" name="findProducts" type="text" value="true" style="display: none;">

                            </div>

                            <div class="input-field col s12" style="display: flex; justify-content: center;">
                                <button class="btn waves-effect waves-light" type="submit" name="action" id="button-submit">BUSCAR
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="section container" id="form-up" style="display: none;">

        <div class="row card-panel">
            <div class="header-card">
                <div class="center"> <span>Actualizar Productos</span></div>
            </div>

            <div class="boxes">
                <form action="../../controllers/ControllerProducts.php" method="POST" enctype="multipart/form-data" id="agregar_productos_form" class="col s12">
                    <div class="center">
                        <div class="row">
                            <div class="input-field col s6">
                                <input onkeypress="return soloMail(event)"; onpaste="return false"  id="codigo_producto" name="codigo_producto" type="text" required class="validate">
                                <label for="codigo_producto">Código del Producto</label>
                            </div>
                            <div class="file-field input-field col s6">
                                <div class="btn" id="file">
                                    <span><i class="material-icons">attachment</i></span>
                                    <input type="file" required name="imagen_producto">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-field col s4">
                                <input onkeypress="return soloMail(event)"; onpaste="return false" required  id="nombre_producto" name="nombre_producto" type="text" class="validate">
                                <label for="nombre_producto">Nombre del Producto</label>
                            </div>
                            <div class="input-field col s4">
                                <input onkeypress="return soloMail(event)"; onpaste="return false" required  id="descripcion_producto" name="descripcion_producto" type="text" class="validate">
                                <label for="descripcion_producto">Descripción del Producto</label>
                            </div>
                            <div class="input-field col s4">
                                <input onpaste="return false" onkeypress="return soloPrecios(event);" required  id="precio" name="precio" type="text" class="validate">
                                <label for="precio">Precio del Producto</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="form_check" name="form_check" value="true" type="hidden">
                                <input id="form_check" name="form_action" value="2" type="hidden">

                            </div>
                            <div class="input-field col s12" style="display: flex; justify-content: center;">
                                <button class="btn waves-effect waves-light" type="submit" name="action" id="button-submit">AGREGAR PRODUCTO
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<div class="gifLoader">
    <img src="../../images/738.svg">
</div>
<footer>
    <?php require_once '../../constants/footer.html';?>
</footer>
<script src="../../js/products.js"></script>
<script src="../../js/inputs-validation.js"></script>
<script src="../../js/updateProducts.js"></script>
</body>

</html>


