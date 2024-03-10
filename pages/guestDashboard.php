<?php
session_start();
if ($_SESSION['role'] == 2 || $_SESSION['role'] == 1) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Dashboard</title>
</head>

<body>
    <h1>Welcome Guest </h1>
    <h4><?php echo $_SESSION['email'] ?></h4>


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