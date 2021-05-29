<?php
if (!isset($_POST["productoID"])) {
    return;
}

$codigo = $_POST["productoID"];
include_once "conexion.php";
$sql = $conexion->prepare("SELECT * FROM producto WHERE productoID = ? LIMIT 1;");
$sql->execute([$codigo]);
$producto = $sql->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ./panel_venta.php?");
    exit;
}
# Si no hay existencia...
if ($producto->productoStock < 1) {
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
if ($indice === false) {
    $producto->cantidad = 1;
    $producto->ventaTotal = $producto->precioVenta;
    array_push($_SESSION["carrito"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $producto->existencia) {
        header("Location: ./panel_venta.php?");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;
}
header("Location: ./panel_venta.php");
