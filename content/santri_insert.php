
<?php
//print_r($_POST);
include "library/config.php";
//menampung nilai variable $_POST
$nis = $_POST['nis'];
$nama_santri = $_POST['nama_santri'];
$jk = $_POST['jk'];
$id_asrama = $_POST['id_asrama'];

//memasukkan data ke dalam database
$q="INSERT INTO data_santri SET
nis='$nis',
nama_santri='$nama_santri',
jk='$jk',
id_asrama='$id_asrama'";

$query=mysqli_query($con,$q);

//aksi jika query sukses maupun gagal
if ($query){
    //mod : menambah action alert jika query berhasil
    echo "<script>
    window.alert('Data berhasil ditambah');
    window.location.href='?hal=santri_tampil';
    </script>";
} else {
//mod : menambah action alert jika query berhasil
    echo "<script>
    window.alert('Data gagal ditambah');
    window.location.href='?hal=santri_tampil';
    </script>";
}
?>