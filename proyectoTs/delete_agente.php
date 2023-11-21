<?php 

    include("database/db.php");
    
    if(isset($_GET['id'])){ 
        $ID_Agente = $_GET['id'];
        $query = "DELETE FROM agente WHERE id = $ID_Agente";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Agente eliminado satisfactoriamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index_agente.php");
    }

?>