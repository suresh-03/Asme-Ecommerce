<?php

session_start();

function redirect($url){
    header("Location: ".$url);
    die();
}

include("../showErrors.php");

if(isset($_SESSION["login_user"])){
    unset($_SESSION["login_user"]);
    redirect("index.php");
}

