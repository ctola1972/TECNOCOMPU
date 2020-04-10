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

        <style>
            main {
                display: flex;
                justify-content: center;
                margin-top: 0%;
                align-items: center;
            }

            .slider {
                width: 95%;
                margin-top: 0%;
            }

            .slides {
                display: flex;
                justify-content: center;
            }

            #img-slider {
                max-width: 100%;
                max-height: 100%;
            }
        </style>
        <div class="navbar-fixed">
            <?php require_once '../../constants/sidenav.html'; ?>
        </div>
    </header>

    <main>
        <div class="slider">
            <ul class="slides">
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/asus.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/benq.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/canon.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/dlink.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/eset.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/ibm.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/intel.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/lexmark.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/lg.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/pngocean.com.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/nokia.png"></li>
                <li><img id="img-slider" width="100%" max-height="400px" src="../../images/logos/samsung.png"></li>
            </ul>
        </div>

    </main>
</body>

<footer>
    <?php require_once '../../constants/footer.html'; ?>
</footer>


</html>