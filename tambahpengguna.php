<?php
$conn = mysqli_connect("localhost", "root", "", "data_pengguna");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
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

    <h1>Tambah Data Pengguna</h1>

    <div class="form-container">
        <form method="post">
            Nama: <input type="text" name="nama" required><br><br>
            Email: <input type="text" name="email" required><br><br>
            Password: <input type="password" name="password" required><br><br>

            <button type="submit" name="simpan">Simpan</button>
        </form>
    </div>

</body>
</html>

<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO pengguna (nama, email, `password`) VALUES ('$_POST[nama]', '$_POST[email]', '$_POST[password]')");
    
    header("location: index.php");
}
?>
