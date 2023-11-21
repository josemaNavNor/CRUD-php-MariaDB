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
                <form action="save_propiedad.php" method="POST">

                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Nombre propiedad" autofocus>
                    </div>

                    <div class="form-group">
                        <input type="text" name="direccion" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Direccion" autofocus>
                    </div>

                    <div class="form-group">
                        <input type="text" name="tamanio" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Tamanio" autofocus>
                    </div>

                    <div class="form-group">
                        <input type="text" name="num_habitantes" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Numero habitantes" autofocus>
                    </div>

                    <div class="form-group">
                        <input type="text" name="precio" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Precio" autofocus>
                    </div>

                    <div class="form-group">
                        <input type="text" name="estado" class="form-control" style="margin-bottom: 10px;"
                            placeholder="Estado" autofocus>
                    </div>

                    <input type="submit" class="btn btn-success btn-block" class="form-center" style="margin-top:10px"
                        name="save" value="Guardar">

                </form>
            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered" style="text-align:center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Tamanio</th>
                        <th>Numero Habitantes</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM propiedad";
                    $result_agente = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_agente)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['nombre'] ?>
                            </td>
                            <td>
                                <?php echo $row['direccion'] ?>
                            </td>
                            <td>
                                <?php echo $row['tamanio'] ?>
                            </td>
                            <td>
                                <?php echo $row['num_habitantes'] ?>
                            </td>
                            <td>
                                <?php echo $row['precio'] ?>
                            </td>
                            <td>
                                <?php echo $row['estado'] ?>
                            </td>
                            <td>
                                <a href="update_propiedad.php?id=<?php echo $row['id'] ?>">Editar</a>
                            </td>
                            <td>
                                <a href="delete_propiedad.php?id=<?php echo $row['id'] ?>">Eliminar</a>
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
                    <h2>Guardar datos en dimension Propiedad:</h1>

                    <input type="submit" class="btn btn-success btn-block" class="form-center" style="margin-top:10px"
                        name="save" value="Guardar">

                </form>
            </div>

        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>