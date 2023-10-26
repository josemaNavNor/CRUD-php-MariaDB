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
                <form action="save_cliente.php" method="POST">

                    <div>
                        <input type="text" name="ID_Cliente" placeholder="Id cliente"
                            style="margin-bottom: 10px; width: 100; text-align: center;">
                    </div>

                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Nombre Cliente" autofocus>
                    </div>

                    <div>
                        <input type="text" name="direccion" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Direccion" autofocus>
                    </div>

                    <div class="form-group" style="margin-buttom: 10px;">
                        <input type="text" name="num_telefono" class="form-control" placeholder="Telefono" autofocus>
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <input type="text" name="correo_electronico" class="form-control" placeholder="Correo"
                            autofocus>
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
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM cliente";
                    $result_agente = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_agente)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['ID_Cliente'] ?>
                            </td>
                            <td>
                                <?php echo $row['nombre'] ?>
                            </td>
                            <td>
                                <?php echo $row['direccion'] ?>
                            </td>
                            <td>
                                <?php echo $row['num_telefono'] ?>
                            </td>
                            <td>
                                <?php echo $row['correo_electronico'] ?>
                            </td>
                            <td>
                                <a href="update_cliente.php?ID_Cliente=<?php echo $row['ID_Cliente']?>">Editar</a>
                            </td>
                            <td>
                                <a href="delete_cliente.php?ID_Cliente=<?php echo $row['ID_Cliente']?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div>
                <h2>Pagina principal</h2>
                <p><a href="index.html">Aqui!</a></p>
            </div>
        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>