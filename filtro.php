<?php

include("conexion.php");

$fromdate = $_POST['fechaDesde']; 
$todate = $_POST['fechaHasta'];

$formdate_r = DateTime::createFromFormat('d-m-Y', $fromdate);
$todate_r = DateTime::createFromFormat('d-m-Y', $todate);

// This will have yyyy-mm-dd format
$formdate_sql = $formdate_r->format("Y-m-d"); 
$todate_sql = $todate_r->format("Y-m-d");

$data = $database->getRows("SELECT *, 
                    GROUP_CONCAT(coupon) as cou,
                GROUP_CONCAT(coupondate) as coupondt 
                FROM receipt_entry 
                WHERE city_name = :cityname 
                AND str_to_date(bookingdate,'%d-%m-%Y') BETWEEN :fromdate AND :todate 
                GROUP BY book_no,receipt_no order by bookingdate asc
            ",array(':fromdate'=>$formdate_sql,':todate'=>$todate_sql,':cityname'=>$cityname)); 

$sql = "SELECT ventaID, ventaTotal, ventaFecha FROM venta ORDER BY ventaID DESC";

$sql = "SELECT v.productoID, p.productoNombre, p.productoPrecio, v.ventaCantidad FROM venta_detalle v INNER JOIN producto p 
ON v.productoID = p.productoID WHERE v.ventaID = $ventaID";

$resu = mysqli_query($conexion, $sql) or die($sql . mysqli_error($conexion));
while ($a = mysqli_fetch_array($resu))
{
    ?><tr>
    <td><?php echo $a['ventaID'];?></td>
    <td><?php echo $a['ventaFecha'];?></td>
    <td><?php echo $a['ventaTotal'];?></td>
    <input type="hidden" name="ventaID" value="<?php echo $a['ventaID'];?>">
    <input type="hidden" name="ventaFecha" value="<?php echo $a['ventaFecha'];?>">
    <input type="hidden" name="ventaTotal" value="<?php echo $a['ventaTotal'];?>">
</tr><?php
}
?>


?>