<?php
$id = $_GET['id'];

if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
    // Obtener la carpeta del producto
    $carpetaProducto = "imagenes/productos/" . $id . "/";
    // Verificar si la carpeta existe
    if (file_exists($carpetaProducto)) {
        // Eliminar la carpeta y su contenido
        eliminarCarpeta($carpetaProducto);
    }
    // Eliminar registros de la tabla productos_files
    $sqlEliminarImagenes = "DELETE productos_files FROM productos_files
    INNER JOIN productos ON productos_files.producto_id = productos.id
    WHERE productos.id = ?";
    $stmtEliminarImagenes = mysqli_prepare($con, $sqlEliminarImagenes);
    mysqli_stmt_bind_param($stmtEliminarImagenes, "i", $id);
    mysqli_stmt_execute($stmtEliminarImagenes);

    // Verificar si se produjeron errores
    if (mysqli_error($con)) {
        echo "<script>alert('Error al eliminar registros de productos_files: " . mysqli_error($con) . "');</script>";
    } else {
        // Ahora, eliminar el producto de la tabla productos
        $sqlEliminarProducto = "DELETE FROM productos WHERE id = ?";
        $stmtEliminarProducto = mysqli_prepare($con, $sqlEliminarProducto);
        mysqli_stmt_bind_param($stmtEliminarProducto, "i", $id);
        mysqli_stmt_execute($stmtEliminarProducto);

        // Verificar si se produjeron errores
        if (mysqli_error($con)) {
            echo "<script>alert('Error al eliminar el producto: " . mysqli_error($con) . "');</script>";
        } else {
            echo "<script>alert('Producto eliminado con éxito');</script>";
        }
    }

    // Cerrar las declaraciones preparadas
    mysqli_stmt_close($stmtEliminarImagenes);
    mysqli_stmt_close($stmtEliminarProducto);
    echo "<script>window.location='index.php?modulo=listado_tabla';</script>";
}

function eliminarCarpeta($carpeta)
{
    $archivos = glob($carpeta . '/*');
    foreach ($archivos as $archivo) {
        is_dir($archivo) ? eliminarCarpeta($archivo) : unlink($archivo);
    }
    rmdir($carpeta);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-danger text-center">
                    <p>¿Desea confirmar la eliminacion del registro?</p>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <form action="index.php?modulo=eliminar_producto&accion=eliminar&id=<?php echo $id ?>" method="POST">
                            <input type="hidden" name="accion" value="eliminar_registro">
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <input type="submit" name="" value="Eliminar" class=" btn btn-danger">
                            <a href="index.php?modulo=listado_tabla" class="btn btn-success">Cancelar</a>
                        </form>

                    </div>
                </div>



</body>

</html>