<?php
$server    = "localhost";
$username  = "root";
$password  = "";
$db        = "first_db";


//create a connection 
$conn = mysqli_connect($server, $username, $password, $db);

//check connection
if(!$conn) {
    die("connection failed:" .  mysqli_connect_error() );
}
// echo "connection successfull!";

?>