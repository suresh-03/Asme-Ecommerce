<?php

include("/opt/lampp/htdocs/asme/database/connection.php");
include("/opt/lampp/htdocs/asme/showErrors.php");

$sql = "CREATE TABLE shirts(
    product_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_img MEDIUMBLOB NOT NULL,
    product_name VARCHAR(255),
    product_details TEXT,
    product_reviews TEXT

)";
if($conn->query($sql)){
    echo("success");
}


