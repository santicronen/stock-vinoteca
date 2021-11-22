<?php
include_once "conexion.php";
?>

<head>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<body class="align">
		<header class="_header">
			<img src="/vinoteca/css/logo_circular.png" width="150" height="150">
			<p></p>
			<h3 class="_title">MODIFICAR PRODUCTO</h3>
		</header>
        <div class="_body">
			<form namemethod="POST" action="abm_mod_db.php">
				<?php
				$productoID = $_GET['productoID'];
				$sql = "SELECT * FROM producto WHERE productoID = $productoID";
				$resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));
				while($a = mysqli_fetch_array($resu))
			{?>
			<label for="productoID">ID:</label><br>
			<input value="<?php echo $a['productoID'] ?>" type="text" name="productoID" id="productoID" placeholder="Ingrese el ID del producto." required>
			<br><br>
			<label for="productoNombre">Nombre de producto:</label><br>
			<input value="<?php echo $a['productoNombre'] ?>" type="text" name="productoNombre" id="productoNombre" placeholder="Ingrese el nombre del producto.">
			<br><br>
			<label for="productoCosto">Costo del producto:</label><br>
			<input value="<?php echo $a['productoCosto'] ?>" type="text" name="productoCosto" id="productoCosto" placeholder="Ingrese el costo del producto.">
			<br><br>
			<label for="productoPrecio">Precio del producto:</label><br>
			<input value="<?php echo $a['productoPrecio'] ?>" type="text" name="productoPrecio" id="productoPrecio" placeholder="Ingrese el precio del producto.">
			<br><br>
			<label for="productoStock">Stock del producto:</label><br>
			<input value="<?php echo $a['productoStock'] ?>" type="text" name="productoStock" id="productoStock" placeholder="Ingrese el stock del producto.">
			<br><br>
			<?php } ?>
			<input type="submit" name="enviar" value="Enviar">
    	</form>
		<input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
    </div>
</body>