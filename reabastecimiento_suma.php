<html>
    <body>
        <?php
        include "conexion.php";
        $producto = $_GET['producto'];

        $sql = 

        $resu = mysqli_query($conexion, $sql) or die ($sql . mysqli_error($conexion));
        ?>
    </body>
</html>
<script>
    alert("Se reabastecio el producto.");
    location.replace("venta.php");
</script>