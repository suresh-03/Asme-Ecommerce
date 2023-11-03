<?php

include("/opt/lampp/htdocs/asme/database/connection.php");
include("/opt/lampp/htdocs/asme/showErrors.php");


if(!isset($_SESSION["admin"])){
    redirect("../api/login.php");
}

$sql = "SELECT product_img FROM shirts";
$result = $conn->query($sql);
// print_r($row);

