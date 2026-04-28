<?php
$conn = mysqli_connect("localhost", "root","","data_pengguna");
if (!$conn) {
    die("koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambahdata</title>
</head>
<body>
    <h1>tambah data</h1>
    <form method="post">
        Nama: <input type="text" name="nama"><br><br>
        email: <input type="text" name="email"><br><br>
        passowrd:<input type="password" name="password"><br><br>

        <button type="submit" name="simpan">Simpan</button>
    </form>    
</body>
</html>

<?php 
if(isset($_POST['simpan'])){
     mysqli_query($conn, "INSERT INTO pengguna (nama,email,`password`) VALUES ( 
        '$_POST[nama]',
        '$_POST[email]',
        '$_POST[password]'
        )");
    
     header("location: Index.php");
    }

?>