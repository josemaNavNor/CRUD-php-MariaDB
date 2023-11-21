<?php 

    include("database/db.php");

    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $num = $_POST['num_telefono'];
        $correo = $_POST['correo_electronico'];
        $especialidad = $_POST['especialidad'];
        
        $query = "INSERT INTO agente (nombre, num_telefono, correo_electronico, especialidad)
        VALUES ('$nombre', '$num', '$correo', '$especialidad')";
        $resultado = mysqli_query($conn,$query);

        if(!$resultado){
            die("Query Failed!");
        }

        $_SESSION["message"] = "Agente registrado satistactoriamente!";
        $_SESSION["message_type"] = "success";

        header("Location: index_agente.php");
    }

?>