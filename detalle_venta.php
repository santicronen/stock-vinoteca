<?php include 'conexion.php';
session_start();
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;

$ventaID = $_POST['ventaID'];
$ventaFecha = $_POST['ventaFecha'];
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <body class="align">
        <header class="_header">
            <img src="/vinoteca/logo_circular.png" width="150" height="150">
            <p></p>
            <h3 class="_title">PANEL DE VENTA</h3>
        </header>
        <div class="_body">
        <form method="post" action="detalle_venta_db.php">
            <label>Venta ID: <?php echo $ventaID?></label>
			<label for="producto">Producto</label>
			<select name="producto" id="productoID" style="width: 170px; height:35px; margin-top:-5px;">
                <?php
                        $sql = "SELECT * FROM producto WHERE productoBaja = 1 ORDER BY productoID";
                        $resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));

	                	while($a = mysqli_fetch_array($resu)){
	                ?>
	                	<option required value="<?php echo $a['productoID']?>"><?php echo $a['productoID'] ?> - <?php echo $a['productoNombre']; ?></option>
	                <?php
	                }
			    ?>
            </select>
            <input type="text" name="cantidad" value="1" min="1" placeholder="Cantidad" autocomplete="off" style="width: 40px; height:35px; margin-top:-5px;" required>
            <button type="submit">Agregar</button>
		</form>
        <?php
        $sql = "SELECT * FROM venta_detalle WHERE ventaID = $ventaID";
        $resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));
        ?>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
					<th>Total</th>
                    <th>Quitar</th>
				</tr>
			</thead>
            <tbody>
                <?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->total;
                ?>
                <tr>
                <td><?php echo $producto->productoID ?></td>
				<td><?php echo $producto->productoNombre ?></td>
				<td><?php echo $producto->precioVenta ?></td>
				<td><?php echo $producto->ventaCantidad ?></td>
				<td><?php echo $producto->ventaTotal ?></td>
                </tr>
                <?php } ?>
            </tbody>
		</table>
        
        <h3>Total: <?php echo $granTotal; ?></h3>

        <?php
        #$sql = "SELECT * FROM venta_detalle WHERE ventaID = $ventaID" // todo lo que vendi en ventaID, vendria de la pag anterior
        // ejecutar query

        // finalizar venta
        // otro form con button
        // pasar $ventaID?>
        <br>
        <form action="./terminarVenta.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit">Terminar venta</button>
			<button href="./cancelarVenta.php">Cancelar venta</a>
		</form>
        </div>
    </body>
</html>