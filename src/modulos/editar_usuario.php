<?php
$id = $_GET['id'];
$sql = "SELECT * FROM clientes where id = $id";
$resultado = mysqli_query($con, $sql);
$usuario = mysqli_fetch_assoc($resultado);
if(isset($_GET['accion'])){
    if ($_GET['accion'] == 'guardar_editar'){
        $sql= "UPDATE clientes SET nombre='{$_POST['nombre']}',email='{$_POST['email']}', clave='{$_POST['clave']}', rol='{$_POST['rol']}' WHERE id= $id" ;
        echo $sql;
        if (!mysqli_error($con)) { 
            echo "<script> alert('Disfrazz editado con exito');</script>";
        }else echo "<script> alert('ERROR, no se pudo editar');</script>";
    } 
    //echo "<script>window.location='index.php';</script>";
}
?>

<head>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<form action="index.php?modulo=editar_usuario&accion=guardar_editar&id=<?php echo $id?>" method="POST">
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <br>
                        <br>
                        <h3 class="text-center">Editar usuario</h3>
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Correo:</label><br>
                            <input type="email" name="email" id="email" class="form-control" placeholder="" value="<?php echo $usuario['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label><br>
                            <input type="password" name="clave" id="clave" class="form-control" value="<?php echo $usuario['clave']; ?>" required>

                        </div>

                        <div class="form-group">
                            <label for="rol" class="form-label">Rol de usuario *</label>
                            <input type="number" id="rol" name="rol" class="form-control" placeholder="Escribe el rol, 1 admin, 2 lector.." value="<?php echo $usuario['rol']; ?>" required>
                            <input type="" name="accion" value="guardar_editar">
                            <input type="" name="id" value="<?php echo $id;?>">
                        </div>

                        <br>

                        <div class="mb-3">

                            <button type="submit" class="btn btn-success">Editar</button>
                            <a href="user.php" class="btn btn-danger">Cancelar</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    

</form>