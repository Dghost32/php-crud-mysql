<?php include("db.php"); ?>
<?php include("./includes/header.php") ?>

<div class="container p-4">
    <div class="row">

        <!-- add task -->
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="w3-panel <?= $_SESSION['message-type'] ?> w3-display-container w3-round">
                    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h4><?php echo $_SESSION['message']; ?></h4>
                </div>
            <?php } ?>
            <?php session_unset(); ?>

            <div class="card card-body">
                <form action="saveTask.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
                    </div>
                    <br>
                    <input type="submit" class="w3-button bg-success w3-round w3-block" name="save-task" value="Save Task">
                </form>
            </div>
        </div>

        <!-- task list -->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>description</th>
                        <th>created at</th>
                        <th>actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $tasks = mysqli_query($conn, $query);
                    foreach ($tasks as $task) { ?>
                        <tr>
                            <td><?php echo $task['title'] ?></td>
                            <td><?php echo $task['description'] ?></td>
                            <td><?php echo $task['createdAt'] ?></td>
                            <td>
                                <a href="editTask.php?id=<?php echo $task['id'] ?>" class="btn btn-secondary">
                                    <i class="far fa-edit"></i>

                                </a>
                                <a href="deleteTask.php?id=<?php echo $task['id'] ?>" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>