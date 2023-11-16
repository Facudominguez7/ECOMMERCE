<?php
if ($_GET['accion'] == 'ver_detalle') {
    $id_usuario = $_SESSION['id'];
    $id_venta = $_GET['idVenta'];
    $sql = "SELECT p.id as idProducto, p.precio AS precio_producto, p.nombre AS nombre_producto, dv.cantProductos AS cantidad_comprada, v.total
    FROM detalleventas dv
    INNER JOIN productos p ON dv.idProducto = p.id
    INNER JOIN ventas v ON dv.idVenta = v.id
    WHERE v.idCliente = $id_usuario AND dv.idVenta = $id_venta";
    $dato = mysqli_query($con, $sql);
    if (mysqli_error($con)) {
        echo "<script> alert('ERROR NO SE PUDO OBTENER DATOS DE LA TABLA DETALLEVENTAS);</script>";
    } else {
        if (mysqli_num_rows($dato) != 0) {
?>
            <div class="bg-[--color-primary] ">
                <div class="flex items-center w-full justify-center h-screen">
                    <div class="bg-white p-8 rounded shadow-md w-1/2 md:w-3/4 lg:w-2/3 xl:w-1/2 text-center">
                        <h1 class="text-2xl font-bold mb-4">Detalle de la Venta</h1>
                        <div class="space-y-4 flex justify-center flex-col">
                            <?php
                            while ($fila = mysqli_fetch_array($dato)) {
                                $carpetaProducto = "imagenes/productos/" . $fila['idProducto'] . "/";
                                $imagenesProducto = glob($carpetaProducto . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

                                if (!empty($imagenesProducto)) {
                                    $primeraImagen = $imagenesProducto[0];
                                } else {
                                    $primeraImagen = "../imagenes/default.jpg";
                                }
                            ?>
                                <div class="bg-gray-200 mx-auto p-4 rounded flex justify-center items-center w-1/2">
                                    <img src="<?php echo $primeraImagen ?>" alt="Producto 1" class="w-1/2 rounded-full mr-4">
                                    <div>
                                        <h2 class="font-bold text-xl"><?php echo $fila['nombre_producto'] ?></h2>
                                        <p class="text-gray-600">Precio: $<?php echo number_format($fila['precio_producto'], 2, ',', '.'); ?></p>
                                        <p class="text-gray-600">Cantidad: <?php echo $fila['cantidad_comprada'] ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>


            </div>
<?php
        }
    }
}
?>