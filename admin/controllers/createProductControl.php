<?php

include("/opt/lampp/htdocs/asme/database/connection.php");
include("/opt/lampp/htdocs/asme/showErrors.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $prodName = $_POST["prodName"];
    $prodDetais = $_POST["prodDetails"];
    $prodImg = $_FILES["prodImg"]['tmp_name'];

    $file = fopen($prodImg,"r");
    $fileContents = fread($file,filesize($prodImg));
    fclose($file);

    $fileContents = addslashes($fileContents);

    $sql = "INSERT INTO shirts(product_name,product_img,product_details)VALUES('$prodName','$fileContents','$prodDetais');";

    if($conn->query($sql)){
        echo("success");
    }
    else{
        die($conn->error);
    }
}

?>