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
</head>

<body class="h-full bg-[--color-primary]">
  <div class="min-h-full">
    <nav class="bg-[--color-nav]">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-8 w-8" src="./src/imagenes/Logo_tienda.jpeg" alt="Bowie.com" />
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="index.php" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]" aria-current="page">Inicio</a>
                <a href="index.php?modulo=listado_tabla" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Tabla de Productos</a>
                <a href="index.php?modulo=listado_box" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Box de Productos</a>
                <?php
                if (!empty($_SESSION['nombre_usuario'])) {
                ?>
                  <a href="index.php?modulo=registro" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary] hidden">Registrarse</a>
                  <a href="index.php?modulo=iniciar_sesion" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary] hidden">Iniciar Sesion</a>
                  <p>Bienvenido <?php echo $_SESSION['nombre_usuario']; ?></p>
                  <a href="index.php?modulo=iniciar_sesion&salir=ok" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Cerrar Sesión</a>
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
          <a href="index.php?modulo=listado_tabla" class="text-gray-300 h hover:text-white rounded-md px-3 py-2 text-sm font-medium">Tabla de Productos</a>
          <a href="index.php?modulo=listado_box" class="text-gray-300 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Box de Productos</a>
          <a href="index.php?modulo=registro" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Registrarse</a>
          <a href="index.php?modulo=iniciar_sesion" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-[--color-primary]">Iniciar Sesion</a>
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
          <h1 class="text-3xl font-bold tracking-tight flex justify-center text-[#f8fafc]">
            Bienvenidos
          </h1>
          <br />
          <hr class="text-[#f8fafc]" />
        </div>
      </header>
      <main class="bg-[--color-primary]">

        <div class="mx-auto w-full max-w-2xl flex justify-center items-stretch pb-4 px-4 sm:px-6 lg:px-8">
          <div class="w-full bg-[--color-nav] rounded-3xl overflow-x-hidden">
            <div class="grande w-300p flex flex-row justify-start items-center">
              <img src="./src/Imagenes/SliderS23u.webp" alt="Imagen Slider s23" class="img" />
              <img src="./src/Imagenes/Z_flip5_slider.webp" alt="Imagen Slider Zflip5" class="img" />
              <img src="./src/Imagenes/Z_fold_5_Slider.webp" alt="Imagen Z fold 5" class="img" />
            </div>

            <ul class="w-full p-4 flex flex-row justify-center items-center">
              <li class="w-8 h-8 m-4 bg-black cursor-pointer rounded-3xl punto activo"></li>
              <li class="w-8 h-8 m-4 bg-black cursor-pointer rounded-3xl punto"></li>
              <li class="w-8 h-8 m-4 bg-black cursor-pointer rounded-3xl punto"></li>
            </ul>
          </div>
          <script>
            const grande = document.querySelector(".grande");
            const punto = document.querySelectorAll(".punto");

            // Declara una variable "intervalo" que se utilizará para controlar el intervalo de cambio automático de imágenes.
            let intervalo;

            // Itera a través de cada elemento HTML con la clase "punto".
            punto.forEach((cadaPunto, i) => {
              // Agrega un evento de clic a cada punto.
              cadaPunto.addEventListener("click", () => {
                // Obtiene la posición del punto en el conjunto de puntos.
                let posicion = i;

                // Calcula el valor de transformación para mover la imagen en el carrusel.
                let operacion = posicion * -33.3;

                // Aplica la transformación al elemento "grande" para cambiar la imagen.
                grande.style.transform = `translateX(${operacion}%)`;

                // Remueve la clase "activo" de todos los puntos.
                punto.forEach((cadaPunto, i) => {
                  cadaPunto.classList.remove("activo");
                });

                // Agrega la clase "activo" al punto que se hizo clic.
                cadaPunto.classList.add("activo");

                // Limpia el intervalo actual para detener el cambio automático de imágenes.
                clearInterval(intervalo);

                // Incrementa la posición para avanzar a la siguiente imagen.
                posicion++;

                // Verifica si se alcanzó la última imagen y vuelve al principio si es necesario.
                if (posicion > punto.length - 1) {
                  posicion = 0;
                }

                // Actualiza el índice de imagen actual.
                indice = posicion;

                // Inicia un nuevo intervalo de cambio automático de imágenes después de 2 segundos.
                intervalo = setInterval(moverGrande, 4000);
              });
            });

            let indice = 0;
            // Función que se encarga de cambiar automáticamente la imagen en el carrusel.
            function moverGrande() {
              // Calcula el valor de transformación para mover la imagen en el carrusel.
              let operacion = indice * -33.3;

              // Aplica la transformación al elemento "grande" para cambiar la imagen.
              grande.style.transform = `translateX(${operacion}%)`;

              // Remueve la clase "activo" de todos los puntos.
              punto.forEach((cadaPunto, i) => {
                cadaPunto.classList.remove("activo");
              });

              // Agrega la clase "activo" al punto correspondiente a la imagen actual.
              punto[indice].classList.add("activo");

              // Incrementa el índice para avanzar a la siguiente imagen.
              indice++;

              // Verifica si se alcanzó la última imagen y vuelve al principio si es necesario.
              if (indice > punto.length - 1) {
                indice = 0;
              }
            }

            // Inicia el intervalo de cambio automático de imágenes cada 2 segundos.
            intervalo = setInterval(moverGrande, 4000);
          </script>
        </div>

      </main>

      <footer class="bg-[#262626] w-full fixed bottom-0">
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