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
if(isset($_GET['accion'])){
    if ($_GET['accion'] == 'eliminar'){
        if(isset($_GET['id'])){
            $id_producto = $_GET['id'];
            $id_usuario = $_SESSION['id'];
            $sql = "DELETE FROM carrito_usuarios where id_producto = '$id_producto' AND id_usuario = '$id_usuario'";
            $resultadoBorrar = mysqli_query($con, $sql);
            if(mysqli_error($con)){
                echo "<script> alert('No se ha podido eliminar el producto del carrito');</script>";
            } else {
                echo "<script> alert('Producto eliminado del carrito');</script>";
            }
        }
    }
    if ($_GET['accion'] == 'limpiar') {
        $sqlLimpiar = "CALL EliminarCarritosUsuarios()";
        $conexion = mysqli_query($con, $sqlLimpiar);
        if (mysqli_error($con)) {
            "<script> alert('ERROR NO SE PUDO LIMPIAR EL CARRITO);</script>";
        } else {
            "<script> alert('Carrito limpiado');</script>";
        }
        echo "<script> alert('Carrito limpiado');</script>";
    }
    
    echo "<script>window.location='index.php?modulo=listado_box';</script>";
    
}


?>

<head>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<div class="h-auto bg-[--color-primary] pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold text-white">Items del Carrito</h1>
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
        $subtotalProductos = 0;
        $envio = 3000;
        if (mysqli_num_rows($conexion) != 0) {
            while ($datoProducto = mysqli_fetch_array($conexion)) {
                // Obtener la primera imagen de la carpeta del producto
                $carpetaProducto = "imagenes/productos/" . $datoProducto['id'] . "/";
                $imagenesProducto = glob($carpetaProducto . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

                $envio = 3000;
                //Calculo subtotal producto actual
                $subtotalProducto = $datoProducto['cantidad_en_carrito'] * $datoProducto['precio_unitario'];
                $subtotalProductos += $subtotalProducto; // Sumar al total de subtotales


                if (!empty($imagenesProducto)) {
                    $primeraImagen = $imagenesProducto[0];
                } else {
                    $primeraImagen = "../imagenes/default.jpg";
                }
    ?>
                <div class=" bg-[--color-primary]">
                    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                        <div class="rounded-lg md:w-2/3">
                            <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                <img src="<?php echo $primeraImagen ?>" alt="product-image" class="w-full rounded-lg sm:w-40" />
                                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                    <div class="mt-5 sm:mt-0">
                                        <h2 class="text-xl font-bold text-gray-900"><?php echo $datoProducto['nombre'] ?></h2>
                                        <p class="mt-1 text-lg text-gray-700">Precio Unitario: $<?php echo number_format($datoProducto['precio'], 2, ',', '.'); ?></p>
                                        <p class="mt-1 text-lg text-gray-700">Color: <?php echo $datoProducto['color'] ?></p>
                                    </div>
                                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                        <div class="flex items-center border-gray-100">
                                            <input id="cantidad-<?php echo $datoProducto['id'] ?>" class="h-8 mr-2 w-14 border bg-white text-center text-xl outline-none" type="text" value="<?php echo $datoProducto['cantidad_en_carrito'] ?>" min="1" style="color: black;" />
                                            <a href="index.php?modulo=carrito&accion=eliminar&id=<?php echo $datoProducto['id'] ?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Sub total -->
                        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                            <div class="mb-2 flex justify-between">
                                <p class="text-gray-700 font-bold">Subtotal Producto</p>
                                <p id="subtotal-<?php echo $datoProducto['id']; ?>" class="text-gray-700">$<?php echo number_format($subtotalProducto, 2, ',', '.'); ?></p>
                            </div>

                        </div>
                    </div>
                </div>

            <?php

            }
            // Imprimir subtotal y total fuera del bucle
            $total = $subtotalProductos + $envio;
            ?>
            <div class="bg-[--color-primary] flex justify-center">
                <div class="w-1/2 bg-white rounded-md mb-3">
                    <!-- Finalizar Compra -->
                    <div class=" w-1/2 flex justify-between items-center mt-6 mx-auto max-w-5xl px-6">
                        <p class="text-lg font-bold">Total</p>
                        <div class="">
                            <p id="total" class="mb-1 text-lg font-bold">$<?php echo number_format($total, 2, ',', '.'); ?></p>
                            <p class="text-sm text-gray-700">Con Envío Incluido</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-gray-700">Envio</p>
                            <p class="text-gray-700"> $3.000</p>
                        </div>
                    </div>
                    <div class="flex justify-center mb-3">
                        <button type="submit" class="mt-6 flex justify-center w-1/2 rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">
                            <a href="index.php?modulo=comprar&accion=continuar&id=<?php echo $id_usuario ?>&totalcompra=<?php echo $total ?>">Continuar</a>
                        </button>
                    </div>
                    <div class="flex justify-center mb-3">
                        <button type="submit" class="mt-6 flex justify-center w-1/2 rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">
                            <a href="index.php?modulo=carrito&accion=limpiar">Limpiar Carrito</a>
                        </button>
                    </div>
                </div>
            </div>
    <?php
        }
    }

    ?>
</div>
<footer class="bg-[#262626] w-full">
    <div class="flex justify-center">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            <h1 class="text-[#f8fafc]">Copyright &copy; Bowie.com</h1>
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <a class="rounded-md px-3 py-2 text-sm font-medium" href="https://twitter.com" target="_blank">
                        <img class="h-8 w-8" src="./src/imagenes/logo_twitter.png" alt="Twitter" />
                    </a>
                    <a class="rounded-md px-3 py-2 text-sm font-medium" href="https://facebook.com" target="_blank">
                        <img class="h-8 w-8" src="./src/imagenes/logo_facebook.png" alt="Facebook" />
                    </a>
                    <a class="rounded-md px-3 py-2 text-sm font-medium" href="https://linkedin.com" target="_blank">
                        <img class="h-8 w-8" src="./src/imagenes/logo_linkedin.png" alt="LinkedIn" />
                    </a>
                    <a class="rounded-md px-3 py-2 text-sm font-medium" href="https://instagram.com" target="_blank">
                        <img class="h-8 w-8" src="./src/imagenes/logo_instagram.png" alt="Instagram" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>