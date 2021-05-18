<html>
    <body>
        <?php
        include "conexion.php";
        $productoID = $_GET['productoID'];
        $productoNombre = $_GET['productoNombre'];
        $empresaID = $_GET['empresaID'];
        $productoCosto = $_GET['productoCosto'];
        $productoPrecio = $_GET['productoPrecio'];
        $productoStock = $_GET['productoStock'];

        $sql = "INSERT INTO producto VALUES('$productoID', '$productoNombre', '$empresaID', '$productoCosto', 
                                            '$productoPrecio', '$productoStock')";
        
        $resu = mysqli_query($conexion,$sql) or die ($sql . mysqli_error($conexion));
        ?>
    </body>
</html>