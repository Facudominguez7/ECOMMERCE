<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="viewport" content="width=device-width , initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>Bowie</title>
    <link rel="stylesheet" href="./estilos/output.css" />
  </head>
  <body class="h-full bg-[--color-primary] ">
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
      <main class=" w-full bg-[--color-primary] ">
        
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div
            class="mx-auto container px-4 md:px-6 2xl:px-0 py-12 flex justify-center items-center"
          >
            <div class="flex flex-col jusitfy-start items-start">
              <div
                class="mt-10 lg:mt-12 grid grid-cols-1 lg:grid-cols-3 gap-x-8 gap-y-10 lg:gap-y-0"
              >
                <div class="flex flex-col">
                  <div class="relative">
                    <img
                      class="hidden lg:block"
                      src="./src/imagenes/Z_Fold_5.webp"
                      alt="Iphone 14"
                    />
                    <img
                      class="hidden sm:block lg:hidden"
                      src="./src/imagenes/Z_Fold_5.webp"
                      alt="Iphone 14"
                    />
                    <img
                      class="sm:hidden"
                      src="./src/imagenes/Z_Fold_5.webp"
                      alt="Iphone 14"
                    />
                  </div>
                  <div class="mt-6 flex justify-between items-center">
                    <div class="flex justify-center items-center">
                      <p
                        class="tracking-tight text-3xl font-semibold leading-6 dark:text-white text-[#f8fafc]"
                      >
                        Samsung Galaxy Z fold 5
                      </p>
                    </div>
                    <div class="flex justify-center items-center">
                      <button
                        aria-label="show menu"
                        onclick="handleClick1(true)"
                        class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 py-2.5 px-2 bg-gray-800 dark:bg-white dark:text-gray-800 text-white hover:text-gray-400 hover:bg-gray-200"
                      >
                        <svg
                          id="chevronUp1"
                          class="fill-stroke"
                          width="10"
                          height="6"
                          viewBox="0 0 10 6"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M9 5L5 1L1 5"
                            stroke="currentColor"
                            stroke-width="1.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                        <svg
                          id="chevronDown1"
                          class="hidden fill-stroke"
                          width="10"
                          height="6"
                          viewBox="0 0 10 6"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M1 1L5 5L9 1"
                            stroke="currentColor"
                            stroke-width="1.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div
                    id="menu1"
                    class="flex flex-col jusitfy-start items-start mt-12"
                  >
                    <div>
                      <p
                        class="tracking-tight text-base leading-3 dark:text-white text-[#f8fafc]"
                      >
                        Color
                      </p>
                    </div>
                    <div class="mt-2">
                      <p
                        class="tracking-tight text-xl font-medium leading-4 dark:text-white text-[#f8fafc]"
                      >
                        Icy Blue
                      </p>
                    </div>
                    <br />
                    <div>
                      <p
                        class="tracking-tight text-base leading-3 dark:text-white text-[#f8fafc]"
                      >
                        Memoria interna
                      </p>
                    </div>
                    <div class="mt-2">
                      <p
                        class="tracking-tight text-xl font-medium leading-4 dark:text-white text-[#f8fafc]"
                      >
                        512 GB
                      </p>
                    </div>
                    <div class="mt-6">
                      <p
                        class="tracking-tight text-3xl font-medium leading-4 dark:text-white text-[#f8fafc]"
                      >
                        $1.181.999
                      </p>
                    </div>
                    <div
                      class="flex jusitfy-between flex-col lg:flex-row items-center mt-10 w-full space-y-4 lg:space-y-0 lg:space-x-4 xl:space-x-8"
                    >
                      <div class="w-full">
                        <a
                          href="index.php?modulo=producto"
                          class="focus:outline-none focus:ring-gray-800 focus:ring-offset-2 focus:ring-2 dark:text-white text-white w-full tracking-tight p-4 py-4 text-lg leading-4 hover:bg-gray-300 hover:text-gray-800 dark:bg-transparent dark:border-white dark:hover:bg-gray-800 border border-gray-800 dark:hover:text-white"
                        >
                          Mas Información
                        </a>
                      </div>
                      <div class="w-full">
                        <button
                          class="text-[#f8fafc] focus:outline-none focus:ring-gray-800 focus:ring-offset-2 focus:ring-2 w-full tracking-tight py-4 text-lg leading-4 hover:bg-black bg-gray-800 border border-gray-800 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                          Añadir al Carrito
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="flex flex-col">
                  <div class="relative">
                    <img
                      class="hidden lg:block"
                      src="./src/imagenes/Samsung_s23_ultra.webp"
                      alt="Samsung Galaxy S23 Ultra"
                    />
                    <img
                      class="hidden sm:block lg:hidden"
                      src="./src/imagenes/Samsung_s23_ultra.webp"
                      alt="Samsung Galaxy S23 Ultra"
                    />
                    <img
                      class="sm:hidden"
                      src="./src/imagenes/Samsung_s23_ultra.webp"
                      alt="Samsung Galaxy S23 Ultra"
                    />
                  </div>
                  <div class="mt-6 flex justify-between items-center">
                    <div class="flex justify-center items-center">
                      <p
                        class="tracking-tight text-2xl font-semibold leading-6 dark:text-white text-[#f8fafc]"
                      >
                        Samsung Galaxy S23 Ultra
                      </p>
                    </div>
                    <div class="flex justify-center items-center">
                      <button
                        aria-label="show menu"
                        onclick="handleClick2(true)"
                        class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 py-2.5 px-2 bg-gray-800 dark:bg-white dark:text-gray-800 text-white hover:text-gray-400 hover:bg-gray-200"
                      >
                        <svg
                          id="chevronUp2"
                          class="hidden fill-stroke"
                          width="10"
                          height="6"
                          viewBox="0 0 10 6"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M9 5L5 1L1 5"
                            stroke="currentColor"
                            stroke-width="1.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                        <svg
                          id="chevronDown2"
                          class="fill-stroke"
                          width="10"
                          height="6"
                          viewBox="0 0 10 6"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M1 1L5 5L9 1"
                            stroke="currentColor"
                            stroke-width="1.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div
                    id="menu2"
                    class="hidden flex flex-col jusitfy-start items-start mt-12"
                  >
                    <div>
                      <p
                        class="tracking-tight text-base leading-3 dark:text-white text-[#f8fafc]"
                      >
                        Color
                      </p>
                    </div>
                    <div class="mt-2">
                      <p
                        class="tracking-tight text-xl font-medium leading-4 dark:text-white text-[#f8fafc]"
                      >
                        Phantom black
                      </p>
                    </div>
                    <br />
                    <div>
                      <p
                        class="tracking-tight text-base leading-3 dark:text-white text-[#f8fafc]"
                      >
                        Memoria Interna
                      </p>
                    </div>
                    <div class="mt-2">
                      <p
                        class="tracking-tight text-xl font-medium leading-4 dark:text-white text-[#f8fafc]"
                      >
                        512 GB
                      </p>
                    </div>
                    <div class="mt-6">
                      <p
                        class="tracking-tight text-3xl font-medium leading-4 dark:text-white text-[#f8fafc]"
                      >
                        $1.199.999
                      </p>
                    </div>
                    <div
                      class="flex jusitfy-between flex-col lg:flex-row items-center mt-10 w-full space-y-4 lg:space-y-0 lg:space-x-4 xl:space-x-8"
                    >
                      <div class="w-full">
                        <a
                          href="index.php?modulo=producto"
                          class="focus:outline-none focus:ring-gray-800 focus:ring-offset-2 focus:ring-2 text-gray-800 dark:text-white w-full tracking-tight p-4 py-4 text-lg leading-4 hover:bg-gray-300 hover:text-gray-800 dark:bg-transparent dark:border-white dark:hover:bg-gray-800 border border-gray-800 dark:hover:text-white"
                        >
                          Mas Información
                        </a>
                      </div>
                      <div class="w-full">
                        <button
                          class="text-[#f8fafc] focus:outline-none focus:ring-gray-800 focus:ring-offset-2 focus:ring-2 w-full tracking-tight py-4 text-lg leading-4 hover:bg-black bg-gray-800 border border-gray-800 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                          Añadir al Carrito
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="relative">
                    <img
                      class="hidden lg:block"
                      src="./src/imagenes/Z_Flip_5.webp"
                      alt="Samsung Galaxy S23 Ultra"
                    />
                    <img
                      class="hidden sm:block lg:hidden"
                      src="./src/imagenes/Z_Fold_5.webp"
                      alt="Samsung Galaxy S23 Ultra"
                    />
                    <img
                      class="sm:hidden"
                      src="./src/imagenes/Z_Flip_5.webp"
                      alt="Samsung Galaxy S23 Ultra"
                    />
                  </div>
                  <div class="mt-6 flex justify-between items-center">
                    <div class="flex justify-center items-center">
                      <p
                        class="tracking-tight text-2xl font-semibold leading-6 dark:text-white text-[#f8fafc]"
                      >
                        Samsung Galaxy Z Flip 5
                      </p>
                    </div>
                    <div class="flex justify-center items-center">
                      <button
                        aria-label="show menu"
                        onclick="handleClick3(true)"
                        class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 py-2.5 px-2 bg-gray-800 dark:bg-white dark:text-gray-800 text-white hover:text-gray-400 hover:bg-gray-200"
                      >
                        <svg
                          id="chevronUp3"
                          class="hidden fill-stroke"
                          width="10"
                          height="6"
                          viewBox="0 0 10 6"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M9 5L5 1L1 5"
                            stroke="currentColor"
                            stroke-width="1.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                        <svg
                          id="chevronDown3"
                          class="fill-stroke"
                          width="10"
                          height="6"
                          viewBox="0 0 10 6"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M1 1L5 5L9 1"
                            stroke="currentColor"
                            stroke-width="1.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div
                    id="menu3"
                    class="hidden flex flex-col jusitfy-start items-start mt-12"
                  >
                    <div>
                      <p
                        class="tracking-tight text-base leading-3 dark:text-white text-[#f8fafc]"
                      >
                        Color
                      </p>
                    </div>
                    <div class="mt-2">
                      <p
                        class="tracking-tight text-xl font-medium leading-4 dark:text-white text-[#f8fafc]"
                      >
                        Cream
                      </p>
                    </div>
                    <br />
                    <div>
                      <p
                        class="tracking-tight text-base leading-3 dark:text-white text-[#f8fafc]"
                      >
                        Memoria Interna
                      </p>
                    </div>
                    <div class="mt-2">
                      <p
                        class="tracking-tight text-xl font-medium leading-4 dark:text-white text-[#f8fafc]"
                      >
                        512 GB
                      </p>
                    </div>
                    <div class="mt-6">
                      <p
                        class="tracking-tight text-3xl font-medium leading-4 dark:text-white text-[#f8fafc]"
                      >
                        $659.999
                      </p>
                    </div>
                    <div
                      class="flex jusitfy-between flex-col lg:flex-row items-center mt-10 w-full space-y-4 lg:space-y-0 lg:space-x-4 xl:space-x-8"
                    >
                      <div class="w-full">
                        <a
                          href="index.php?modulo=producto"
                          class="focus:outline-none focus:ring-gray-800 focus:ring-offset-2 focus:ring-2 dark:text-white text-white w-full tracking-tight p-4 py-4 text-lg leading-4 hover:bg-gray-300 hover:text-gray-800 dark:bg-transparent dark:border-white dark:hover:bg-gray-800 border border-gray-800 dark:hover:text-white"
                        >
                          Mas Información
                        </a>
                      </div>
                      <div class="w-full">
                        <button
                          class="focus:outline-none focus:ring-gray-800 focus:ring-offset-2 focus:ring-2 text-white w-full tracking-tight py-4 text-lg leading-4 hover:bg-black bg-gray-800 border border-gray-800 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                          Añadir al Carrito
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script>
            // more free and premium Tailwind CSS components at https://tailwinduikit.com/
            handleClick1 = (flag) => {
              let icon = document.getElementById("chevronDown1");
              let icon2 = document.getElementById("chevronUp1");
              let menu = document.getElementById("menu1");
              if (flag) {
                menu.classList.toggle("hidden");
                icon.classList.toggle("hidden");
                icon2.classList.toggle("hidden");
              }
            };

            handleClick2 = (flag) => {
              let icon = document.getElementById("chevronDown2");
              let icon2 = document.getElementById("chevronUp2");
              let menu = document.getElementById("menu2");
              if (flag) {
                menu.classList.toggle("hidden");
                icon.classList.toggle("hidden");
                icon2.classList.toggle("hidden");
              }
            };

            handleClick3 = (flag) => {
              let icon = document.getElementById("chevronDown3");
              let icon2 = document.getElementById("chevronUp3");
              let menu = document.getElementById("menu3");
              if (flag) {
                menu.classList.toggle("hidden");
                icon.classList.toggle("hidden");
                icon2.classList.toggle("hidden");
              }
            };
          </script>
        </div>
        <!-- component -->
      </main>
    </div>
    <footer class="bg-[#262626] w-full">
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
                class="rounded-md px-3 py-2 text-sm font-medium"
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
