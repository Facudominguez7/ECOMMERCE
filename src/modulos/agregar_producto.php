<?php
if (
    isset($_POST['nombre']) &&
    isset($_POST['precio']) &&
    isset($_POST['descripcion']) &&
    isset($_POST['color']) &&
    isset($_POST['almacenamiento']) &&
    isset($_POST['codigo']) &&
    isset($_POST['altura']) &&
    isset($_POST['ancho']) &&
    isset($_POST['peso'])
) {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $color = $_POST['color'];
    $almacenamiento = $_POST['almacenamiento'];
    $codigo = $_POST['codigo'];
    $altura = $_POST['altura'];
    $ancho = $_POST['ancho'];
    $peso = $_POST['peso'];

    // Insertar datos en la tabla de productos
    $sqlInsertProducto = "INSERT INTO productos(nombre, precio, descripcion, color, almacenamiento, codigo, altura, ancho, peso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtProducto = mysqli_prepare($con, $sqlInsertProducto);
    mysqli_stmt_bind_param($stmtProducto, "sssssssss", $nombre, $precio, $descripcion, $color, $almacenamiento, $codigo, $altura, $ancho, $peso);
    mysqli_stmt_execute($stmtProducto);

    if (mysqli_error($con)) {
        echo "<script>alert('Error al insertar el registro en productos: " . mysqli_error($con) . "');</script>";
    } else {
        echo "<script>alert('Registro insertado en productos con éxito');</script>";
        // Obtener el ID del producto recién insertado
        $producto_id = mysqli_insert_id($con);
        // Manejar la subida de imágenes
        $carpeta_carga = "imagenes/productos/" . $producto_id . "/";

        if (!file_exists($carpeta_carga)) {
            if (!mkdir($carpeta_carga, 0777, true)) {
                echo ('Error al crear el directorio: ' . $carpeta_carga);
            }
        }

        foreach ($_FILES["lista"]["tmp_name"] as $key => $tmp_name) {
            $fileName = basename($_FILES["lista"]["name"][$key]);
            $targetFile = $carpeta_carga . $fileName;

            echo "Directorio de destino: " . $carpeta_carga . "<br>";
            echo "Archivo de destino: " . $targetFile . "<br>";

            // Mueve la imagen al directorio de destino
            if (move_uploaded_file($tmp_name, $targetFile)) {
                // Insertar datos en la tabla de imágenes
                $sqlInsertImagen = "INSERT INTO productos_files (producto_id, nombre_archivo) VALUES (?, ?)";
                $stmtImagen = mysqli_prepare($con, $sqlInsertImagen);
                mysqli_stmt_bind_param($stmtImagen, "ss", $producto_id, $fileName);
                mysqli_stmt_execute($stmtImagen);

                if (mysqli_error($con)) {
                    echo "<script>alert('Error al insertar el registro de la imagen en productos_files: " . mysqli_error($con) . "');</script>";
                } else {
                    echo "<script>alert('Registro de imagen insertado en productos_files con éxito');</script>";
                }
            } else {
                echo "<script>alert('Error al mover la imagen al directorio de destino: " . $targetFile . "');</script>";
            }
        }

        echo "<script>window.location='index.php?modulo=listado_tabla';</script>";
    }
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
                <form class="bg-white px-8 pt-6 pb-8 mb-4 rounded-lg" action="index.php?modulo=agregar_producto" method="POST" enctype="multipart/form-data">
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
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="color"> Color </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="color" name="color" type="text" placeholder="Color del producto" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="almacenamiento"> Tamaño de Almacenamiento </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="almacenamiento" name="almacenamiento" type="text" placeholder="Tamaño de Almacenamiento" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="codigo"> Codigo del Producto </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="codigo" name="codigo" type="text" placeholder="Color del producto" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="altura"> Altura </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="altura" name="altura" type="text" placeholder="Altura del producto en mm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="ancho"> Ancho </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ancho" name="ancho" type="text" placeholder="Ancho del producto en mm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="peso"> Peso </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="peso" name="peso" type="text" placeholder="Peso del producto en gramos" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="imagen"> Agregar Fotos </label>
                        <div style="position: relative;">
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2 mt-2" id="lista" name="lista[]" type="file" multiple onchange="mostrarVistaPrevia()">
                            <div id="vista_previa_container"></div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-3 ">
                        <button class="bg-[--color-primary] text-white font-bold py-2 px-4 rounded mb-2">Agregar Producto</button>
                    </div>
                    <script>
                        function mostrarVistaPrevia() {
                            var input = document.getElementById("lista");
                            var vistaPreviaContainer = document.getElementById("vista_previa_container");
                            vistaPreviaContainer.innerHTML = "";

                            if (input.files && input.files.length > 0) {
                                for (var i = 0; i < input.files.length; i++) {
                                    var imagenPrevia = document.createElement("img");
                                    imagenPrevia.src = URL.createObjectURL(input.files[i]);
                                    imagenPrevia.classList.add("vista-previa-imagen");
                                    vistaPreviaContainer.appendChild(imagenPrevia);
                                }
                            }
                        }
                    </script>
                </form>
            </div>
        </div>
    </div>
</main>

</html>