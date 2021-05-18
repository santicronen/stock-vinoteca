<html>
    <body>
        <?php
        include "conexion.php";
        ?>
        <form name="venta" action="venta_baja.php" method="get">
            <h2>Panel de Venta</h2>
            <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
            <table>
                <tr>
                    <td>Codigo de producto</td>
                    <td><input type="text" name="productoID"></td>
                </tr>
                <tr>
                    <td>Cantidad</td>
                    <td><input type="text" name="ventaCantidad"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="enviar" value="Enviar"></td>
                </tr>
            </table>
        </form>
    </body>
</html>