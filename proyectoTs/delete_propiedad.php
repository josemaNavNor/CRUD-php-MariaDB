<?php 

    include("database/db.php");
    
    if(isset($_GET['ID_Propiedad'])){ 
        $ID_Propiedad = $_GET['ID_Propiedad'];
        $query = "DELETE FROM propiedad WHERE ID_Propiedad = $ID_Propiedad";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Propiedad eliminada satisfactoriamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index_propiedad.php");
    }

?>