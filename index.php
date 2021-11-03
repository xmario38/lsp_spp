<?php
if(!session_id()) session_start();
require_once 'Proses.php';

// $proses = new Proses;

if(isset($_SESSION['id'])) {
    if($_SESSION['level'] == "Admin") {
        header('Location: include/admin/');
    } else {
        //kita belum buat
        header('Location: include/petugas/');
    }
}

if (isset($_POST['masuk'])) {
    $username = $proses->konek->real_escape_string($_POST["username"]);
    $password = $proses->konek->real_escape_string(sha1($_POST["password"]));
    
    $masuk = $proses->loginPetugas($username, $password);
    if($masuk->num_rows > 0) {
        $data = mysqli_fetch_assoc($masuk);

        if($data['level'] == "Admin") {
            header('Location: include/admin');
            $_SESSION['id'] = $data['id_petugas'];
            $_SESSION['level'] = $data['level'];
        } else {
            echo "Pergi ke halaman Petugas";
        }
    } else {
        $_SESSION['error'] = "Username atau Password tidak valid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pembayaran SPP</title>
</head>
<body>
    <center>
        <h4>Silahkan Masuk</h4>

        <?php
        if (isset($_SESSION['error'])) {
            echo '<span style="color:red;">' . $_SESSION['error'] . '</span>';
        }
        ?>

        <form method="post" action="" autocomplete="off">
            <label for="username">Username</label>
            <input type="text" name="username" id="username"><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>
            <input type="submit" name="masuk" value="Masuk">
        </form>
    </center>
</body>
</html>