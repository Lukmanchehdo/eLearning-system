<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "elearning_db";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);
mysqli_set_charset($conn, "utf8");

date_default_timezone_set('Asia/Bangkok');
?>