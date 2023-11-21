<?php 

    include("database/db.php");

    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $num = $_POST['num_telefono'];
        $correo = $_POST['correo_electronico'];
        
        $query = "INSERT INTO cliente (nombre, direccion, num_telefono, correo_electronico)
        VALUES ('$nombre', '$direccion', '$num', '$correo')";
        $resultado = mysqli_query($conn,$query);

        if(!$resultado){
            die("Query Failed!");
        }

        $_SESSION["message"] = "Cliente registrado satistactoriamente!";
        $_SESSION["message_type"] = "success";

        header("Location: index_cliente.php");
    }

?>