<?php
include "conexion.php";
$productoID = $_GET['productoID'];
$productoNombre = $_GET['productoNombre'];
$productoCosto = $_GET['productoCosto'];
$productoPrecio = $_GET['productoPrecio'];
$productoStock = $_GET['productoStock'];
$sql = "UPDATE producto SET productoID = '$productoID', productoNombre = '$productoNombre',
        productoCosto = '$productoCosto', productoPrecio = '$productoPrecio', productoStock = '$productoStock'
        WHERE productoID = $productoID";

$resu = mysqli_query($conexion,$sql) or die ($sql . mysqli_error($conexion));
if($resu === TRUE){
    header("Location: ./consulta.php");
    exit;
}
?>