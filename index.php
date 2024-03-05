<?php
require_once './logic/connection.php';
require_once './data_access/UserDataAccess.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="container">
        <form action="index.php" method="post">
            <h1>Pisbok Login</h1>
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button class="submit_form" name="btn-login" type="submit">Login</button>
            <a href="./pages/register.php">
                <div class="register_link">Register</div>
            </a>

        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['btn-login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    # find the user from  database and compare password for authentication 
    $result = UserDataAccess::findUserByEmail($connection, $email);

    while ($row = mysqli_fetch_assoc($result)) {
        var_dump($row['email']);
        # if password is match, redirect to dashboard
        if ($password === $row['password']) {
            $_SESSION['email'] = $row['email'];
            header('location: ./pages/dashboard.php');
        }
    }
}

?>