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
            <h3 class="text-white">Compras Realizadas</h3>
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_usuario = $_SESSION['rol'];
                    $SQL = "CALL MostrarVentas($id_usuario)";
                    $dato = mysqli_query($con, $SQL);
                    if ($dato->num_rows > 0) {
                        while ($fila = mysqli_fetch_array($dato)) {

                    ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['fecha']; ?></td>
                                <td>$<?php echo number_format($fila['total'], 2, ',', '.'); ?></td>
                                <td><?php echo $fila['metodo_pago']; ?></td>
                                <td><?php echo $fila['direccion_envio']; ?></td>
                                <td>
                                    <a href="index.php?modulo=Detalle_Venta&accion=ver_detalle&idVenta=<?php echo $fila['id']; ?>" class="text-white">Ver Detalles</a>
                                </td>
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
                    ?>

            </table>
        </div>
    </div>
</div>


</html>