<?php
    include("db.php");

    if(isset($_POST['save-task'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "INSERT INTO task(title, description) VALUES('$title', '$description')";
        $res = mysqli_query($conn, $query);

        if(!$res){
            die(
                "query failed"
            );
        }

        $_SESSION['message'] = "task saved successfully";
        $_SESSION['message-type'] = "w3-green";

        header("Location: index.php");
    }
?>
