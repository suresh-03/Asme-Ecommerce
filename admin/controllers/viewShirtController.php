<?php

include("/opt/lampp/htdocs/asme/showErrors.php");
include("/opt/lampp/htdocs/asme/database/connection.php");

function redirect($url){
    header("Location: ".$url,true);
    die();
}

$sql = "SELECT * FROM shirts";

$result = $conn->query($sql);

