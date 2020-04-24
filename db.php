<?php
$servername = "localhost:3306";
$username = "a3001446_vikram";
$password = "a3001446_vikram";
$db = "a3001446_crud_app";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
$str = sprintf("database = [ %s ] Connected ",$db);
//echo $str;
?>