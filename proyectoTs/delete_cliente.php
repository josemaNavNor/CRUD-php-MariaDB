<?php 

    include("database/db.php");
    
    if(isset($_GET['id'])){ 
        $ID_Cliente = $_GET['id'];
        $query = "DELETE FROM cliente WHERE id = $ID_Cliente";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Cliente eliminado satisfactoriamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index_cliente.php");
    }

?>