<html>
    <body>
        <?php
        include "conexion.php";
        $productoID = $_GET['productoID'];
        $productoNombre = $_GET['productoNombre'];
        $productoCosto = $_GET['productoCosto'];
        $productoPrecio = $_GET['productoPrecio'];
        $productoStock = $_GET['productoStock'];

        $sql = "INSERT INTO producto VALUES ('$productoID', '$productoNombre', '$productoCosto', 
                                            '$productoPrecio', '$productoStock', '1')";
        
        $resu = mysqli_query($conexion,$sql) or die ($sql . mysqli_error($conexion));
        ?>
    </body>
    <script>
    alert("Se reabastecio el producto.");
    location.replace("index.html");
</script>
</html>