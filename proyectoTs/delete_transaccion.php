<?php 

    include("database/db.php");
    
    if(isset($_GET['id'])){ 
        $ID_Transaccion = $_GET['id'];
        $query = "DELETE FROM transaccion WHERE id = $ID_Transaccion";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Transaccion eliminada satisfactoriamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index_transaccion.php");
    }

?>