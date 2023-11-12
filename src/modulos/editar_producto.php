<?php
$id = $_GET['id'];
$sql = "SELECT * FROM productos where id = $id";
$resultado = mysqli_query($con, $sql);
$producto = mysqli_fetch_assoc($resultado);
if(isset($_GET['accion'])){
    if ($_GET['accion'] == 'guardar_editar'){
        $sql_update = "UPDATE productos SET nombre=?, precio=?, descripcion=?, color=? WHERE id=?";
        $consulta_preparada = mysqli_prepare($con, $sql_update);
        mysqli_stmt_bind_param($consulta_preparada, "ssssi", $_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['color'], $id);
        mysqli_stmt_execute($consulta_preparada);
        if (!mysqli_error($con)) { 
            echo "<script> alert('producto modificado con éxito');</script>";
        }else{
            echo "<script> alert('ERROR, no se pudo editar');</script>";
        } 
    } 
    echo "<script>window.location='index.php?modulo=listado_tabla';</script>";
}
?>

<head>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<form action="index.php?modulo=editar_producto&accion=guardar_editar&id=<?php echo $id?>" method="POST">
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <br>
                        <br>
                        <h3 class="text-center">Editar Producto</h3>
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $producto['nombre']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label><br>
                            <input type="number" name="precio" id="precio" class="form-control" value="<?php echo $producto['precio']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">descripción:</label><br>
                            <textarea name="descripcion" id="descripcion" class="form-control" required><?php echo $producto['descripcion']; ?></textarea>

                        </div>

                        <div class="form-group">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" id="color" name="color" class="form-control" placeholder="Color del producto" value="<?php echo $producto['color']; ?>" required>
                            <input type="hidden" name="accion" value="guardar_editar">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                        </div>

                        <br>

                        <div class="mb-3">

                            <button type="submit" class="btn btn-success">Editar</button>
                            <a href="index.php?modulo=listado_tabla" class="btn btn-danger">Cancelar</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    

</form>