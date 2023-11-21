<?php 

    include("database/db.php");

    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $propiedad = $_POST['ID_Propiedad'];
        $cliente = $_POST['ID_Cliente'];
        $agente = $_POST['ID_Agente'];
        $fecha = $_POST['fecha'];
        $tipo = $_POST['tipo'];

        $query = "INSERT INTO transaccion (ID_Propiedad, ID_Cliente, ID_Agente, fecha, tipo)
        VALUES ('$propiedad', '$cliente', '$agente', '$fecha', '$tipo')";
        $resultado = mysqli_query($conn,$query);

        if(!$resultado){
            die("Query Failed!");
        }

        $_SESSION["message"] = "Transaccion registrada satistactoriamente!";
        $_SESSION["message_type"] = "success";

        header("Location: index_transaccion.php");
    }

?>