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

?>