<?php

session_start();


include("/opt/lampp/htdocs/asme/showErrors.php");
include("/opt/lampp/htdocs/asme/database/connection.php");
function redirect($url){
    header("Location: ".$url,true);
    die();
}
if(!isset($_SESSION["admin"])){
    redirect("../api/login.php");
}

if(isset($_GET["deleteId"])){
    $id = $_GET["deleteId"];
    $sql = "DELETE FROM shirts WHERE product_id = '$id'";
    if($conn->query($sql)){
        redirect("../api/viewShirts.php");
    }
    else{
        die($conn->error);
    }
}