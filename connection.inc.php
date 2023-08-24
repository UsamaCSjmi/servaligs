<?php
$username = "root";
$password = "usama";
$server = "localhost";
$database ="servaligs";

$conn = mysqli_connect($server, $username, $password, $database );
if(!$conn){
    die("Error :". mysqli_connect_error());
}
?>