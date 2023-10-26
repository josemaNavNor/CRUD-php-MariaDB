<?php
include('database/db.php');


if (isset($_GET['ID_Propiedad'])) {
    $ID_Propiedad = $_GET['ID_Propiedad'];
    $query = "SELECT * FROM propiedad WHERE ID_Propiedad = $ID_Propiedad";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $direccion = $row['direccion'];
        $tamanio = $row['tamanio'];
        $num_habitantes = $row['num_habitantes'];
        $precio = $row['precio'];
        $estado = $row['estado'];
        $agente = $row['FK_Agente'];
        
    }
}
if (isset($_POST['actualizar'])) {
    $ID_Agente = $_GET['ID_Propiedad'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $tamanio = $_POST['tamanio'];
    $num_habitantes = $_POST['num_habitantes'];
    $precio = $_POST['precio'];
    $estado = $_POST['estado'];
    $agente = $_POST['FK_Agente'];
    

    $query = "UPDATE propiedad SET nombre = '$nombre', direccion = '$direccion', tamanio = '$tamanio', num_habitantes = '$num_habitantes', precio = '$precio', estado = '$estado' WHERE ID_Propiedad = $ID_Propiedad";
    mysqli_query($conn, $query);
    header("Location: index_propiedad.php");
}

?>
<?php include("includes/header.php") ?>

<div class="container p-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update_propiedad.php?ID_Propiedad=<?php echo $_GET['ID_Propiedad']; ?>" method="POST">

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control"
                            placeholder="Actualiza el nombre">
                    </div>

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="direccion" value="<?php echo $direccion; ?>" class="form-control"
                            placeholder="Actualiza la direccion">
                    </div>

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="tamanio" value="<?php echo $tamanio; ?>" class="form-control"
                            placeholder="Actualiza el tamanio">
                    </div>

                    <div class="form-group"style="margin-top: 10px">
                        <input type="text" name="num_habitantes" value="<?php echo $num_habitantes; ?>" class="form-control"
                            placeholder="Actualiza el numero habitantes">
                    </div>

                    <div class="form-group"style="margin-top: 10px">
                        <input type="text" name="precio" value="<?php echo $precio; ?>" class="form-control"
                            placeholder="Actualiza el precio">
                    </div>

                    <div class="form-group"style="margin-top: 10px">
                        <input type="text" name="estado" value="<?php echo $estado; ?>" class="form-control"
                            placeholder="Actualiza el estado">
                    </div>

                    <button class="btn-success" name="actualizar" style="margin-top: 10px">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>