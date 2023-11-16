<!DOCTYPE html>
<html lang="en">

<head>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Productos</title>
</head>
<div class="bg-[--color-primary]">
    <div class="container is-fluid">
        <div class="col-xs-12">
            <h1 class="text-3xl mt-6 font-bold tracking-tight flex justify-center text-[#f8fafc]">
                Administrador: <?php echo $_SESSION['nombre_usuario']; ?>
            </h1>
            <br />
            <hr class="bg-white">
            <h3 class="text-white">Ventas Realizadas</h3>
            <br>
            <br>
            <br>
            <table class="table table-striped table-dark " id="table_id">
                <thead>
                    <tr>
                        <th>id Compra</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Metodo de Pago</th>
                        <th>Dirección</th>
                        <th>Email del Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_usuario = $_SESSION['rol'];
                    $SQL = "CALL MostrarVentasConConteo($id_usuario)";
                    $dato = mysqli_query($con, $SQL);
                    // Obtener el mensaje de cantidad de ventas
                    $mensajeVentas = "";
                    if (mysqli_error($con)) {
                        echo "Hola";
                    } else {
                        if (mysqli_more_results($con)) {
                            mysqli_next_result($con); // Moverse al siguiente resultado (mensaje)
                            if ($resultado = mysqli_store_result($con)) {
                                $row = mysqli_fetch_assoc($resultado);
                                $mensajeVentas = $row['mensaje'];
                                mysqli_free_result($resultado);
                            }
                        }
                        if ($dato->num_rows > 0) {
                            while ($fila = mysqli_fetch_assoc($dato)) {

                    ?>
                                <tr>
                                    <td><?php echo $fila['id']; ?></td>
                                    <td><?php echo $fila['fecha']; ?></td>
                                    <td>$<?php echo number_format($fila['total'], 2, ',', '.'); ?></td>
                                    <td><?php echo $fila['metodo_pago']; ?></td>
                                    <td><?php echo $fila['direccion_envio']; ?></td>
                                    <td><?php echo $fila['email_cliente']; ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr class="text-center">
                                <td colspan="16">No existen Ventas</td>
                            </tr>
                    <?php

                        }
                    }
                    ?>


            </table>
        </div>
        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
            <div class="mb-2 flex justify-between">
                <p class="text-gray-700 font-bold"><?php echo $mensajeVentas ?></p>
            </div>

        </div>

    </div>

</div>

</html>