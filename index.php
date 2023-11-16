<?php
session_start();
include('./src/includes/conexion.php');
conectar();
?>

<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-100">

<head>
  <meta name="viewport" content="width=device-width , initial-scale=1.0" />
  <meta charset="UTF-8" />
  <title>Bowie</title>
  <link rel="stylesheet" href="./src/estilos/output.css" />
  <link rel="stylesheet" href="./src/estilos/carrousel.css" />
  <link rel="stylesheet" href="./src/estilos/wafloatbox-0.2.css" />
  <script defer src="./src/JavaScript/carrousel.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>

<body class="h-full bg-[--color-primary]">
  <div class="min-h-full">
    <nav class="bg-[--color-nav]">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <a href="index.php" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]" aria-current="page">Inicio</a>
                <a href="index.php?modulo=listado_box" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Box de Productos</a>
                <?php
                if (isset($_SESSION['nombre_usuario'])) {
                  if ($_SESSION['rol'] == 2) {
                ?>
                    <a href="index.php?modulo=usuario" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Administrar Usuarios</a>
                    <a href="index.php?modulo=listado_tabla" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Tabla de Productos</a>
                    <a href="index.php?modulo=Todas_Las_Ventas" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Ventas Totales</a>
                <?php
                  }
                }
                ?>
                <?php
                if (!empty($_SESSION['nombre_usuario'])) {
                ?>
                  <a href="index.php?modulo=registro" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary] hidden">Registrarse</a>
                  <a href="index.php?modulo=iniciar_sesion" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary] hidden">Iniciar Sesion</a>
                  <a href="index.php?modulo=miscompras" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Mis Compras</a>
                  <a href="index.php?modulo=iniciar_sesion&salir=ok" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Cerrar Sesión</a>
                  <div class="flex-shrink-0">
                    <a href="index.php?modulo=carrito">
                      <img class="h-8 w-8" src="./src/imagenes/Carrito.png" alt="Imagen de Carrito de compra" />
                    </a>
                  </div>
                <?php
                } else {
                ?>
                  <a href="index.php?modulo=registro" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Registrarse</a>
                  <a href="index.php?modulo=iniciar_sesion" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Iniciar Sesion</a>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="index.php" class="text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Inicio</a>
          <a href="index.php?modulo=listado_box" class="text-gray-300 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Box de Productos</a>
          <?php
          if (isset($_SESSION['nombre_usuario'])) {
            if ($_SESSION['rol'] == 2) {
          ?>
              <a href="index.php?modulo=usuario" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Administrar Usuarios</a>
              <a href="index.php?modulo=listado_tabla" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Tabla de Productos</a>
              <a href="index.php?modulo=Todas_Las_Ventas" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Ventas Totales</a>
          <?php
            }
          }
          ?>
          <?php
          if (!empty($_SESSION['nombre_usuario'])) {
          ?>
            <a href="index.php?modulo=registro" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary] hidden">Registrarse</a>
            <a href="index.php?modulo=iniciar_sesion" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary] hidden">Iniciar Sesion</a>
            <a href="index.php?modulo=miscompras" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Mis Compras</a>
            <a href="index.php?modulo=iniciar_sesion&salir=ok" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Cerrar Sesión</a>
            <div class="flex-shrink-0">
              <a href="index.php?modulo=carrito">
                <img class="h-8 w-8" src="./src/imagenes/Carrito.png" alt="Imagen de Carrito de compra" />
              </a>
            </div>
          <?php
          } else {
          ?>
            <a href="index.php?modulo=registro" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Registrarse</a>
            <a href="index.php?modulo=iniciar_sesion" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Iniciar Sesion</a>
          <?php
          }
          ?>

        </div>
      </div>
    </nav>
    <?php
    if (!empty($_GET['modulo'])) {
      include('./src/modulos/' . $_GET['modulo'] . '.php');
    } else {
    ?>
      <header class="bg-[--color-primary] shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-3 lg:px-8">
          <?php
          if (!empty($_SESSION['nombre_usuario'])) {
          ?>
            <h1 class="text-3xl font-bold tracking-tight flex justify-center text-[#f8fafc]">
              Bienvenido <?php echo $_SESSION['nombre_usuario']; ?>
            </h1>
            <br />
          <?php
          }
          ?>
        </div>
      </header>
      <main class="bg-[--color-primary]">

        <div class="mx-auto w-full max-w-2xl flex justify-center items-stretch pb-4 px-4 sm:px-6 lg:px-8">
          <div class="w-full bg-[--color-nav] rounded-3xl overflow-x-hidden">
            <div class="grande w-300p flex flex-row justify-start items-center">
              <img src="./src/imagenes/SliderS23u.webp" alt="Imagen Slider s23" class="img" />
              <img src="./src/imagenes/Z_flip5_slider.webp" alt="Imagen Slider Zflip5" class="img" />
              <img src="./src/imagenes/Z_fold_5_Slider.webp" alt="Imagen Z fold 5" class="img" />
            </div>

            <ul class="w-full p-4 flex flex-row justify-center items-center">
              <li class="w-8 h-8 m-4 bg-black cursor-pointer rounded-3xl punto activo"></li>
              <li class="w-8 h-8 m-4 bg-black cursor-pointer rounded-3xl punto"></li>
              <li class="w-8 h-8 m-4 bg-black cursor-pointer rounded-3xl punto"></li>
            </ul>
          </div>
        </div>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-3 lg:px-8">
          <h1 class="text-3xl font-bold tracking-tight flex justify-center text-[#f8fafc]">
            Producto Destacado del Año !!
          </h1>
          <br>
          <br>
          <hr class="text-[#f8fafc]" />
        </div>


        <?php
        $sql = "SELECT * FROM productos where nombre = 'Apple iPhone 12 Pro'";
        $conexion = mysqli_query($con, $sql);
        if (mysqli_num_rows($conexion) != 0) {
          echo '<div class="mx-auto max-w-7xl flex flex-wrap justify-center p-6 gap-6">';
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
              <a href="index.php?modulo=producto&id=<?php echo $dato['id'] ?>">
                <div class="relative flex items-center overflow-hidden rounded-xl">
                  <img src="<?php echo $primeraImagen; ?>" alt="<?php echo $dato['nombre']; ?>" class="w-auto h-auto object-cover" />
                  <div class="absolute bottom-0 left-0 right-0 flex items-center justify-between p-2 bg-blue-500 text-white opacity-80 hover:opacity-100 transition duration-300">
                    <div class="flex items-center space-x-1.5">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                      </svg>
                      <?php
                      if (!empty($_SESSION['nombre_usuario'])) {
                      ?>
                        <a href="index.php?modulo=carrito&accion=agregar_carrito&precio=<?php echo $dato['precio'] ?>&id=<?php echo $dato['id'] ?>">
                          <input type="button" class="text-sm">Añadir al Carrito
                        </a>
                      <?php
                      } else {
                      ?>
                        <a href="index.php?modulo=registro">
                          <p>Debe estar registrado para realizar la compra</p>
                        </a>

                      <?php
                      }
                      ?>


                    </div>

                  </div>
                </div>

                <div class="mt-1 p-2">
                  <h2 class="text-slate-700"><?php echo $dato['nombre']; ?></h2>
                  <div class="mt-3 flex items-end justify-between">
                    <p class="text-lg font-bold text-blue-500">$<?php echo $dato['precio']; ?></p>
                  </div>

                </div>
                <div class="flex justify-center mb-3">
                  <button type="submit" class="mt-6 flex justify-center w-1/2 rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">
                    <a href="index.php?modulo=producto&id=<?php echo $dato['id'] ?>">Ver detalles</a>
                  </button>
                </div>
              </a>
            </article>
        <?php
          }
          echo '</div>';
        }
        ?>
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
        <div class="myk-wa">
          <div class="myk-item" data-wanumber="3764534003" data-waname="Facu Dominguez"></div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
          $(document).ready(function() {
            $(".myk-wa").WAFloatBox();
          });
        </script>
        <script src="./src/JavaScript/wafloatbox-0.2.js"></script>
      </footer>
    <?php
    }
    ?>


  </div>
</body>

</html>