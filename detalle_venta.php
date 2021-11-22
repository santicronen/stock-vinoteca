<?php include 'conexion.php';
session_start();
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;

$sql = "SELECT ventaID FROM venta ORDER BY ventaID DESC LIMIT 1";
$resu = mysqli_query($conexion, $sql);
?>

<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <body class="align">
        <header class="_header">
            <img src="/vinoteca/css/logo_circular.png" width="150" height="150">
            <p></p>
            <h3 class="_title">PANEL DE VENTA</h3>
        </header>
        <div class="_body">
        <form method="post" action="detalle_venta_db.php">
            <?php 
            while ($a = mysqli_fetch_array($resu))
            { ?>
            <label>Venta ID: <?php echo $a['ventaID']?></label><br><br>
            <?php $ventaID = $a['ventaID']; ?>
            
            <input type="hidden" name="ventaID" value="<?php echo $a['ventaID'] ?>"
            <?php } ?>
			<label for="producto">Producto</label>
			<select name="productoID" id="productoID" style="width: 170px; height:35px; margin-top:-5px;">
                <?php
                        $sql = "SELECT * FROM producto WHERE productoBaja = 0 ORDER BY productoID";
                        $resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));

	                	while($a = mysqli_fetch_array($resu)){
	                ?>
	                	<option required value="<?php echo $a['productoID']?>"><?php echo $a['productoID'] ?> - <?php echo $a['productoNombre']; ?></option>
	                <?php
	                }
			    ?>
            </select>
            <input type="text" name="ventaCantidad" value="1" min="1" placeholder="Cantidad" autocomplete="off" style="width: 40px; height:35px; margin-top:-5px;" required>
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
				</tr>
			</thead>
            <tbody>
                <?php
				#$granTotal += $producto->total;
                $sql = "SELECT v.productoID, p.productoNombre, p.productoPrecio, v.ventaCantidad FROM venta_detalle v INNER JOIN producto p 
                ON v.productoID = p.productoID WHERE v.ventaID = $ventaID";
                $resu = mysqli_query($conexion, $sql);
                
                while($a = mysqli_fetch_array($resu)){
                    $total = $a['ventaCantidad'] * $a['productoPrecio'];
                ?>
                <tr>
                <td><?php echo $a['productoID'] ?></td>
                <?php
                    $productoID = $a['productoID'];
                ?>
                <td><?php echo $a['productoNombre'] ?></td>
                <td><?php echo $a['productoPrecio'] ?></td>
                <?php
                    $ventaCantidad = $a['ventaCantidad'];
                ?>
                <td><?php echo $a['ventaCantidad'] ?></td>
                <td><?php echo $total ?></td>
                </tr>
                <?php $granTotal = $granTotal + $total; 
                } ?>
            </tbody>
		</table>
        
        <h3>Total: $<?php echo $granTotal; ?></h3>
        <br>
        <form action="./terminar_venta.php" method="POST">
            <input name="productoID" type="hidden" value="<?php echo $productoID ?>">
			<input name="ventaTotal" type="hidden" value="<?php echo $granTotal;?>">
            <input name="ventaID" type="hidden" value="<?php echo $ventaID ?>">
            <input name="ventaCantidad" type="hidden" value="<?php echo $ventaCantidad ?>">
			<button type="submit">Terminar venta</button>
			<button href="./cancelar_venta.php">Cancelar venta</a>
		</form>
        </div>
    </body>
</html>