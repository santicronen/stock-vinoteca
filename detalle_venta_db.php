<html>
    <body>
        <?php 
        include 'conexion.php';
        session_start();
        if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
        
        $ventaID = $_POST['ventaID'];
        $productoID = $_POST['productoID'];
        $ventaCantidad = $_POST['ventaCantidad'];
        
        $sql = "SELECT productoPrecio FROM producto WHERE productoID = $productoID LIMIT 1";
        $resu = mysqli_query($conexion, $sql);

        while($a = mysqli_fetch_array($resu)){
            $productoPrecio = $a['productoPrecio'];
        }

        $sql = "SELECT * FROM venta_detalle WHERE ventaID = $ventaID and productoID = $productoID";
        $control = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($control) == 0){
            $sql = "INSERT INTO venta_detalle (ventaID, productoID, ventaPrecio, ventaCantidad) VALUES ($ventaID, $productoID, $productoPrecio, $ventaCantidad)";
            $resu = mysqli_query($conexion, $sql) or die ($sql . mysqli_error($conexion));
        } else {
            $sql = "UPDATE venta_detalle SET ventaCantidad = $ventaCantidad + ventaCantidad WHERE ventaID = $ventaID and productoID = $productoID";
            $resu = mysqli_query($conexion, $sql);
        }
        

        ?>
    </body>
</html>
<script>
    location.replace("detalle_venta.php");
</script>