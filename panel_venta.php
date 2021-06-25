<?php
include "conexion.php";
$sql = "INSERT INTO venta (ventaFecha) VALUES (NULL)";
$resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));
?>

<html>
    <head><link rel="stylesheet" href="style.css"></head>
    <body>
    <body class="align">
        <header class="_header">
            <img src="/vinoteca/logo_circular.png" width="150" height="150">
            <p></p>
            <h3 class="_title">PANEL DE VENTA</h3>
        </header>
        <div class="_body">
        <table>
            <form name="panel" action="detalle_venta.php" method="post">
                <?php 
                $sql = "SELECT * FROM venta ORDER BY ventaID DESC LIMIT 1";
                $resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));
                while ($a = mysqli_fetch_array($resu))
                {
                ?>
                <input type="text" name="ventaID" id="ventaID" value="<?php $a['ventaID'] ?>">
                <input type="text" name="ventaFecha" id="ventaFecha" value="<?php $a['ventaFecha'] ?>">
                <?php } ?>
                <tr>Cliente </tr>
                <input type="text" name="clienteNombre" required><br><br>
                <tr>Medio de pago </tr>
                <select name="medioPago">
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                    <option value="mercadopago">MercadoPago</option>
                </select><br><br>
                <input type="submit" name="enviar" id="enviar" value="Continuar" onclick="location.replace('detalle_venta.php')">
            </form>
        </table>
        <br><input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
        </div>
    </body>
</html>