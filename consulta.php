<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <body class="align">
        <header class="_header">
            <img src="/vinoteca/logo_circular.png" width="150" height="150">
            <p></p>
            <h3 class="_title">LISTA DE PRODUCTOS</h3>
        </header>
        <div class="_body">
    <?php include "conexion.php"; ?>
        <table style="width: auto">
        
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
            
                <?php
                $sql = "SELECT * FROM producto ORDER BY productoID";

                $resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));

                while ($a = mysqli_fetch_array($resu))
                {
                    ?><tr>
                    <td><?php echo $a['productoID'];?></td>
                    <td><?php echo $a['productoNombre'];?></td>
                    <td><?php echo $a['productoCosto'];?></td>
                    <td><?php echo $a['productoPrecio'];?></td>
                    <td><?php echo $a['productoStock'];?></td>
                    <td><input type="button" name="modificar" value="Modificar" onclick="location.replace('amb_mod.php');"</td>
                    <td><input type="button" name="eliminar" value="Eliminar" onclick="location.replace('amb_baja.php');"</td>
                </tr><?php
                }
                ?>
            
        </table><br>
        <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
        </div>
        <br>
    </body>
</html>