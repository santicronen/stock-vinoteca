<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>    
    <body>
        <body class="align">
        <header class="_header">
            <img src="/vinoteca/logo_circular.png" width="150" height="150">
            <p></p>
            <h3 class="_title">STOCK VINOTECA</h3>
        </header>

        <?php include "conexion.php"; ?>
        <div class="_body">
        <form name=alta action="abm_alta_db.php" method="get">
            <h3 class="_title">ALTA DE PRODUCTO</h3>
                <label for="var">Código de producto</label><br>
                <input type="number" id="var" name=productoID>
                <br>

                <label for="var">Nombre de producto</label><br>
                <input type="text" id="var" name=productoNombre required>
                <br>                
                <label for="var">Empresa</label><br>

                <select name="empresaID">
                    <?php
                    $sql = "SELECT * FROM empresa ORDER BY empresaID ASC";              
                    $resu = mysqli_query($conexion,$sql) or die ($sql . mysqli_error($conexion));               
                    while($a = mysqli_fetch_array($resu))
                    {
                    ?>
                            <option value='<?php echo $a['empresaID']; ?>'><?php echo $a['empresaNombre']; ?></option>
                    <?php
                }?>
                </select>

                <br><label for="var">Costo de producto</label><br>
                    <input type="number" id="var" name=productoCosto>
                

                <br><label for="var">Precio de producto</label><br>
                    <input type="number" id="var" name=productoPrecio>

                <br><label for="var">Stock inicial de producto</label><br>
                    <input type="number" id="var" name=productoStock>
                    

                <br><br><input type="submit" name="enviar" value="Enviar">
                <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('abm.html');">
        </form>
        </div>
    </body>
</html>