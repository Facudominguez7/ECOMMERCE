<!DOCTYPE html>
<html lang="en">
<head>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Productos</title>
</head>
<div class="bg-[--color-primary] h-auto">
<div class="container is-fluid">
    <div class="col-xs-12">
        <h1>Bienvenido Administrador <?php echo $_SESSION['nombre_usuario']; ?></h1>
        <br>
        <h1>Lista de productos</h1>
        <br>
        <div>
            <a class="btn btn-success" href="index.php?modulo=agregar_producto">Nuevo Producto
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <br>
        <br>
        <table class="table table-striped table-dark " id="table_id">
            <thead>
                <tr>
                    <th>id Producto</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $SQL = "SELECT * FROM productos";
                $dato = mysqli_query($con, $SQL);
                if ($dato->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($dato)) {

                ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td>$<?php echo $fila['precio']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="index.php?modulo=editar_producto&id=<?php echo $fila['id'] ?> ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="index.php?modulo=eliminar_producto&id=<?php echo $fila['id'] ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr class="text-center">
                        <td colspan="16">No existen registros</td>
                    </tr>
                <?php
                }
                ?>
                
        </table>
    </div>
</div>
</div>

</html>