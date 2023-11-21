<?php include("database/db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-5">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert- <?= $_SESSION['message_type'] ?>   alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset();
            } ?>


            <div class="card card-body">
                <form action="save_transaccion.php" method="POST">

                    <div class="form-group">
                        <input type="date" name="fecha" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Fecha" autofocus>
                    </div>

                    <div>
                        <input type="text" name="tipo" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Tipo" autofocus>
                    </div>

                    <div class="form-group" style="margin-buttom: 10px;">
                        <input type="text" name="ID_Propiedad" class="form-control" placeholder="Propiedad" autofocus>
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <input type="text" name="ID_Cliente" class="form-control" placeholder="Cliente" autofocus>
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <input type="text" name="ID_Agente" class="form-control" placeholder="Agente" autofocus>
                    </div>


                    <input type="submit" class="btn btn-success btn-block" class="form-center" style="margin-top:10px"
                        name="save" value="Guardar">

                </form>
            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Propiedad</th>
                        <th>Cliente</th>
                        <th>Agente</th>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM transaccion";
                    $result_transaccion = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_transaccion)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['ID_Propiedad'] ?>
                            </td>
                            <td>
                                <?php echo $row['ID_Cliente'] ?>
                            </td>
                            <td>
                                <?php echo $row['ID_Agente'] ?>
                            </td>
                            <td>
                                <?php echo $row['fecha'] ?>
                            </td>
                            <td>
                                <?php echo $row['tipo'] ?>
                            </td>

                            <td>
                                <a href="update_transaccion.php?id=<?php echo $row['id'] ?>">Editar</a>
                            </td>
                            <td>
                                <a href="delete_transaccion.php?id=<?php echo $row['id'] ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div>
                <h2>Pagina principal</h2>
                <p><a href="index.html">Aqui!</a></p>
            </div>

            <div class="card card-body">
                <form action="ETL.php" method="POST">
                    <h2>Guardar fecha en dimension tiempo:</h1>

                        <input type="submit" class="btn btn-success btn-block" class="form-center"
                            style="margin-top:10px" name="save_fecha" value="Guardar">

                </form>
            </div>


            <div class="card card-body">
                <form action="ETL.php" method="POST">
                    <h2>Guardar venta en Tabla de Hechos:</h1>

                        <input type="submit" class="btn btn-success btn-block" class="form-center"
                            style="margin-top:10px" name="save_venta" value="Guardar">

                </form>
            </div>

        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>