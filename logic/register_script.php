<?php
require '../vendor/autoload.php';
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
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '7319cd748838c92b0aee',
            '36510d3146f213bea9f2',
            '1776063',
            $options
        );

        $data['message'] = 'New user has been sucessfully added';
        $pusher->trigger('signUp', 'newUser', [
            "username" => $username,
            "fullname" => $fullname,
            'email' => $email
        ]);
        //redirect user to login        
        header("location: ../index.php");
    }
} catch (\Throwable $th) {
    $_SESSION['errorMessage'] = "<p class='errorMessage'> Email is already registerd </p>";
    header("location: ../pages/register.php");
}
