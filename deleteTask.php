<?php 
    include("db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id=$id";
        $res = mysqli_query($conn,$query);
        if(!$res){
            die(
                "query failed"
            );
        }

        $_SESSION['message'] = 'task successfully removed';
        $_SESSION['message-type'] = 'w3-red';
        header('Location: index.php');
    }
?>
