<?php
if (isset($_GET['accion']) && isset($_GET['precio'])) {
    if ($_GET['accion'] == 'agregar_carrito') {
        $id_usuario = $_SESSION['id'];
        $id_producto = $_GET['id'];
        $precio_unitario = $_GET['precio'];

        // Verificar si el producto ya está en el carrito del usuario
        $sqlVerificarProducto = "SELECT id, cantidad FROM carrito_usuarios WHERE id_usuario = $id_usuario AND id_producto = $id_producto";
        $resultadoVerificacion = mysqli_query($con, $sqlVerificarProducto);

        if ($resultadoVerificacion) {
            if (mysqli_num_rows($resultadoVerificacion) > 0) {
                // El producto ya está en el carrito, actualiza la cantidad
                $fila = mysqli_fetch_assoc($resultadoVerificacion);
                $id_carrito = $fila['id'];
                $nueva_cantidad = $fila['cantidad'] + 1;

                $sqlActualizarCantidad = "UPDATE carrito_usuarios SET cantidad = $nueva_cantidad WHERE id = $id_carrito";
                $conexion = mysqli_query($con, $sqlActualizarCantidad);

                if ($conexion) {
                    echo "<script> alert('Cantidad del producto actualizada en el carrito');</script>";
                } else {
                    echo "<script> alert('ERROR: No se pudo actualizar la cantidad);</script>";
                }
            } else {
                // El producto no está en el carrito
                $sqlInsertarProducto = "INSERT INTO carrito_usuarios(id_usuario, id_producto, cantidad, precio_unitario) VALUES ($id_usuario, $id_producto, 1, $precio_unitario)";
                $conexion = mysqli_query($con, $sqlInsertarProducto);

                if ($conexion) {
                    echo "<script> alert('Producto cargado en el carrito con éxito');</script>";
                } else {
                    echo "<script> alert('ERROR: No se pudo insertar el producto en el carrito);</script>";
                }
            }
        } else {
            echo "<script> alert('ERROR: No se pudo verificar el producto en el carrito);</script>";
        }
        echo "<script>window.location='index.php?modulo=carrito';</script>";
    }
}

?>




<div class="h-screen bg-[--color-primary] pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Items del Carrito</h1>
    <?php
    $id_usuario = $_SESSION['id'];
    $sqlObtenerProductosDelCarrito = "
     SELECT p.*, cu.cantidad as cantidad_en_carrito, cu.precio_unitario as precio_unitario
     FROM productos p
     JOIN carrito_usuarios cu ON p.id = cu.id_producto
     WHERE cu.id_usuario = $id_usuario
     ";
    $conexion = mysqli_query($con, $sqlObtenerProductosDelCarrito);
    if (mysqli_error($con)) {
        echo "<script> alert('ERROR NO SE PUDO OBTENER LOS PRODUCTOS DEL CARRITO);</script>";
    } else {
        if (mysqli_num_rows($conexion) != 0) {
            while ($datoProducto = mysqli_fetch_array($conexion)) {
                // Obtener la primera imagen de la carpeta del producto
                $carpetaProducto = "imagenes/productos/" . $datoProducto['id'] . "/";
                $imagenesProducto = glob($carpetaProducto . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
                
                //Calculo subtotal producto actual
                $subtotalProducto = $datoProducto['cantidad_en_carrito'] * $datoProducto['precio_unitario'];

                if (!empty($imagenesProducto)) {
                    $primeraImagen = $imagenesProducto[0];
                } else {
                    $primeraImagen = "../imagenes/default.jpg";
                }
    ?>
                <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                    <div class="rounded-lg md:w-2/3">
                        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                            <img src="<?php echo $primeraImagen ?>" alt="product-image" class="w-full rounded-lg sm:w-40" />
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900"><?php echo $datoProducto['nombre'] ?></h2>
                                    <p class="mt-1 text-xs text-gray-700"><?php echo $datoProducto['precio'] ?></p>
                                </div>
                                <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                    <div class="flex items-center border-gray-100">
                                    <input id="cantidad-<?php echo $datoProducto['id'] ?>" class="h-8 w-14 border bg-white text-center text-xl outline-none" type="text" value="<?php echo $datoProducto['cantidad_en_carrito'] ?>" min="1" style="color: black;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sub total -->
                    <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                        <div class="mb-2 flex justify-between">
                            <p class="text-gray-700">Subtotal</p>
                            <p id="subtotal-<?php echo $datoProducto['id']; ?>" class="text-gray-700">$<?php echo number_format($subtotalProducto, 3); ?></p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-gray-700">Envio</p>
                            <p class="text-gray-700">$3.000</p>
                        </div>
                        <hr class="my-4" />
                        <div class="flex justify-between">
                            <p class="text-lg font-bold">Total</p>
                            <div class="">
                                <p class="mb-1 text-lg font-bold">$134.98 USD</p>
                                <p class="text-sm text-gray-700">including VAT</p>
                            </div>
                        </div>
                        <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Finalizar Compra</button>
                    </div>
                </div>
    <?php

            }
        }
    }

    ?>

</div>
<script>
    function actualizarSubtotal(idProducto) {
    var cantidadInput = document.getElementById('cantidad-' + idProducto);
    var subtotalElement = document.getElementById('subtotal-' + idProducto);
    var precioUnitario = <?php echo $datoProducto['precio']; ?>; // Obtén el precio unitario desde PHP
    var cantidad = parseInt(cantidadInput.value);
    var subtotal = precioUnitario * cantidad;

    // Actualizar el subtotal en la interfaz
    subtotalElement.textContent = '$' + subtotal.toFixed(2);
}
</script>