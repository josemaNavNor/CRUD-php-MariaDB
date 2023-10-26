<?php 

    include("database/db.php");

    if(isset($_POST['save'])){
        $id = $_POST['ID_Transaccion'];
        $fecha = $_POST['fecha'];
        $tipo = $_POST['tipo'];
        $propiedad = $_POST['FK_Propiedad'];
        $cliente = $_POST['FK_Cliente'];
        $agente = $_POST['FK_Agente'];

        $query = "INSERT INTO transaccion (ID_Transaccion,fecha, tipo, FK_Propiedad, FK_Cliente, FK_Agente)
        VALUES ('$id','$fecha', '$tipo', '$propiedad', '$cliente', '$agente')";
        $resultado = mysqli_query($conn,$query);

        if(!$resultado){
            die("Query Failed!");
        }

        $_SESSION["message"] = "Transaccion registrada satistactoriamente!";
        $_SESSION["message_type"] = "success";

        header("Location: index_transaccion.php");
    }

?>