<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
date_default_timezone_set ("America/Guayaquil");
$fecha = date("d-m-Y");
$user = $_SESSION["tecnoUser"];
//require_once '../../constants/sessionControlAdmin.php';
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <?php require_once '../../constants/head.html';?>
    <link rel="stylesheet" href="../../css/products.css">
    <title>Nueva Cotización</title>
</head>

<body>
<header>
    <?php include_once '../../constants/sidenav.html'; ?>
    <style>
        .row, .card-panel{
            padding: 0.3%;
        }
        .btn{
            width: 50%;
            font-size: 1.2rem;
            letter-spacing: 0.2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #button-container{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #facturar{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</header>

<main>
    <div class="container" >

        <div class="row card-panel">
            <center>
                <form class="col s12" id="addProductForm">
                    <div class="row">
                        <div class="input-field col s2">
                            <input id="addCodigo_producto"  type="text" class="validate" required>
                            <label for="addCodigo_producto">COD. PRODUCTO</label>
                        </div>
                        <div class="input-field col s4">
                            <input readonly="true" id="addNombre_producto"  type="text" class="validate" required>
                            <label for="addNombre_producto">DESCRIPCIÓN</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="addCantidad" type="number" class="validate" required>
                            <label for="addCantidad">CANTIDAD</label>
                        </div>
                        <div class="input-field col s2">
                            <input readonly="true" id="addPrecio"  type="text" class="validate" required>
                            <label for="addPrecio">PRECIO</label>
                        </div>
                        <div class="input-field col s2">
                            <input readonly="true" id="addSubtotal" type="text" class="validate" required>
                            <label for="addSubtotal">SUBTOTAL</label>
                        </div>
                        <div class="input-field col s12">
                            <button id="addProductButton" class="btn waves-effect waves-light tooltipped" data-position="left" data-tooltip="Agregar Producto" type="submit" name="addProduct">
                                AGREGAR PRODUCTO
                            </button>
                        </div>
                    </div>

                </form>
        </div>
    </div>

    </div>
    <div class="container">
        <div class="row card-panel">
            <form class="col s12" METHOD="POST" id="formQuotes" action="../../controllers/ControllerQuotes.php" enctype="multipart/form-data">
                <div class="row" id="factura">
                    <div class="input-field col s4">
                        <input  readonly="true" id="numero_factura" name="numero_factura" type="text">
                        <label for="numero_factura">Factura #</label>
                    </div>
                    <div class="input-field col s4">
                        <input readonly="true" id="fecha" name="fecha" type="text" value="<?php echo $fecha;?>" class="validate">
                        <label for="fecha">Fecha</label>
                    </div>
                    <div class="input-field col s4">
                        <input value="<?php echo $user;?>" readonly="true" id="id_vendedor" name="id_vendedor" type="text" class="validate">
                        <label for="id_vendedor">Cédula Vendedor</label>
                    </div>
                    <div class="input-field col s12">
                        <input readonly="true" id="name_vendedor" name="name_vendedor" type="text" >
                        <label for="name_vendedor">Nombres Vendedor</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="cedula_cliente" name="cedula_cliente" type="text" class="validate">
                        <label for="cedula_cliente">Cédula Cliente</label>
                    </div>
                    <div class="input-field col s4">
                        <input  id="name_cliente" name="name_cliente" type="text" class="validate">
                        <label for="name_cliente">Nombres Cliente</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="telefono_cliente" name="telefono_cliente" type="text" class="validate">
                        <label for="telefono_cliente">Telefono Cliente</label>
                    </div>
                    <div class="input-field col s2">
                        <label for="addCodigo_producto">COD. PRODUCTO</label>
                    </div>
                    <div class="input-field col s4">
                        <label for="addCodigo_producto">DESCRIPCIÓN</label>
                    </div>
                    <div class="input-field col s2">
                        <label for="addCantidad">CANTIDAD</label>
                    </div>
                    <div class="input-field col s2">
                        <label for="addPrecio">PRECIO</label>
                    </div>
                    <div class="input-field col s2">
                        <label for="addSubtotal">SUBTOTAL</label>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="row" id="price_total">
                    <div class="row" id="price_total">
                        <div class="input-field col s9">
                            <label for="addSubtotal">SUBTOTAL</label>
                        </div>
                        <div class="input-field col s3 right">
                            <input readonly="tue" id="subtotal_pagar" name="subtotal_pagar" type="text">
                        </div>
                    </div>

                    <div class="row" id="price_total">
                        <div class="input-field col s9">
                            <label for="descuento">DESCUENTO</label>
                        </div>
                        <div class="input-field col s3 right">
                            <input  id="descuento" name="descuento" type="text" value="0.00">
                        </div>
                    </div>

                    <div class="row" id="price_total">
                        <div class="input-field col s9">
                            <label for="val_descuento">VALOR DESCUENTO</label>
                        </div>
                        <div class="input-field col s3 right">
                            <input  id="val_descuento" name="val_descuento" type="text" value="0.00">
                        </div>
                    </div>

                    <div class="row" id="price_total">
                        <div class="input-field col s9">
                            <label for="addSubtotal">IVA 12%</label>
                        </div>
                        <div class="input-field col s3 right">
                            <input readonly="tue" id="iva_pagar" name="iva_pagar" type="text">
                        </div>
                    </div>

                    <div class="row" id="price_total">
                        <div class="input-field col s9">
                            <label for="addSubtotal">TOTAL A PAGAR</label>
                        </div>
                        <div class="input-field col s3 right">
                            <input readonly="tue" id="total_pagar" name="total_pagar" type="text">
                        </div>
                    </div>
                    <input  name="facturacion_validate" type="text" style="display:none;" value="true">
                </div>

                <div class="input-field col s12" id="button-container">
                    <button class="btn waves-effect waves-light" id="facturar"  type="submit" name="addProduct">
                        AGREGAR COTIZACIÓN
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<footer>

</footer>

<?php include_once '../../constants/footer.html'?>
<script src="../../js/quotes.js"></script>
</body>

</html>