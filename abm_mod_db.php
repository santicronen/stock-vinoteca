<html>
    <body>
        <?php
        include "conexion.php";
        $productoID = $_POST['productoID'];
        $productoNombre = $_POST['productoNombre'];
        $productoCosto = $_POST['productoCosto'];
        $productoPrecio = $_POST['productoPrecio'];
        $productoStock = $_POST['productoStock'];

        $sql = "UPDATE producto SET productoID = '$productoID', productoNombre = '$productoNombre',
                productoCosto = '$productoCosto', productoPrecio = '$productoPrecio', productoStock = '$productoStock'
                WHERE productoID = $productoID";
        
        $resu = mysqli_query($conexion,$sql) or die ($sql . mysqli_error($conexion));

        if($resultado === TRUE){
            header("Location: ./consulta.php");
            exit;
        }
        ?>
    </body>
</html>