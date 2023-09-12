<!-- Copyright Snappi -->
<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "TodoManager";

// $con = mysqli_connect($host, $username, $password, $database);
$con = mysqli_connect('localhost', 'root', '', 'TodoManager');

if (!$con) {
    die("Error: Unable to connect to database");
}
