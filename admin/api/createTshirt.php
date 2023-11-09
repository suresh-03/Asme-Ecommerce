<?php 
session_start();
function redirect($url){
  header("Location: ".$url,true);
  die();
}
include("/opt/lampp/htdocs/asme/showErrors.php");
include("/opt/lampp/htdocs/asme/admin/controllers/createTshirtControl.php");
if(!isset($_SESSION["admin"])){
  redirect("login.php");
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

<form name="file" action="./createTshirt.php" method="post" enctype="multipart/form-data">
    <input type="text" name="prodName" placeholder="product name" required>
    <input type="file" name="prodImg" value="" required>
    <textarea name="prodDetails" id="prodDetails" cols="30" rows="10" required></textarea>
    <input type="submit" value="submit">
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>




