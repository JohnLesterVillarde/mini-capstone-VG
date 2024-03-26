<?php
session_start();

$role = $_SESSION['role'];
if (!isset($role) || !isset($_SESSION['email'])) {
    header("Location: ../index.php");
}

if ($role == 0 || $role == 1) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../public/css/style.css">
    </head>

    <body>

        <header>
            <a href="../logic/logout.php" class="logout">
                <h4>LOGOUT</h4>
            </a>
        </header>

        <main>
            <h1>Welcome User </h1>
            <h4><?php echo $_SESSION['email'] ?></h4>
        </main>


    </body>

    </html>

<?php
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard</title>
    </head>

    <body>

        <h3>You have no permission on this page</h3>

    </body>

    </html>

<?php
}
?>