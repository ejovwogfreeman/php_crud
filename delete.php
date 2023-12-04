<?php

include('./partials/header.php');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = $_GET['id'];

    $sql = "DELETE FROM blog WHERE blog_id=$id";

    $sql_query = mysqli_query($conn, $sql);


    if ($sql_query) {
        header('Location: index.php');
    } else {
        echo 'an error occured';
    }
}
