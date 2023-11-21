<?php
include('database/db.php');


if (isset($_GET['id'])) {
    $ID_Cliente = $_GET['id'];
    $query = "SELECT * FROM cliente WHERE id = $ID_Cliente";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $direccion = $row['direccion'];
        $num_telefono = $row['num_telefono'];
        $correo = $row['correo_electronico'];
        
    }
}
if (isset($_POST['actualizar'])) {
    $ID_Cliente = $_GET['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $num_telefono = $_POST['num_telefono'];
    $correo = $_POST['correo_electronico'];
    

    $query = "UPDATE cliente SET nombre = '$nombre', direccion = '$direccion', num_telefono = '$num_telefono', correo_electronico = '$correo' WHERE id = $ID_Cliente";
    mysqli_query($conn, $query);
    header("Location: index_cliente.php");
}

?>
<?php include("includes/header.php") ?>

<div class="container p-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update_cliente.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control"
                            placeholder="Actualiza el nombre">
                    </div>

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="direccion" value="<?php echo $direccion; ?>" class="form-control"
                            placeholder="Actualiza la direccion">
                    </div>

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="num_telefono" value="<?php echo $num_telefono; ?>" class="form-control"
                            placeholder="Actualiza el telefono">
                    </div>

                    <div class="form-group"style="margin-top: 10px">
                        <input type="text" name="correo_electronico" value="<?php echo $correo; ?>" class="form-control"
                            placeholder="Actualiza el correo">
                    </div>

                    <button class="btn-success" name="actualizar" style="margin-top: 10px">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>