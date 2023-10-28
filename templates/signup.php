<?php
include("/opt/lampp/htdocs/asme/showErrors.php");
session_start();
function redirect($url)
{
    header('Location: ' . $url, true);
    die();
}

if (isset($_SESSION["login_user"])) {
    redirect("index.php");
} else {
    include("../database/connection.php");
    $nameError = false;
    $mobError = false;
    $mailError = false;
    $passError = false;
    $success = false;
    $error = false;
    $message = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (strlen($_POST["name"]) < 6) {
            $nameError = true;
            $error = true;
            $message = "username atleast have 6 letters!";
        } else if (strlen((string)$_POST["mobile"]) != 10) {
            $mobError = true;
            $error = true;
            $message = "mobile number should have 10 digits!";
        } else if (empty($_POST["email"])) {
            $mailError = true;
            $error = true;
            $message = "email is required";
        } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $mailError = true;
            $error = true;
            $message = "invalid email";
        } else if (strlen($_POST["password"]) < 6) {
            $passError = true;
            $error = true;
            $message = "password must be atleast 6 characters!";
        }
        if (!$nameError && !$mailError && !$passError && !$mobError) {

            $name = $_POST["name"];
            $mobile = $_POST["mobile"];
            $mobile = (string)$mobile;
            $email = $_POST["email"];
            $passwd = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $sql = "SELECT email,mobile FROM users";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if (strcmp($row["email"], $email) == 0) {
                        $error = true;
                        $message = "email already exists";
                        break;
                    }
                    if (strcmp($row["mobile"], $mobile) == 0) {
                        $error = true;
                        $message = "mobile number already exists";
                        break;
                    }
                }
            }

            if (!$error) {
                $sql = "INSERT INTO `users`(`username`,`mobile`,`email`,`password`,`date`)VALUES('$name','$mobile','$email','$passwd',current_timestamp())";
                if ($conn->query($sql)) {
                    $success = true;
                    $message = "Registration Successful";
                    redirect("index.php");
                } else {
                    die($conn->error . " : " . $conn->errno);
                }
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
    $pageRefreshed = isset($_SERVER["HTTP_CACHE_CONTROL"]) && $_SERVER["HTTP_CACHE_CONTROL"] === "max-age=0";
    // if ($pageRefreshed) {
    //     $error = false;
    //     $success = false;
    // }
    if (!$pageRefreshed) {
        if ($error) {

            echo
            '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $message . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
        }
        if ($success) {
            echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> ' . $message . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
        }
    }
    ?>
    <div class="container-fluid" style="display: flex; justify-content:center; align-items:center; height:100vh;">
        <form onsubmit="handleReload(e)" action="./signup.php" method="post" class="sizing-form">
            <div class="mb-1">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="form-control" class="form-control form-control-sm" id="name" aria-describedby="name" required>
            </div>
            <div class="mb-1">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="number" name="mobile" style="-moz-appearance: textfield;" class="form-control form-control-sm" id="mobile" aria-describedby="mobile" required>
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-1">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- bootstrap-javascript -->
    <script>
        function handleReload(e) {
            e.preventDefault();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>