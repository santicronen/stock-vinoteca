<html>
    <body>
        <?php
        include "conexion.php";
        $productoID = $_POST['productoID'];
        $productoNombre = $_POST['productoNombre'];
        $productoStock = $_POST['productoStock'];

        $sql = "UPDATE producto SET productoStock = $productoStock WHERE productoID = $productoID";

        $resu = mysqli_query($conexion, $sql) or die ($sql . mysqli_error($conexion));
        ?>
    </body>
</html>
<script>
    alert("Se reabastecio el producto.");
    location.replace("index.html");
</script>