<?php
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php require_once '../../constants/head.html'; ?>
    <link rel="stylesheet" href="../../css/products.css">
    <title>Inicio</title>
</head>

<body>
    <header>
        <?php require_once '../../constants/sidenav.html'; ?>
    </header>

    <main>
        <div class="section container">
            <div class="row card-panel">
                <div class="header-card">
                    <div class="center"> <span>Productos</span></div>
                </div>

                <div class="boxes">

                    <div class="box-card">
                        <a href="./addProducts.php">
                            <div class="img-box"><img src="../../images/addProduct.png"></div>
                        </a>
                        <a href="./addProducts.php">
                            <div class="title-indicator"><span>AGREGAR PRODUCTOS</span></div>
                        </a>
                    </div>

                    <div class="box-card">
                        <a href="./updateProducts.php">
                            <div class="img-box"><img src="../../images/addProduct.png"></div>
                        </a>
                        <a href="./updateProducts.php">
                            <div class="title-indicator"><span>ACTUALIZAR PRODUCTOS</span></div>
                        </a>
                    </div>


                    <div class="box-card">
                        <a href="./deleteProducts.php">
                            <div class="img-box"><img src="../../images/addProduct.png"></div>
                        </a>
                        <a href="./deleteProducts.php">
                            <div class="title-indicator"><span>ELIMINAR PRODUCTOS</span></div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </main>
</body>

<footer>
    <?php require_once '../../constants/footer.html'; ?>
</footer>


</html>