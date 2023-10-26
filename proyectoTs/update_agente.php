<?php
include('database/db.php');


if (isset($_GET['ID_Agente'])) {
    $ID_Agente = $_GET['ID_Agente'];
    $query = "SELECT * FROM agente WHERE ID_Agente = $ID_Agente";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $num_telefono = $row['num_telefono'];
        $correo = $row['correo'];
        $especialidad = $row['especialidad'];
    }
}
if (isset($_POST['actualizar'])) {
    $ID_Agente = $_GET['ID_Agente'];
    $nombre = $_POST['nombre'];
    $num_telefono = $_POST['num_telefono'];
    $correo = $_POST['correo'];
    $especialidad = $_POST['especialidad'];

    $query = "UPDATE agente SET nombre = '$nombre', num_telefono = '$num_telefono', correo = '$correo', especialidad = '$especialidad' WHERE ID_Agente = $ID_Agente";
    mysqli_query($conn, $query);
    header("Location: index_agente.php");
}

?>
<?php include("includes/header.php") ?>

<div class="container p-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update_agente.php?ID_Agente=<?php echo $_GET['ID_Agente']; ?>" method="POST">

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control"
                            placeholder="Actualiza el nombre">
                    </div>

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="num_telefono" value="<?php echo $num_telefono; ?>" class="form-control"
                            placeholder="Actualiza el telefono">
                    </div>

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="correo" value="<?php echo $correo; ?>" class="form-control"
                            placeholder="Actualiza el correo">
                    </div>

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="especialidad" value="<?php echo $especialidad; ?>" class="form-control"
                            placeholder="Actualiza la especialidad">
                    </div>

                    <button class="btn-success" name="actualizar" style="margin-top: 10px">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>