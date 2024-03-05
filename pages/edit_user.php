<?php
require '../logic/connection.php';
require_once '../data_access/UserDataAccess.php';

$id = $_GET['id'];
$user = UserDataAccess::findUserById($connection, $id);
$password = $user['password'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

    <header>
        <a href="dashboard.php" id="return">Back</a>
        <a href="../index.php" class="logout">
            <h4>LOGOUT</h4>
        </a>
    </header>

    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" class="updateForm">
        <h1>Profile Details</h1>

        <input type="text" name="fullname" placeholder="fullname" value="<?php echo $user['fullname'] ?>">
        <input type="text" name="username" placeholder="username" value="<?php echo $user['username'] ?>">
        <input type="text" name="email" placeholder="email" value="<?php echo $user['email'] ?>">

        <input type="submit" name="submit" value="UPDATE" id="updateButton">

    </form>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    $rowsAffected = UserDataAccess::updateUser($connection, $id, $fullname, $username, $email, $password);

    if ($rowsAffected > 0) {
        header("Location: edit_user.php?id=$id");
    }
}
?>