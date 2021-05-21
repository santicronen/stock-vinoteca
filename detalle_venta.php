<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>    
    <body>
        <body class="align">
        <header class="_header">
            <img src="/vinoteca/logo_circular.png" width="150" height="150">
            <p></p>
            <h3 class="_title">STOCK</h3>
        </header>
        <?php
        include "conexion.php";
        ?>
        <div class="_body">
            <form method="post" action="carrito_agregar.php">
                <label for="codigo">ID </label>
                <br><input autofocus name="ID" required type="text" id="ID" placeholder="Inserta un ID">

            </form>
        <?php
        #$sql = "SELECT * FROM venta_detalle WHERE ventaID = $ventaID" // todo lo que vendi en ventaID, vendria de la pag anterior
        // ejecutar query?>

        // finalizar venta
        // otro form con button
        // pasar $ventaID
        <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
        </div>
    </body>
</html>