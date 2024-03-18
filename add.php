<?php
include_once('connection.php');

if(isset($_POST['register'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $school_id = mysqli_real_escape_string($conn, $_POST['school_id']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO `tbl_user` (`first_name`, `last_name`, `school_id`, `department`, `email`, `password`) 
            VALUES ('$first_name', '$last_name', '$school_id', '$department', '$email', '$pass')";

    $result = mysqli_query($conn, $sql);
    if($result) { 
        header('location:index.html');
        echo "<script>alert('New User Registered Successfully');</script>";   
    } else {
        die(mysqli_error($conn));
    }
}
?>
