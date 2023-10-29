<?php

session_start();

function redirect($url){
    header("Location: ".$url);
    die();
}

include("/opt/lampp/htdocs/asme/showErrors.php");

if(isset($_SESSION["admin"])){
    unset($_SESSION["admin"]);
    redirect("/asme/admin/api/login.php");
}

