<?php

$location = 'localhost';
$username = 'root';
$password = '';
$database = 'cbt_todo';

$conn = mysqli_connect($location, $username, $password, $database);

if(!$conn)
    die("Database connection error.");