<?php
if (isset($_GET['salir'])) {
    session_destroy();
    echo "<script>window.location='index.php';</script>";
}
if (isset($_POST['email']) && isset($_POST['clave'])) {
    $sql = "SELECT * FROM clientes WHERE email= '" . $_POST['email'] . "' AND clave='" . $_POST['clave'] . "'";
    echo $sql;
    $sql = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql) != 0) {
        $r = mysqli_fetch_array($sql);
        $_SESSION['id'] = $r['id'];
        $_SESSION['nombre_usuario'] = $r['email'];
        $_SESSION['rol'] = $r['rol'];

        echo "<script> alert ('Bienvenido: " . $_SESSION['nombre_usuario'] . "');</script>";
        //crear la sesion
    } else {
        echo "<script> alert('Verifique los datos.');</script>";
    }
    echo "<script>window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width , initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>Bowie</title>
    <link rel="stylesheet" href="./src/estilos/output.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<header class="bg-[--color-primary]">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight flex justify-center text-[#f8fafc]">
            Agregar Producto
        </h1>
    </div>
</header>
<main class="bg-[--color-primary]">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="container ml-auto mr-auto flex items-center justify-center">
            <div class="w-full md:w-1/2 ">

                <!-- Formulario -->
                <form class="bg-white px-8 pt-6 pb-8 mb-4 rounded-lg" action="index.php?modulo=agregar_producto" method="POST">
                    <div class="mb-4">
                        <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                            <div class="sm:col-span-4 justify-center mt-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre"> Nombre </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" name="nombre" type="text" placeholder="Nombre del producto" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="precio"> Precio </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="precio" name="precio" type="text" placeholder="Precio del producto" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="descripcion"> Descripcion </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descripcion" name="descripcion" type="textarea" placeholder="Descripción del producto" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="precio"> Color </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="color" name="color" type="text" placeholder="Color del producto" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="precio"> Agregar Fotos </label>
                        <div style="position: relative;">
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2 mt-2" id="foto" name="foto" type="file" placeholder="Agregue Fotos" required>
                            <button class="btn btn-success mt-2" id="boton" onclick="agregarFotos()">Agregar mas fotos</button>
                        </div>
                        <div class="mt-2 mb-2" id="contenedor"></div>
                        <script>
                            var numInputs = 1;
                            function agregarFotos() {
                                // Obtener el elemento div contenedor
                                var contenedor = document.getElementById("contenedor");
                                // Crear un nuevo input de tipo file con un id y un name que incluyan el número de inputs creados
                                var nuevoInput = document.createElement("input");
                                nuevoInput.setAttribute("type", "file");
                                nuevoInput.setAttribute("id", "foto" + numInputs);
                                nuevoInput.setAttribute("name", "foto" + numInputs);
                                nuevoInput.setAttribute("class", "mb-2" + numInputs);
                                // Agregar el nuevo input al elemento div contenedor
                                contenedor.appendChild(nuevoInput);
                                // Incrementar la variable global que lleva la cuenta de los inputs creados
                                numInputs++;
                            }
                        </script>
                    </div>
                    <div class="flex items-center justify-between mt-3 ">
                        <button class="bg-[--color-primary] text-white font-bold py-2 px-4 rounded mb-2">Agregar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<footer class="bg-[#262626] w-full ">
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

</footer>

</html>