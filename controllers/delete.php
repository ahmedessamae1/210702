<?php
require "db_connection.php";

if(isset($_GET['id'])) {
    $todo_id = $_GET['id'];

    // QUERY TO DELETE
    $query = "DELETE FROM todos WHERE id=$todo_id";

    // EXECUTE QUERY
    $query_run = mysqli_query($conn, $query);
    if(!$query_run)
        die("Database error.");

    // REDIRECT TO HOME PAGE
    header("location: ../index.php");
}