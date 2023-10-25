<?php

include("../database/connection.php");
$nameError = false;
$mobError = false;
$mailError = false;
$passError = false;
$message = "";
$exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (strlen($_POST["username"]) < 6) {
        $nameError = true;
        $message = "username atleast have 6 letters!";
    }
    if (strlen((string)$_POST["mobile"]) != 10) {
        $mobError = true;
        $message = "mobile number should have 10 digits!";
    }
    if (empty($_POST["email"])) {
        $mailError = true;
        $message = "email is required";
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $mailError = true;
            $message = "invalid email";
        }
    }
    if (strlen($_POST["password"]) < 6) {
        $passError = true;
        $message = "password must be atleast 6 characters!";
    }
    if (!$nameError && !$mailError && !$passError && !$mobError) {

        $message = "Registration Successful";
    }
}
