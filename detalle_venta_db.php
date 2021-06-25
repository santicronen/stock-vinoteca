<html>
    <body>
        <?php 
        include 'conexion.php';
        session_start();
        if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
        $sql = "SELECT * FROM producto WHERE productoID = ? LIMIT 1";

            $ventaID = $_POST['ventaID'];
            $productoID = $_POST['productoID'];
            $productoPrecio = $_POST['productoPrecio'];
            $ventaCantidad = $_POST['ventaCantidad'];

        # update stock
        # $sql = "UPDATE producto SET productoStock = productoStock-???????????"
                    
        // insert venta detalle
        $sql = "INSERT venta_detalle (ventaID, productoID, ventaPrecio, ventaCantidad) VALUES ($ventaID, $productoID, $productoPrecio, $ventaCantidad)";

        $resu = mysqli_query($conexion, $sql) or die ($sql . mysqli_error($conexion));
        ?>
    </body>
</html>
<script>
    alert("Venta realizada.");
    location.replace("detalle_venta.php");
</script>