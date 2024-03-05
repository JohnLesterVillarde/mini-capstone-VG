<?php
require_once './connection.php';
require_once '../data_access/UserDataAccess.php';

$id = $_GET['id'];
$rowsAffected = UserDataAccess::deleteUserById($connection, $id);
echo $rowsAffected;
if ($rowsAffected > 0) {
    header("Location: ../pages/dashboard.php ");
}