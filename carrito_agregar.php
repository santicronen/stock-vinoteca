<?php

$codigo = $_POST["productoID"];
include_once "conexion.php";
$sql = $conexion->prepare("SELECT * FROM producto WHERE productoID = ? LIMIT 1;");
$sql->execute([$codigo]);

# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ./panel_venta.php?");
    exit;
}

session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
$sql = "SELECT * FROM venta_detalle WHERE ventaID = $ventaID";

$resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));
while($a = mysqli_fetch_array($resu))

if ($indice === false) {
    $cantidad = 1;
    $total;
    array_push($_SESSION["carrito"], $producto);
} 

else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;

    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;
}
header("Location: ./panel_venta.php");
