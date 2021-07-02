<?php
require "db_connection.php";

$title = $_POST['title'];
$description = $_POST['description'];

if(empty($title) || empty($description))
    die("You didn't enter all the data");

$query = "INSERT INTO todos (title, description) VALUES('$title', '$description')";
$query_run = mysqli_query($conn, $query);

if(!$query_run)
    die("Database error");

header("Location: ../index.php");