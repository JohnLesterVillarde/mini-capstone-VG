<?php
include 'connection.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$role = 0;

if ($email === 'admin@gmail.com') {
    $role = 1;
} elseif ($email === 'user@gmail.com') {
    $role = 0;
} else {
    $role = 2;
}

# add the user to database=
$sql = "INSERT INTO users (username, email, password, fullname, role) VALUES ('$username', '$email', '$password', '$fullname', '$role')";
try {
    $executeQuery = mysqli_query($connection, $sql);
    $affected_rows = mysqli_affected_rows($connection);
    # redirect the user to index/login page if rows affected > 0  
    if ($affected_rows > 0) {
        header("location: ../index.php");
    }
} catch (\Throwable $th) {
    $_SESSION['errorMessage'] = "<p class='errorMessage'> Email is already registerd </p>";
    header("location: ../pages/register.php");
}
