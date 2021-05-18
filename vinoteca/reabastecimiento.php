<html>
    <body>
        <?php
        include "conexion.php";
        ?>
        <form name="reabastecimiento" action="reabastecimiento_suma.php" method="get">
            <h2>Panel de Reabastecimiento</h2>
            <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
            <table>
                <tr>
                    <td>Codigo de producto</td>
                    <td><input type="text" name="productoID"></td>
                </tr>
                <tr>
                    <td>Cantidad</td>
                    <td><input type="text" name="productoStock"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="enviar" value="Enviar"></td>
                </tr>
            </table>
        </form>
    </body>
</html>