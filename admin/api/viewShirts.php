<?php
session_start();
include("/opt/lampp/htdocs/asme/admin/controllers/viewShirtController.php");
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--custom css -->
    <link rel="stylesheet" href="/admin/style.css">
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- fontawesome-link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary"  data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/asme/admin/api/viewShirts.php">Shirts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/asme/admin/api/createTshirt.php">T-Shirts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/asme/admin/controllers/logoutController.php">logout</a>
        </li>;
       
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<p style="text-align: center; margin-top:20px;">want to create new product? <button class="btn btn-primary text-light"><a style="color:white;text-decoration:none;" href="/asme/admin/api/createShirt.php">Create</a></button></p>
<div class="table-responsive">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Details</th>
      <th colspan="2" scope="col">Operations</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo'<tr>
            <th scope="row">'.$row["product_id"].'</th>
            <td>'.$row["product_name"].'</td>
            <td>
            <img  
            src="data:image/jpeg;base64,'.base64_encode($row["product_img"]).'" 
            width="100" 
            height="100"
            ></td>
            <td><button class="btn btn-secondary"><a style="color:white;text-decoration:none;" href="#">View</a></button></td>
            <td><button class="btn btn-success"><a style="color:white;text-decoration:none;" href="updateShirt.php?updateId='.$row["product_id"].'">Update</a></button></td>
            <td><button class="btn btn-danger" ><a style="color:white;text-decoration:none;" href="/asme/admin/controllers/deleteController.php?deleteId='.$row["product_id"].'">Delete</a></button></td>
          </tr>';
        }
    }
    ?>
  </tbody>
</table>
</div>

       
      
   
     


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>