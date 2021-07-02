<?php
require "db_connection.php";

if(isset($_GET['id']) && isset($_GET['done'])) {
    $todo_id = $_GET['id'];
    $done = $_GET['done'];

    $query = "UPDATE todos set done=$done WHERE id=$todo_id";
    $query_run = mysqli_query($conn, $query);
    if(!$query_run)
        die("Database error.");
    // REDIRECT TO HOME PAGE
    header("location: ../index.php");
}