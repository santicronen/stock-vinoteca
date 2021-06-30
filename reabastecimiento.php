<?php include "conexion.php"; ?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>    
    <body>
        <body class="align">
        <header class="_header">
            <img src="/vinoteca/logo_circular.png" width="150" height="150">
            <p></p>
            <h3 class="_title">REABASTECIMIENTO</h3>
        </header>
        <div class="_body"> 

        <form action="reabastecimiento_suma.php" method="post">
            <h2>Panel de Reabastecimiento</h2>
            <table>
                <tr>
                    <td>Producto</td>
                    <td><select name="productoID" id="productoID" style="width: 170px; height:35px; margin-top:-5px;">
                <?php
                        $sql = "SELECT * FROM producto WHERE productoBaja = 1 ORDER BY productoID";
                        $resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));

	                	while($a = mysqli_fetch_array($resu)){
	                ?>
	                	<option id="productoID" name="productoID" value="<?php echo $a['productoID']?>"><?php echo $a['productoID'] ?> - <?php echo $a['productoNombre']; ?></option>
	                <?php
	                }
			    ?>
                </td>
            </select>
                </tr>
                <tr>
                    <td>Cantidad</td>
                    <td><input type="text" id="productoStock" name="productoStock"></td>
                </tr>
            </table><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
        </div>
    </body>
</html>