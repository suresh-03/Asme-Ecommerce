<?php

require("/opt/lampp/htdocs/asme/showErrors.php");

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "asme";

$conn = new mysqli($hostname,$username,$password,$dbname);

if($conn->connect_error){
    die($conn->connect_error);
}
else{
    echo("database connected");
}