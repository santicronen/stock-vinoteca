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
            // generar VENTAID CONSULTA
            <form name="panel" action="detalle_venta.php" method="get">
                <tr>Fecha </tr>
                <input type="date" name="fecha" required><br><br>
                <tr>Cliente </tr>
                <input type="text" name="nombre_cliente" required><br><br>
                <tr>Medio de pago </tr>
                <select name="medio_pago">
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                    <option value="mercadopago">MercadoPago</option>
                </select><br><br>
            </form>
        </table>
        <input type="submit" name="venta" value="Continuar" onclick="location.replace('detalle_venta.php')">
        <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
        </div>
    </body>
</html>