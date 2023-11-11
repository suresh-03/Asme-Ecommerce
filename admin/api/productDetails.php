<?php
session_start();
include("/opt/lampp/htdocs/asme/database/connection.php");
include("/opt/lampp/htdocs/asme/showErrors.php");
if(!isset($_SESSION["admin"])){
    redirect("login.php");
}
else{
    if(!password_verify("suresh",$_SESSION["admin"])){
    redirect("login.php");
    }
}
if(isset($_GET["details"])){
    $details = $_GET["details"];
    $sql = "SELECT product_details FROM shirts WHERE product_id = '$details'";
    if($conn->query($sql)){
        $result = $conn->query($sql);
        echo '<p>'.$result->fetch_column(0).'</p>';
    }
    else{
        die($conn->error);
    }
}

?>