<?php
include "conexion.php";
$productoID = $_GET['productoID'];
$sql = "UPDATE producto SET productoBaja = 0 WHERE productoID = $productoID";
$resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));
?>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <body class="align">
            <header class="_header">
                <img src="/vinoteca/logo_circular.png" width="150" height="150">
                <p></p>
                <h3 class="_title">ELIMINAR PRODUCTO</h3>
            </header>
        <div class="_body">
        <label>Producto eliminado con exito.</label>
        <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
    </div>
</body>