<?php
include 'koneksi.pengguna.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM pengguna WHERE id='$id'");
$item = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pengguna</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #ecdddd;
            margin: 0;
            padding: 0;
            text-align: center;
            color: #333;
        }

        h1 {
            font-size: 3rem;
            color: #4a4a4a;
            background-color: #fcf8e3;
            padding: 25px;
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }

        form {
            background-color: white;
            padding: 30px;
            margin: 20px auto;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
        }

        button {
            background-color: #10b981;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #059669;
        }

        .form-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <h1>Ubah Data Pengguna</h1>

    <div class="form-container">
        <form method="post">
            Nama: <input type="text" name="nama" value="<?= $item['nama'] ?>" required><br><br>
            Email: <input type="text" name="email" value="<?= $item['email'] ?>" required><br><br>
            Password: <input type="password" name="password" value="<?= $item['password'] ?>" required><br><br>

            <button type="submit" name="update">Update</button>
        </form>
    </div>

</body>
</html>

<?php
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE pengguna SET
         nama='$_POST[nama]',
         email='$_POST[email]',
         `password`='$_POST[password]'
         WHERE id='$id'
    ");

    header("location: index.php");
}
?>
