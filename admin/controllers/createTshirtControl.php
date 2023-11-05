<?php

include("/opt/lampp/htdocs/asme/database/connection.php");
include("/opt/lampp/htdocs/asme/showErrors.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $prodName = $_POST["prodName"];
    $prodDetais = $_POST["prodDetails"];
    // for getting files from form POST requrest
    $prodImg = $_FILES["prodImg"]['tmp_name'];

    // for file storing in database
    $file = fopen($prodImg,"r");
    $fileContents = fread($file,filesize($prodImg));
    fclose($file);

    $fileContents = addslashes($fileContents);

    $sql = "INSERT INTO tshirts(product_name,product_img,product_details)VALUES('$prodName','$fileContents','$prodDetais');";

    if($conn->query($sql)){
       redirect("../api/dashboard.php");
    }
    else{
        die($conn->error);
    }
}

?>