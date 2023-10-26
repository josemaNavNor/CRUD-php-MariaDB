<?php 

    include("database/db.php");
    
    if(isset($_GET['ID_Transaccion'])){ 
        $ID_Transaccion = $_GET['ID_Transaccion'];
        $query = "DELETE FROM transaccion WHERE ID_Transaccion = $ID_Transaccion";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Transaccion eliminada satisfactoriamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index_transaccion.php");
    }

?>