<html>
    <body>
        <?php
        include "conexion.php";
        $ventaID = $_GET['ventaID'];
        $productoID = $_GET['productoID'];
        $ventaCantidad = $_GET['ventaCantidad'];

        // insert venta detalle
        $sql = "INSERT venta_detalle (ventaID, productoID, ventaCantidad) VALUES ($ventaID, $productoID, $ventaCantidad)";

        $resu = mysqli_query($conexion, $sql) or die ($sql . mysqli_error($conexion));
        ?>
    </body>
</html>
<script>
    alert("Se agregó el producto.");
    location.replace("detalle_venta.php");
</script>