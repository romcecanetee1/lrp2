<?php
session_start();
include_once('connection.php');

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string ($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $sql = "SELECT * FROM `tbl_user` WHERE `email`='$email' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);

    if (empty($_POST['email']) && empty($_POST['password'])) {
        echo "<script>alert('Please Fill Email and Password');</script>";
        exit;
    } elseif (empty($_POST['password'])) {
        echo "<script>alert('Please Fill Password');</script>";
        exit;
    } elseif (empty($_POST['email'])) {
        echo "<script>alert('Please Fill Email);</script>";
        exit;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $last_name = $row['last_name'];
            $email = $row['email'];
            $password = $row['password'];


            if ($email == $email && $password == $password) {
                $_SESSION['last_name'] = $last_name;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location:welcome.php');
            }
        } else {
            echo "<script>alert('Invalid Email or Password');</script>";
            exit;
        }
    }
}
