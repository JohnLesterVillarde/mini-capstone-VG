<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="container">
        <form action="../logic/register_script.php" method="POST">
            <h1>Pisbok Register</h1>
            <!-- <?php
                    if (!empty($_SESSION['errorMessage'])) {
                        echo $_SESSION['errorMessage'];
                    }
                    ?> -->
            <input type="text" name="fullname" placeholder="Fullname" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button class="submit_form" type="submit">Register</button>
            <a href="../index.php">
                <div class="login_link">Login</div>
            </a>
        </form>
    </div>

</body>

</html>