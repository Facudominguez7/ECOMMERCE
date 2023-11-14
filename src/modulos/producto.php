<!DOCTYPE html>
<html lang="es">
<header class="bg-[--color-primary]">
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight flex justify-center text-[#f8fafc]">
      Bowie.com
    </h1>
    <br />
    <hr class="text-[#f8fafc]" />
  </div>
</header>
<main class="bg-[--color-primary]">
  <?php
  $id = $_GET['id'];
  $sql = "SELECT * FROM productos where id = $id";
  $conexion = mysqli_query($con, $sql);
  if (mysqli_num_rows($conexion) != 0) {
    // Obtener el resultado como un array asociativo
    $dato = mysqli_fetch_assoc($conexion);
    // Obtener todas las imagenes de la carpeta del producto
    $carpetaProducto = "imagenes/productos/" . $dato['id'] . "/";
    $imagenesProducto = glob($carpetaProducto . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);

    $imagenes = array();

    if (!empty($imagenesProducto)) {
      $primeraImagen = $imagenesProducto[0];
      foreach ($imagenesProducto as $imagen) {

        // Agregar el nombre del archivo al final del array $imagenes
        array_push($imagenes, $imagen);
      }
    } else {
      $imagenes = "../imagenes/default.jpg";
    }
  }
  ?>
  <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">

    <div class="xl:w-2/6 lg:w-2/5 w-full md:block hidden">
      <?php
      // Verificar si $imagenes está definida y no es null
      if (isset($imagenes) && is_array($imagenes) && count($imagenes) > 0) {
        // Iterar sobre las imágenes
        foreach ($imagenes as $index => $imagen) {
          // Verificar si es la primera imagen o una imagen impar
          if ($index % 2 == 0) {
            echo '<div class="flex mb-6">';
          }

          // Mostrar la imagen
          echo '<img class="w-1/2 h-auto mr-2" src="' . $imagen . '" alt="' . $dato['nombre'] . '" />';

          // Verificar si es la última imagen o una imagen par
          if ($index % 2 != 0 || $index == count($imagenes) - 1) {
            echo '</div>';
          }
        }
      } else {
        echo "Array vacío";
      }
      ?>
    </div>
    <div class="md:hidden">
      <img class="w-1/2" alt="Samsung galaxy z fold 5" src="<?php echo $primeraImagen; ?>" />
      <div class="flex items-center justify-between mt-3 space-x-4 md:space-x-0"></div>
    </div>
    <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
      <div class="border-b border-gray-200 pb-6">
        <h1 class="text-[#f8fafc] lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 t dark:text-white mt-2">
          <?php echo $dato['nombre'] ?>
        </h1>
      </div>
      <div class="py-4 border-b border-gray-200 flex items-center justify-between">
        <p class="text-[#f8fafc] text-base leading-4 dark:text-gray-300">
          Color
        </p>
        <div class="flex items-center justify-center">
          <p class="text-[#f8fafc] text-sm leading-none dark:text-gray-300">
            <?php echo $dato['color'] ?>
          </p>
          <div class="w-6 h-6 bg-gradient-to-b from-gray-900 to-indigo-500 ml-3 mr-4 cursor-pointer"></div>
          <svg class="cursor-pointer text-gray-300 dark:text-white" width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1L5 5L1 9" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
      <div class="py-4 border-b border-gray-200 flex items-center justify-between">
        <p class="text-[#f8fafc] text-base leading-4 t dark:text-gray-300">
          Tamaño de Almacenamiento
        </p>
        <div class="flex items-center justify-center">
          <p class="text-[#f8fafc] text-sm leading-none dark:text-gray-300 mr-3">
            <?php echo $dato['almacenamiento']?>
          </p>
          <svg class="text-gray-300 dark:text-white cursor-pointer" width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1L5 5L1 9" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
      <a href="index.php?modulo=carrito&accion=agregar_carrito&id=<?php echo $dato['id']?>&precio=<?php echo $dato['precio']?>" class="text-[#f8fafc] dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
        Añadir al Carrito
      </a>
      <div>
        <p class="text-[#f8fafc] xl:pr-48 text-base lg:leading-tight leading-normal dark:text-gray-300 mt-7">
        <?php echo $dato['descripcion']?>
        </p>
        <p class="text-[#f8fafc] text-base leading-4 mt-7 dark:text-gray-300">
          Código de Producto: <?php echo $dato['codigo']?>
        </p>
        <p class="text-[#f8fafc] text-base leading-4 mt-4 dark:text-gray-300">
          Altura: <?php echo $dato['altura']?>
        </p>
        <p class="text-[#f8fafc] text-base leading-4 mt-4 dark:text-gray-300">
          Ancho: <?php echo $dato['ancho']?>
        </p>
        <p class="text-[#f8fafc] text-base leading-4 mt-4 dark:text-gray-300">
          Peso: <?php echo $dato['peso']?>
        </p>
        <p class="text-[#f8fafc] md:w-96 text-base leading-normal dark:text-gray-300 mt-4">
          Altura x Ancho: <?php echo $dato['altura']?> x <?php echo $dato['ancho']?>
        </p>
      </div>
      <div>
        <div class="border-t border-b py-4 mt-7 border-gray-200">
          <div data-menu class="flex justify-between items-center cursor-pointer">
            <p class="text-[#f8fafc] text-base leading-4 dark:text-gray-300">
              Compras y Devoluciones
            </p>
            <button class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
              <svg class="transform text-gray-300 dark:text-white" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 1L5 5L1 1" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
          <div class="text-[#f8fafc] hidden pt-4 text-base leading-normal pr-12 mt-4 dark:text-gray-300" id="sect">
            Usted será responsable de pagar sus propios costos de envío.
            por devolver su artículo. Los gastos de envío no son
            reembolsables
          </div>
        </div>
      </div>
      <div>
        <div class="border-b py-4 border-gray-200">
          <div data-menu class="flex justify-between items-center cursor-pointer">
            <p class="text-[#f8fafc] text-base leading-4 dark:text-gray-300">
              Contáctanos
            </p>
            <button class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded" role="button" aria-label="show or hide">
              <svg class="transform text-gray-300 dark:text-white" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 1L5 5L1 1" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
          <div class="text-[#f8fafc] hidden pt-4 text-base leading-normal pr-12 mt-4 dark:text-gray-300" id="sect">
            Si tiene alguna pregunta sobre cómo devolvernos su artículo,
            contáctenos. us.
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="mx-auto w-full max-w-2xl flex justify-center flex-col items-stretch pb-4 px-4 sm:px-6 lg:px-8">
    <h1 class="font-serif pb-4 font-extrabold text-4xl text-white">
      PRODUCTOS RELACIONADOS
    </h1>
    <div class="w-full bg-[--color-nav] rounded-3xl overflow-x-hidden">
      <div class="grande w-300p flex flex-row justify-center items-center">
        <div class="imagen">
          <a href="https://www.samsung.com/ar/monitors/flat/t35f-27-inch-ips-fhd-1080p-freesync-lf27t350fhlczb/" target="_blank">
            <img src="./src/Imagenes/Producto_Relacionado_Monitor.webp" alt="Imagen 1" class="px-52" />
            <h1 class="text-center tracking-tight text-3xl">
              Monitor 27"" FHD con panel IPS 75hz y bordes ultradelgados
            </h1>
            <br />
            <h3 class="tracking-tight text-center text-2xl font-medium leading-4">
              $139.999
            </h3>
          </a>
        </div>
        <div class="imagen">
          <a href="https://www.samsung.com/ar/tvs/uhd-4k-tv/au7000-uhd-4k-smart-tv-2021-43-inch-un43au7000gczb/" target="_blank">
            <img src="./src/Imagenes/Producto_Relacionado_TV.webp" alt="Imagen 1" class="px-52" />
            <h1 class="text-center tracking-tight text-4xl">
              43"" UHD 4K SMART TV AU7000
            </h1>
            <br />
            <h3 class="tracking-tight text-center text-3xl font-medium leading-4">
              $224.999
            </h3>
          </a>
        </div>
        <div class="imagen">
          <a href="https://www.samsung.com/ar/audio-sound/galaxy-buds/galaxy-buds2-graphite-sm-r177nzkaaro/" target="_blank">
            <img src="./src/Imagenes/Producto_Relacionado_GalaxyBuds2.webp" alt="Imagen 1" class="px-52" />
            <h1 class="text-center tracking-tight text-4xl">
              Galaxy Buds2
            </h1>
            <br />
            <h3 class="tracking-tight text-center text-3xl font-medium leading-4">
              $52.499
            </h3>
          </a>
        </div>
      </div>

      <ul class="w-full p-4 flex flex-row justify-center items-center">
        <li class="w-8 h-8 m-4 bg-black cursor-pointer rounded-3xl punto activo"></li>
        <li class="w-8 h-8 m-4 bg-black cursor-pointer rounded-3xl punto"></li>
        <li class="w-8 h-8 m-4 bg-black cursor-pointer rounded-3xl punto"></li>
      </ul>
    </div>
  </section>
  <script>
    let elements = document.querySelectorAll("[data-menu]");
    for (let i = 0; i < elements.length; i++) {
      let main = elements[i];
      main.addEventListener("click", function() {
        let element = main.parentElement.parentElement;
        let andicators = main.querySelectorAll("svg");
        let child = element.querySelector("#sect");
        child.classList.toggle("hidden");
        andicators[0].classList.toggle("rotate-180");
      });
    }
  </script>
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

</html>