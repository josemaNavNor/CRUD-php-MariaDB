<?php
include('database/db.php');


if (isset($_GET['ID_Transaccion'])) {
    $ID_Transaccion = $_GET['ID_Transaccion'];
    $query = "SELECT * FROM transaccion WHERE ID_Transaccion = $ID_Transaccion";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $fecha = $row['fecha'];
        $tipo = $row['tipo'];
        $propiedad = $row['FK_Propiedad'];
        $cliente = $row['FK_Cliente'];
        $agente = $row['FK_Agente'];
        
    }
}
if (isset($_POST['actualizar'])) {
    $id = $_POST['ID_Transaccion'];
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo'];
    $propiedad = $_POST['FK_Propiedad'];
    $cliente = $_POST['FK_Cliente'];
    $agente = $_POST['FK_Agente'];

    

    $query = "UPDATE transaccion SET fecha = '$fecha',  tipo = '$tipo' WHERE ID_Transaccion = $ID_Transaccion";
    mysqli_query($conn, $query);
    header("Location: index_transaccion.php");
}

?>
<?php include("includes/header.php") ?>

<div class="container p-5">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update_transaccion.php?ID_Transaccion=<?php echo $_GET['ID_Transaccion']; ?>" method="POST">

                    <div class="form-group" style="margin-top: 10px">
                        <input type="date" name="fecha" value="<?php echo $fecha; ?>" class="form-control"
                            placeholder="Actualiza la fecha">
                    </div>

                    <div class="form-group" style="margin-top: 10px">
                        <input type="text" name="tipo" value="<?php echo $tipo; ?>" class="form-control"
                            placeholder="Actualiza el tipo">
                    </div>

                    <button class="btn-success" name="actualizar" style="margin-top: 10px">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>