<?php
session_start();
include("/opt/lampp/htdocs/asme/showErrors.php");
include("/opt/lampp/htdocs/asme/database/connection.php");

function redirect($url){
    header("Location: ".$url,true);
    die();
}

if(!isset($_SESSION["admin"])){
    redirect("login.php");
}

if(isset($_GET["updateId"])){
$updateId = $_GET["updateId"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!--custom css -->
  <link rel="stylesheet" href="/asme/admin/style.css">
  <!-- bootstrap-css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!-- fontawesome-link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
<div class="container-fluid">
    <form name="file" enctype="multipart/form-data" action="./updateShirt.php" method="post"> 
    <div class="mb-3">
    <label for="staticEmail" class="col-sm-2 col-form-label">Product Id</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="product_id" value=<?php echo $updateId ?>>
    </div>

      <label for="exampleFormControlInput1" class="form-label">Product Name</label>
      <input type="text" name="product_name" class="form-control" id="exampleFormControlInput1">
      <div class="mb-3">
  <label for="formFile" class="form-label">Product Image</label>
  <input class="form-control" name="prodImg" value="" type="file" id="formFile" required>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Product Details</label>
  <textarea class="form-control" name="product_details" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
</div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_details = $_POST["product_details"];

  // for getting files from form POST requrest
  $prodImg = $_FILES["prodImg"]['tmp_name'];

  // for file storing in database
  $file = fopen($prodImg,"r");
  $fileContents = fread($file,filesize($prodImg));
  fclose($file);

  $fileContents = addslashes($fileContents);


  $sql = "UPDATE shirts SET product_name = '$product_name',product_img = '$fileContents',product_details = '$product_details' WHERE product_id =' $id'";

  if($conn->query($sql)){
    redirect("viewShirts.php");
  }
  else{
    die($conn->error);
  }
}
?>
