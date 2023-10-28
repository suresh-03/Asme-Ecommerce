<?php

include("../database/connection.php");

function redirect($url)
{
    header('Location: ' . $url, true);
    die();
}

session_start();

if (isset($_SESSION["login_user"])) {
    redirect("index.php");
}


$error = false;
$mailError = false;
$passError = false;
$success = false;
$message = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $error = true;
        $mailError = true;
        $message = "please enter email";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $mailError = true;
        $message = "please enter valid email";
    } else if (strlen($_POST["password"]) < 6) {
        $passError = true;
        $error = true;
        $message = "password must contain atleast 6 characters";
    }

    if (!$mailError && !$passError) {
        $mail = $_POST["email"];
        $passwd = $_POST["password"];

        $sql = "SELECT email,password,username from users WHERE email = '$mail'";
        if ($conn->query($sql)) {
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $hashed_password = password_verify($passwd, $row["password"]);
                if ($hashed_password) {
                    $_SESSION["login_user"] = $mail;
                    redirect("index.php");
                } else {
                    $error = true;
                    $message = "password is incorrect";
                }
            } else {
                $error = true;
                $message = "user not found, you have to register";
            }
        }
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
    <link rel="stylesheet" href="/asme/styles/style.css">
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
    <div class="container-fluid" style="display: flex; justify-content:center; align-items:center; height:100vh;">
        <form action="./login.php" method="post" class="sizing-form">
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
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