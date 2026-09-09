<?php
include "../connect_db/koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$sql = "INSERT INTO messages (nama, email, pesan)
        VALUES ('$nama', '$email', '$pesan')";

if (mysqli_query($conn, $sql)){
     header("Location:../portofolio/index.php?status=sukses");
}else {
    header("Location: ../portofolio/index.php?status=gagal");
}
?>