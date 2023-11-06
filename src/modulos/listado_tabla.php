<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="viewport" content="width=device-width , initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>Bowie</title>
    <link rel="stylesheet" href="./estilos/output.css" />
    <link rel="stylesheet" href="./estilos/estilo_tabla.css" />
  </head>
  <body class="h-full bg-[--color-primary]">

    <div class="min-h-full">

      <header class="bg-[--color-primary]">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <h1
            class="text-3xl font-bold tracking-tight flex justify-center text-[#f8fafc]"
          >
            Bowie.com
          </h1>
          <br />
          <hr class="text-[#f8fafc]" />
        </div>
      </header>
      <main>
        <!--Tabla de Productos-->
        <div class="relative pb-4 overflow-x-auto sm:rounded-lg flex justify-center ">
          <table class="rounded-3xl w-3/4 border-collapse text-[#030303] font-sans text-xl text-center bg-[--color-nav]" >
            <thead>
              <tr class="hover:bg-[--color-primary] hover:text-[#f8fafc]">
                <th class=" hidden sm:block p-5">
                  <span class="sr-only">Imagen</span>
                </th>
                <th class="p-5 ">Nombre</th>
                <th class="p-5">Precio</th>
                <th class="p-5">Accion</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-[--color-primary] hover:text-[#f8fafc]">
                <td class=" hidden sm:block w-32 p-4 mx-auto ">
                  <img class="ml-0.5" src="./src/imagenes/Iphone14.webp">
                </td>
                <td class="p-4">Iphone 14</td>
                <td class="p-4">$2.000</td>
                <td class="p-4"><a href="index.php?modulo=producto">Detalles</a></td>
              </tr>
              <tr class="hover:bg-[--color-primary] hover:text-[#f8fafc]">
                <td class="hidden sm:block w-32 p-4 mx-auto">
                  <img src="./src/imagenes/Placa_video.webp" alt="RX 6700 XT">
                </td>
                <td class="p-4">Placa de video RX 6700 XT</td>
                <td class="p-4">$500</td>
                <td class="p-4"><a href="index.php?modulo=producto">Detalles</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
    <footer class="bg-[#262626] w-full fixed bottom-0">
      <div class="flex justify-center">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
          <!-- Your content -->
          <h1 class="text-[#f8fafc]">Copyright &copy; Bowie.com</h1>
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <a
                class="rounded-md px-3 py-2 text-sm font-medium"
                href="https://twitter.com"
                target="_blank"
              >
                <img
                  class="h-8 w-8"
                  src="./src/imagenes/logo_twitter.png"
                  alt="Twitter"
                />
              </a>
              <a
                class="rounded-md px-3 py-2 text-sm font-medium"
                href="https://facebook.com"
                target="_blank"
              >
                <img
                  class="h-8 w-8"
                  src="./src/imagenes/logo_facebook.png"
                  alt="Facebook"
                />
              </a>
              <a
                class=" rounded-md px-3 py-2 text-sm font-medium"
                href="https://linkedin.com"
                target="_blank"
              >
                <img
                  class="h-8 w-8"
                  src="./src/imagenes/logo_linkedin.png"
                  alt="LinkedIn"
                />
              </a>
              <a
                class="rounded-md px-3 py-2 text-sm font-medium"
                href="https://instagram.com"
                target="_blank"
              >
                <img
                  class="h-8 w-8"
                  src="./src/imagenes/logo_instagram.png"
                  alt="Instagram"
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
