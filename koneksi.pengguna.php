<?php
$conn = mysqli_connect("localhost", "root","","data_pengguna");
if (!$conn) {
    die("koneksi gagal: " . mysqli_connect_error());
}
?>
