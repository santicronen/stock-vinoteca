# Gestión de Stock - Vinoteca

Gestión básica de un sistema de stock e inventario para una vinoteca. Este sistema permitirá la alta, baja y modificación de todos los productos disponibles, consulta del stock actual de un producto particular y reabastecer (setear la cantidad de ese producto a una previamente establecida) cuando llegue un pedido.

Entidades:

* Productos
* Proveedor (cada proveedor reabastecerá un conjunto de productos establecido)
* Tipos de productos
* Venta
* Venta detalle.

Atributos producto: 
* Nombre del producto.
* ID del producto.
* Código de tipo del producto.
* Descripción del tipo de producto
* Cantidad del producto.
* Costo del producto.
* Precio del producto.
* ID de empresa del producto.
* Nombre de la empresa del producto.

Atributos proovedor:
* Nombre del proovedor.
* ID del proovedor.
* Código de tipo de proovedor (bebidas, tabaco, vinos).
* Descripción de tipo de proovedor.
* Costo flete.

Atributos venta:
* ID de la venta.
* Total de la venta.
* Fecha de la venta.
