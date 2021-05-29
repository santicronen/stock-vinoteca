<?php 
session_start();
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<html>
    <head>
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
        <form method="get" action="detalle_venta_db.php">
			<label for="codigo">Código de producto:</label>
			<input autocomplete="off" autofocus class="form-control" name="productoID" required type="text" id="productoID" placeholder="Escribe el código">
		</form>
		<br><br>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
					<th>Total</th>
				</tr>
			</thead>
		</table>
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