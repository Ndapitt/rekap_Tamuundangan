<?php
include 'koneksi.pengguna.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM pengguna WHERE id='$id'");
$item = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editdata</title>
</head>
<body>
    <h1>ubah data</h1>
    <form method="post">
        Nama: <input type="text" name="nama" value="<?= $item['nama'] ?>"><br><br>
        email: <input type="text" name="email" value="<?= $item['email'] ?>"><br><br>
        password: <input type="password" name="password" value="<?= $item['password'] ?>"><br><br>
       
        <button type="submit" name="update">update</button>
    </form>    
</body>
</html>

<?php
if(isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE pengguna SET
         nama='$_POST[nama]',
         email='$_POST[email]',
         `password`='$_POST[password]'
         WHERE id='$id'
    ");

    
    header("location: Index.php");
}
?>
