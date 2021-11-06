<?php
if(!session_id()) session_start();
require_once 'Proses.php';

$proses = new Proses;

if(isset($_SESSION['id'])) {
    if($_SESSION['level'] == "Admin") {
        header('Location: includes/admin/');
    } else {
        // kita belum buat
        header('Location: includes/petugas/');
    }
}

if (isset($_POST['masuk'])) {
    $username = $proses->konek->real_escape_string($_POST['usernme']);
    $password = $proses->konek->real_escape_string(sha1($_POST['password']));

    $masuk = $proses->loginPetugas($username, $password);

    if($masuk->num_rows > 0) {
        $data = mysqli_fetch_assoc($masuk);

        if($data['level'] == "Admin") {
            header('Location: includes/admin');
            $_SESSION['id'] = $data['id_petugas'];
            $_SESSION['level'] = $data['level'];
        } else {
            echo "Pergi ke halaman Petugas";
        }
    } else {
        $_SESSION['error'] = "Username atau password tidak valid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
            <label for="username">Username  :</label>
            <input type="text" name="username" id="username" placeholder="Username"><br><br>
            <label for="password">Password  :</label>
            <input type="password" name="password" id="password" placeholder="Password"><br><br>
            <input type="submit" name="masuk" value="Masuk">
        </form>
    </center>
</body>
</html>