<?php 

    include("database/db.php");
    
    if(isset($_GET['ID_Agente'])){ 
        $ID_Agente = $_GET['ID_Agente'];
        $query = "DELETE FROM agente WHERE ID_Agente = $ID_Agente";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Agente eliminado satisfactoriamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index_agente.php");
    }

?>