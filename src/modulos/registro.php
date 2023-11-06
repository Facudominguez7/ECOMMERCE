<?php
if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['clave'])) {
    //Verifico que no existe el usuario 
    $sql = "SELECT * FROM clientes WHERE nombre = '" . $_POST['nombre'] . "'";
    $sql = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql) != 0) {
        echo "<script>alert('Error: El usuario ya existe');</script>";
    } else {
        //inserto el usuario nuevo
        echo $sql = "INSERT INTO clientes (nombre, email, clave) values ('" . $_POST['nombre'] . "', '" . $_POST['email'] . "', '".$_POST['clave']."')";
        $sql = mysqli_query($con, $sql);
        if (mysqli_error($con)) {
            echo "<script>alert('Error no se pudo insertar el registro');</script>";
        } else {
            echo "<script>alert('Registro insertado con exito');</script>";
        }
    }
    echo "<script>window.location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width , initial-scale=1.0"/>
    <meta charset="UTF-8" />
    <title>Bowie</title>
    <link rel="stylesheet" href="./src/estilos/output.css"/>
</head>
<header class="bg-[--color-primary]">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight flex justify-center text-[#f8fafc]">
            Registrarse
        </h1>
        <br />
        <hr class="text-[#f8fafc]" />
    </div>
</header>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="container ml-auto mr-auto flex items-center justify-center">
            <div class="w-full md:w-1/2 ">

                <!-- Formulario -->
                <form class="bg-white px-8 pt-6 pb-8 mb-4 rounded-lg" action="index.php?modulo=registro" method="POST">
                    <div class="mb-4">
                        <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                            <div class="sm:col-span-4 justify-center">
                                <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="nya"> Nombre </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" name="nombre" type="text" placeholder="Carlos Torres" required>
                            </div>
                            <div class="sm:col-span-4 justify-center mt-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email"> Email </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="ctorres@mail.com" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 mt-2" for="asunto"> Contraseña </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="clave" name="clave" type="password" placeholder="Venta de Productos" required>
                    </div>
                    <div class="flex items-center justify-between mt-3 ">
                        <button class="bg-[--color-primary] text-white font-bold py-2 px-4 rounded mb-2">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
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

</footer>

</html>