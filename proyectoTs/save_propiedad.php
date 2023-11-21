<?php 

    include("database/db.php");

    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $tamanio = $_POST['tamanio'];
        $num_habitantes = $_POST['num_habitantes'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];
        
        $query = "INSERT INTO propiedad (nombre, direccion, tamanio, num_habitantes, precio, estado)
        VALUES ('$nombre', '$direccion', '$tamanio', '$num_habitantes', '$precio', '$estado')";
        $resultado = mysqli_query($conn,$query);

        if(!$resultado){
            die("Query Failed!");
        }

        $_SESSION["message"] = "Propiedad registrada satistactoriamente!";
        $_SESSION["message_type"] = "success";

        header("Location: index_propiedad.php");
    }

?>