<?php 

    include("database/db.php");

    if(isset($_POST['save'])){
        $id = $_POST['ID_Propiedad'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $tamanio = $_POST['tamanio'];
        $num_habitantes = $_POST['num_habitantes'];
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];
        $agente = $_POST['FK_Agente'];
        
        $query = "INSERT INTO propiedad (ID_Propiedad,nombre, direccion, tamanio, num_habitantes, precio, estado, FK_Agente)
        VALUES ('$id','$nombre', '$direccion', '$tamanio', '$num_habitantes', '$precio', '$estado', '$agente')";
        $resultado = mysqli_query($conn,$query);

        if(!$resultado){
            die("Query Failed!");
        }

        $_SESSION["message"] = "Propiedad registrada satistactoriamente!";
        $_SESSION["message_type"] = "success";

        header("Location: index_propiedad.php");
    }

?>