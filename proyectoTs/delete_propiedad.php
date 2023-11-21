<?php 

    include("database/db.php");
    
    if(isset($_GET['id'])){ 
        $ID_Propiedad = $_GET['id'];
        $query = "DELETE FROM propiedad WHERE id = $ID_Propiedad";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Propiedad eliminada satisfactoriamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index_propiedad.php");
    }

?>