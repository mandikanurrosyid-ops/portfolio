<?php
include "connect_db/koneksi.php";

$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);
while($data = mysqli_fetch_assoc($result)){
    echo $data['nama'];
}
?>