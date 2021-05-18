<html>
    <body>
        <?php include "conexion.php"; ?>

        <form name=alta action="abm_alta_db.php" method="get">
            <h2>ALTA DE PRODUCTO</h2>
            <table>
                <tr>
                    <td>Codigo de producto</td>
                    <input type="number" name=productoID>
                    <br><br>

                    <td>Nombre de producto</td>
                    <input type="text" name=productoNombre>
                    <br><br>

                    <td>Empresa de producto</td>
                    CONSULTA
                    <select name="empresaID">
                        <?php
                        $sql = "SELECT * FROM empresa ORDER BY empresaID";

                        $resu = mysqli_query($conexion,$sql) or die ($sql . mysqli_error($conexion));

                        while($a = mysqli_fetch_array($resu))
                        ?>
                        {
                                <option value='<?php echo $a['empresaID']; ?>'><?php echo $a['empresaNombre']; ?></option>
                    </select>
                </tr>
                <tr>
                    <td><input type="submit" name="enviar" value="Enviar"></td>
                </tr>
                <script>
                    alert("Se agregó un nuevo producto.");
                    location.replace("abm.html");
                </script>
            </table>
        </form>
    </body>
</html>