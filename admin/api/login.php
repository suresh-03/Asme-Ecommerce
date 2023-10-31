<?php 
include("/opt/lampp/htdocs/asme/admin/controllers/loginController.php");
if(isset($_SESSION["admin"])){
    redirect("dashboard.php");
    die();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--custom css -->
    <link rel="stylesheet" href="../style.css">
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- fontawesome-link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <?php
    // $error = false;
    if ($error) {
        echo
        '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $message . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    }
    ?>
    <h1 style="text-align: center;margin-top:20px;">Sign in</h1>

    <div class="container-fluid" style="display: flex; justify-content:center; align-items:center; height:100vh; margin-top:-80px">
        <form action="./login.php" method="post" class="sizing-form">
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Admin ID</label>
                <input type="text" name="admin" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-1">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1" required>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- bootstrap-javascript -->
    <script>
        // document.getElementById("submit").addEventListener('click', function(event) {
        //     event.preventDefault();
        // });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
