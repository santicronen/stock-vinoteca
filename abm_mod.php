<?php
if(!isset($_GET["productoID"])) exit();
$id = $_GET["productoID"];
include_once "conexion.php";
$sql = $base_de_datos->prepare("SELECT * FROM producto WHERE productoID = ?;");
$sql->execute([$id]);
$producto = $sql->fetch(PDO::FETCH_OBJ);
?>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <body class="align">
            <header class="_header">
                <img src="/vinoteca/logo_circular.png" width="150" height="150">
                <p></p>
                <h3 class="_title">MODIFICAR PRODUCTO</h3>
            </header>
        <div class="_body">
    	<form method="post" action="abm_mod_db.php">
			<label for="productoID">ID:</label><br>
			<input value="<?php echo $producto->productoID ?>" type="text" name="id" id="productoID" placeholder="Ingrese el ID del producto." required>
			<br><br>
			<label for="productoNombre">Nombre de producto:</label><br>
			<input value="<?php echo $producto->productoNombre ?>" type="text" name="nombre" id="productoNombre" placeholder="Ingrese el nombre del producto.">
			<br><br>
			<label for="productoCosto">Costo del producto:</label><br>
			<input type="text" name="costo" id="productoCosto" placeholder="Ingrese el costo del producto.">
			<br><br>
			<label for="productoPrecio">Precio del producto:</label><br>
			<input type="text" name="precio" id="productoPrecio" placeholder="Ingrese el precio del producto.">
			<br><br>
			<label for="productoStock">Stock del producto:</label><br>
			<input type="text" name="stock" id="productoStock" placeholder="Ingrese el stock del producto.">
			<br><br>
    	</form>
		<input type="submit" name="enviar" value="Enviar">
		<input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
    </div>
</body>