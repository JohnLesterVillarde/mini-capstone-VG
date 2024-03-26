<?php
// require_once '../logic/connection.php';
class UserDataAccess
{
    public static function findUserById($connection, $id)
    {
        $query = "SELECT * FROM users WHERE id = $id";
        $results = mysqli_query($connection, $query);
        return mysqli_fetch_assoc($results);
    }

    public static function findUserByEmail($connection, $email)
    {
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connection, $query);
        return $result;
    }

    public static function updateUser($connection, $id, $fullname, $username, $email, $password)
    {
        $query = "UPDATE users SET id='$id', fullname='$fullname', username='$username', email='$email', password='$password' WHERE id='$id'";
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }

    public static function deleteUserById($connection, $id)
    {
        $query = "DELETE FROM users WHERE id='$id'";
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }
}