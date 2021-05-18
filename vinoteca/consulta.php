<html>
    <body>
    <?php include "conexion.php"; ?>
        <table>
            <h2>Lista de productos</h23>
            <td> 
                <?php
                $sql = "SELECT * FROM producto ORDER BY productoID";

                $resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));

                while ($a = mysqli_fetch_array($resu))
                {
                    ?>
                    <br>
                    <?php
                    echo $a['productoID']; 
                    echo ' - ';
                    echo $a['productoNombre'];
                    echo ' | Stock: ';
                    echo $a['productoStock']
                    ?>
                    <br>  
                <?php
                }
                ?>
            </td>
        </table>
        <br>
        <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
    </body>
</html>