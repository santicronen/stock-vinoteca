<?php
include "conexion.php";
?>


<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <body class="report">
        <header class="_header">
            <img src="/vinoteca/css/logo_circular.png" width="150" height="150">
            <p></p>
            <h3 class="_title">REPORTE</h3>
        </header>
        <div class="_body">
            <br><br>
            <input type="button" name="volver" value="Volver al menu principal" onclick="location.replace('index.html');">
            <form action="" method="POST">
                <br>
                <label>Filtrar desde:</label>
                <input type="date" name="fechaDesde">
                <label>Hasta:</label>
                <input type="date" name="fechaHasta">
                <input type="submit" value="Filtrar" name="filter">
            </form>
            <form action="exportar_pdf.php" method="POST">
                <input type="submit" name="exportar" value="Exportar">
                <table class="center">
                    <tr>
                        <th>Nro Venta</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Productos</th>
                    </tr><br>

                    <?php
                    if(isset($_POST['filter'])){
                        $fechaDesde = $_POST['fechaDesde'];
                        $fechaHasta = $_POST['fechaHasta'];
                    } else  {
                        $fechaDesde = 0;
                        $fechaHasta = 0;
                    }

                    $sql = "SELECT ventaID, ventaTotal, ventaFecha FROM venta WHERE ventaFecha BETWEEN '$fechaDesde' AND '$fechaHasta' ORDER BY ventaID DESC";

                    $resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));
                    while ($a = mysqli_fetch_array($resu))
                    {
                        ?><tr>
                        <td><?php echo $a['ventaID'];?></td>
                        
                        <td><?php 
                            if(isset($a['ventaFecha'])){
                                echo $a['ventaFecha'];
                                }?>
                        </td>
                        <td><?php ?> $<?php echo $a['ventaTotal'];?></td>
                        <td><?php
                            $ventaID = $a['ventaID'];     
                            $productos = "SELECT v.productoID, p.productoNombre, v.ventaCantidad FROM venta_detalle v INNER JOIN producto p 
                            ON v.productoID = p.productoID WHERE v.ventaID = $ventaID";

                            $resu_productos = mysqli_query($conexion, $productos) or die($productos . mysqli_error($conexion));
                            while ($a = mysqli_fetch_array($resu_productos)){
                                ?> <ul>
                                <?php
                                echo $a['ventaCantidad']?> - <?php echo $a['productoNombre'];
                                ?>
                                </ul>
                            <?php
                            }
                        ?>
                        </td>
                        <input type="hidden" name="ventaID" value="<?php echo $a['ventaID'];?>">
                        <input type="hidden" name="ventaFecha" value="<?php echo $a['ventaFecha'];?>">
                        <input type="hidden" name="ventaTotal" value="<?php echo $a['ventaTotal'];?>">
                        <input type="hidden" name="ventaCantidad" value="<?php echo $a['ventaCantidad'];?>">
                        <input type="hidden" name="productoNombre" value="<?php echo $a['productoNombre'];?>">
                    </tr><?php
                    }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>