<?php
session_start();
include "library/config.php";
$role = $_POST['id_role'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($con, "SELECT * FROM view_user WHERE
                       username='$username' AND
                       password='$password' AND
                       id_role='$role'");
$data = mysqli_fetch_array($query);
$jml = mysqli_num_rows($query);
// mod-multiple-role
if ($jml > 0) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['id_role'];
    $_SESSION['nama_role'] = $data['nama_role'];
    $_SESSION['password'] = $data['password'];
    header('location: index.php');
} else {
    echo "<script>
            window.alert('Maaf, username dan password anda salah');
            window.location.href='login.php';
            </script>";
}
?>