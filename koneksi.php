<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "siadu";

$conn = mysqli_connect($servername, $username_db, $password_db, $dbname) or die("Connection failed: " . mysqli_connect_error());
?>