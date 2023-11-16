<?php
$id_usuario = $_SESSION['id'];
$total_venta = $_GET['totalcompra'];
$sql = "SELECT * FROM clientes WHERE id = $id_usuario";
$conexion = mysqli_query($con, $sql);
if (mysqli_error($con)) {
  echo "<script> alert('ERROR NO SE PUDO OBTENER LOS DATOS DEL USUARIO);</script>";
} else {
  if (mysqli_num_rows($conexion) != 0) {
    while ($datoUsuario = mysqli_fetch_array($conexion)) {
?>
      <!DOCTYPE html>
      <html lang="es">

      <head>
        <meta name="viewport" content="width=device-width , initial-scale=1.0" />
        <meta charset="UTF-8" />
        <title>Bowie</title>
        <link rel="stylesheet" href="./estilos/output.css" />
      </head>

      <body class="h-full bg-[--color-primary]">
        <div class="min-h-full">
          <header class="bg-[--color-primary] shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <h1 class="text-3xl font-bold tracking-tight flex justify-center text-[#f8fafc]">
                Bowie.com
              </h1>
              <br />
              <hr class="text-[#f8fafc]" />
            </div>
          </header>
          <main class="bg-[--color-primary]">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
              <div class="flex content-stretch justify-evenly flex-row flex-nowrap">
                <div class="p-10 rounded-3xl h-3/4 bg-[#f8fafc]">
                  <h1 class="text-center mb-5 text-[#333333]">DATOS DE USUARIO</h1>
                  <form class="grid grid-cols-2 gap-5" action="index.php?modulo=comprar&accion=confirmar_compra&id=<?php echo $datoUsuario['id'] ?>&totalcompra=<?php echo $total_venta ?>" method="POST">
                    <div>
                      <label class="block mb-1 font-bold text-[#333333] " for="nombre">Nombre:</label>
                      <input class="w-full h-10 text-base border-none outline-none p-3 box-border b-[#f0f0f0]" type="text" id="nombre" name="nombre" value=" <?php echo $datoUsuario['nombre'] ?>" required />
                    </div>
                    <div>
                      <label class="block mb-1 font-bold text-[#333333] " for="nombre">Apellido:</label>
                      <input class="w-full h-10 text-base border-none outline-none p-3 box-border b-[#f0f0f0]" type="text" id="apellido" name="apellido" placeholder="Apellido" value=" <?php echo $datoUsuario['apellido'] ?>" required />
                    </div>
                    <div>
                      <label class="block mb-1 font-bold text-[#333333] " for="nombre">Dirección:</label>
                      <input class="w-full h-10 text-base border-none outline-none p-3 box-border b-[#f0f0f0]" type="text" id="direccion" name="direccion" placeholder="Direccion" value=" <?php echo $datoUsuario['direccion'] ?> " required />
                    </div>
                    <div>
                      <label class="block mb-1 font-bold text-[#333333] " for="nombre">Telefono:</label>
                      <input class="w-full h-10 text-base border-none outline-none p-3 box-border b-[#f0f0f0]" type="tel" id="telefono" name="telefono" placeholder="telefono" value=" <?php echo $datoUsuario['telefono'] ?>" required />
                    </div>
                    <!--
                      <div>
                      <label class="block mb-1 font-bold text-[#333333] " for="nombre">Email:</label>
                      <input class="w-full h-10 text-base border-none outline-none p-3 box-border b-[#f0f0f0]" type="email" id="email" name="email" placeholder="Email" value=" <?php echo $datoUsuario['email'] ?>" required />
                    </div>
                    -->
                    
                    <div>
                      <label class="block mb-1 font-bold text-[#333333] " for="pago">Medio de pago:</label>
                      <select class="w-full h-12 text-base border-none outline-none p-3 box-border b-[#f0f0f0]" id="pago" name="pago" required>
                        <option value="">Seleccione una opción</option>
                        <option value="tarjeta">Tarjeta de crédito o débito</option>
                        <option value="transferencia">
                          Transferencia bancaria
                        </option>
                        <option value="paypal">PayPal</option>
                      </select>
                    </div>
                    <br />
                    <div>
                      <button type="submit" class="mt-6 flex justify-center w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">
                        Finalizar Compra
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </main>
    <?php
    }
  }
}

if ($_GET['accion'] == 'confirmar_compra') {
  $id_usuario = $_SESSION['id'];
  $total_venta = $_GET['totalcompra'];
  $nombre =  trim($_POST['nombre']);
  $apellido = trim($_POST['apellido']);
  $direccion = trim($_POST['direccion']);
  $telefono = $_POST['telefono'];
  $metodo_pago = $_POST['pago'];


  // Actualizar datos del cliente
  $sqlActualizarCliente = "UPDATE clientes SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono' WHERE id = $id_usuario";
  $resultadoActualizacion = mysqli_query($con, $sqlActualizarCliente);

  if (!$resultadoActualizacion) {
    echo "Error al actualizar los datos del usuario: " . mysqli_error($con);
  }

  // Insertar en la tabla ventas
  $sqlInsertarVenta = "INSERT INTO ventas (idCliente, total, metodo_pago, direccion_envio) VALUES ($id_usuario, $total_venta, '$metodo_pago', '$direccion')";
  $resultadoInsercionVenta = mysqli_query($con, $sqlInsertarVenta);
  if (mysqli_error($con)) {
    echo "<script>alert('Error no se pudo insertar el registro');</script>";
  } else {
    echo "<script>alert('Compra Realizada, Muchas Gracias!!');</script>";
  }
  $id_compra = mysqli_insert_id($con); //Recuperamos el id de la compra recien creada

  $sqlCarrito = "SELECT id_producto, cantidad from carrito_usuarios WHERE id_usuario = $id_usuario";
  $resultadoCarrito = mysqli_query($con, $sqlCarrito);

  if ($resultadoCarrito) {
    while ($fila_carrito = mysqli_fetch_assoc($resultadoCarrito)) {
      $producto_id = $fila_carrito['id_producto'];
      $cantidadProductos = $fila_carrito['cantidad'];


      //Crear registro en la tabla detalleventas
      $sql_detalle = "INSERT INTO detalleventas (idVenta, idProducto, cantProductos, subtotal) values ('$id_compra', '$producto_id', '$cantidadProductos', '$total_venta')";
      $resultado_detalle = mysqli_query($con, $sql_detalle);

      if ($resultado_detalle) {
        //Limpiar el carrito una vez generado el detalle
        $sqlLimpiarCarrito = "DELETE FROM carrito_usuarios WHERE id_usuario = $id_usuario ";
        $resultadoLimpiarCarrito = mysqli_query($con, $sqlLimpiarCarrito);
      }
    }

    echo "<script>window.location='index.php';</script>";
  }
}

    ?>
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
              <a class=" rounded-md px-3 py-2 text-sm font-medium" href="https://linkedin.com" target="_blank">
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
        </div>
      </body>

      </html>