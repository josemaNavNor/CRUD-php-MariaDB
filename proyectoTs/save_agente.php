<?php 

    include("database/db.php");

    if(isset($_POST['save'])){
        $id = $_POST['id_agente'];
        $nombre = $_POST['nombre_agente'];
        $num = $_POST['numero_telefono'];
        $correo = $_POST['correo'];
        $especialidad = $_POST['especialidad'];
        
        $query = "INSERT INTO agente (ID_Agente,nombre, num_telefono, correo, especialidad)
        VALUES ('$id','$nombre', '$num', '$correo', '$especialidad')";
        $resultado = mysqli_query($conn,$query);

        if(!$resultado){
            die("Query Failed!");
        }

        $_SESSION["message"] = "Agente registrado satistactoriamente!";
        $_SESSION["message_type"] = "success";

        header("Location: index_agente.php");
    }

?>