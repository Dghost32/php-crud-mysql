<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id=$id";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_array($res);
        $title = $row["title"];
        $description = $row["description"];
    }
}

if(isset($_POST['update'])){
    $id=$_GET['id'];
    $title=$_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title='$title', description='$description' WHERE id=$id";
    mysqli_query($conn,$query);

    $_SESSION['message'] = 'task successfully updated';
    $_SESSION['message-type'] = 'w3-yellow';
    /* VOLVER A OTRA "VISTA" */
    header("Location: index.php");
}

?>

<?php include("./includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editTask.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title ?>" class="form-control" placeholder="Update title">
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="update description"><?php echo $description ?></textarea>
                    </div>
                    <br>
                    <button type="submit" class="w3-button bg-success w3-round w3-block" name="update"> update </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("./includes/footer.php") ?>