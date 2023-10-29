<?php

include("/opt/lampp/htdocs/asme/showErrors.php");
include("/opt/lampp/htdocs/asme/database/connection.php");
session_start();
?>
<?php

function redirect($url)
{
    header('Location: ' . $url, true);
    die();
}

$error = false;
$adminError = false;
$passError = false;
$success = false;
$message = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
       
        if (empty($_POST["admin"])) {
            $error = true;
          $adminError = true;
            $message = "enter valid admin name";
        } else if (strlen($_POST["admin"]) < 6) {
            $error = true;
            $adminError = true;
            $message = "admin atleast have 6 characters";
        } else if (strlen($_POST["password"]) < 6) {
            $passError = true;
            $error = true;
            $message = "password must contain atleast 6 characters";
        }
    
        if (!$adminError && !$passError) {
            $admin = $_POST["admin"];
            $passwd = $_POST["password"];
            $sql = "SELECT password,admin from admin WHERE admin = '$admin'";
            if ($conn->query($sql)) {
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $hashed_password = password_verify($passwd, $row["password"]);
                    if ($hashed_password) {
                        $_SESSION["admin"] = $admin;
                        redirect("/asme/admin/api/dashboard.php");
                    } else {
                        $error = true;
                        $message = "incorrect password";
                    }
                } else {
                    $error = true;
                    $message = "admin not found";
                }
                
            }
            else{
               die($conn->error);
            }
        }
        
    }

?>











