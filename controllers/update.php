<?php
require "db_connection.php";

$title = $_POST['title'];
$description = $_POST['description'];
$id = $_POST['id'];

if(empty($title) || empty($description))
    die("You didn't enter all the data");

$query = "UPDATE todos SET title='$title', description='$description' WHERE id=$id";
$query_run = mysqli_query($conn, $query);

if(!$query_run)
    die("Database error");

header("Location: ../index.php");