<!DOCTYPE html>
<html lang="en">

<head>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Usuarios</title>
</head>

<div class="container is-fluid">
    <div class="col-xs-12">
        <h1>Bienvenido Administrador <?php echo $_SESSION['nombre_usuario']; ?></h1>
        <br>
        <h1>Lista de usuarios</h1>
        <br>
        <div>
            <a class="btn btn-success" href="index.php?modulo=registro">Nuevo usuario
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <br>
        <br>
        <table class="table table-striped table-dark " id="table_id">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $SQL = "SELECT clientes.id, clientes.nombre, clientes.email,
                 permisos.rol FROM clientes
                LEFT JOIN permisos ON clientes.rol = permisos.id";
                $dato = mysqli_query($con, $SQL);
                if ($dato->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($dato)) {

                ?>
                        <tr>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['email']; ?></td>
                            <td><?php echo $fila['rol']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="index.php?modulo=editar_usuario&id=<?php echo $fila['id'] ?> ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="eliminar_user.php?id=<?php echo $fila['id'] ?>">
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
                </body>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script src="../js/user.js"></script>

</html>