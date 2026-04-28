<?php
   include 'koneksi.pengguna.php';
   $id = $_GET['id'];

   mysqli_query($conn, "DELETE FROM pengguna WHERE id='$id'");

   header("location: Index.php");
?>