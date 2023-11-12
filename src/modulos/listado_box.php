<!DOCTYPE html>
<html lang="es">

<head>
  <meta name="viewport" content="width=device-width , initial-scale=1.0" />
  <meta charset="UTF-8" />
  <title>Bowie</title>
  <link rel="stylesheet" href="../estilos/output.css" />
  <link rel="stylesheet" href="../estilos/input.css" />
  <link rel="stylesheet" href="../estilos/estilo_articulos.css"/>
</head>

<body class="w-full bg-[--color-primary] ">
  <div class="min-h-full">
    <header class="bg-[--color-primary]">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight flex justify-center text-[#f8fafc]">
          Bowie.com
        </h1>
        <br />
        <hr class="text-[#f8fafc]" />
      </div>
    </header>
    <main class="w-full bg-[--color-primary]">
    <?php
    $sql = "SELECT * FROM productos";
    $conexion = mysqli_query($con, $sql);
    if (mysqli_num_rows($conexion) != 0) {
        echo '<div class="mx-auto max-w-7xl flex flex-wrap justify-between p-6 gap-6">';
        while ($dato = mysqli_fetch_array($conexion)) {
            // Obtener la primera imagen de la carpeta del producto
            $carpetaProducto = "imagenes/productos/" . $dato['id'] . "/";
            $imagenesProducto = glob($carpetaProducto . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

            if (!empty($imagenesProducto)) {
                $primeraImagen = $imagenesProducto[0];
            } else {
                // Si no hay imágenes en la carpeta, puedes proporcionar una imagen predeterminada o manejarlo según tus necesidades.
                $primeraImagen = "../imagenes/default.jpg";
            }
    ?>
            <article id="articulo" class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 mb-6 px-4 -ml-8">
                <a href="index.php?modulo=producto&id=<?php echo $dato['id']?>">
                    <div class="relative flex items-end overflow-hidden rounded-xl">
                        <img src="<?php echo $primeraImagen; ?>" alt="<?php echo $dato['nombre']; ?>" class="w-auto h-auto object-cover" />
                        <div class="absolute bottom-0 left-0 right-0 flex items-center justify-between p-2 bg-blue-500 text-white opacity-80 hover:opacity-100 transition duration-300">
                            <div class="flex items-center space-x-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <button class="text-sm">Añadir al Carrito</button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1 p-2">
                        <h2 class="text-slate-700"><?php echo $dato['nombre']; ?></h2>

                        <div class="mt-3 flex items-end justify-between">
                            <p class="text-lg font-bold text-blue-500">$<?php echo $dato['precio']; ?></p>

                            <div class="flex items-center space-x-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <button class="text-sm">Añadir al Carrito</button>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
    <?php
        }
        echo '</div>';
    }
    ?>
</main>


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


</body>

</html>