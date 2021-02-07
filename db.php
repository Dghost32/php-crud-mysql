<?php

    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'php-crud'
    );

    /* if(isset($conn)){
        echo "DB is connected";
    } */
?>