<html>
    <body>
        <?php
        include "conexion.php";
        $producto = $_GET['producto'];
        $ventaCantidad = $_GET['ventaCantidad'];

        // consulta
        $sql = "UPDATE venta_detalle
                SET productoStock = productoStock - ventaCantidad";

        $resu = mysqli_query($conexion, $sql) or die ($sql . mysqli_error($conexion));
        ?>
    </body>
</html>
<script>
    alert("Se agrego la venta.");
    location.replace("venta.php");
</script>