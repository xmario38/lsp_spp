<?php
session_start();
require_once 'Admin.php';

$admin = new Admin;

if(!isset($_SESSION['id'])) {
    header('Location: ../../');
}

$id = $_SESSION['id'];

$data = $admin->getDataPetugas($id);
$row = mysql_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
</head>
<body>
    Hi, <?= $row['nama_petugas']; ?>
</body>
</html>