<?php
include "conexion.php";
session_start();

$ventaTotal = $_POST['ventaTotal'];
$ventaID = $_POST['ventaID'];
$ventaCantidad = $_POST['ventaCantidad'];
$productoID = $_POST['productoID'];

$sql = "UPDATE venta SET ventaTotal = $ventaTotal WHERE ventaID = $ventaID";
$resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));

$sql = "UPDATE producto SET productoStock = productoStock - $ventaCantidad WHERE productoID = $productoID";
$resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));


unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

?>
<script>
    alert("Venta terminada.");
    location.replace("index.html");
</script>