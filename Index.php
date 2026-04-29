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
    <title>Data Pengguna</title>
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

        .invitation-text {
            font-size: 1.5rem;
            color: #6c757d;
            margin: 20px 0;
            font-style: italic;
            text-transform: uppercase;
        }

        a {
            text-decoration: none;
            color: #0056b3;
            background-color: #7bb5f2; 
            padding: 10px 20px;
            border-radius: 5px;
            margin: 10px;
            font-size: 1.1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            background-color: #0056b3; 
            color: #fff;
        }

        /* Style for Table */
        table {
            width: 100%;
            max-width: 900px;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 20px auto;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px 20px;
            text-align: center;
        }

        th {
            background-color: #f39c12;
            color: white;
            font-size: 1.2rem;
        }

        tr {
            border-bottom: 1px solid #e2e8f0;
            transition: background-color 0.2s ease;
        }

        tr:last-child {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .actions {
            display: flex;
            gap: 8px;
            justify-content: flex-start;
        }

        .edit-btn, .delete-btn, .add-btn {
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 0.85em;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .edit-btn {
            background-color: #e0f2fe;
            color: #0284c7;
        }

        .edit-btn:hover {
            background-color: #0284c7;
            color: white;
        }

        .delete-btn {
            background-color: #fee2e2;
            color: #dc2626;
        }

        .delete-btn:hover {
            background-color: #dc2626;
            color: white;
        }

        .add-btn {
            background-color: #10b981;
            color: white;
            text-decoration: none;
            border-radius: 12px; 
            font-weight: 500;
            display: inline-block;
            margin-bottom: 20px; 
        }

        .add-btn:hover {
            background-color: #059669;
            transform: translateY(-2px);
        }

        td a:hover {
            color: #fff;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>Data Pengguna</h1>

    <div class="invitation-text">
        <p>Selamat datang di halaman pengelolaan data pengguna. Anda dapat menambah, mengedit, atau menghapus data pengguna sesuai kebutuhan.</p>
    </div>
    <a href="tambahpengguna.php" class="add-btn">+Tambah Data Pengguna</a>
       
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $data = mysqli_query($conn, "SELECT * FROM pengguna");
                while($item = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><?= $item['id']; ?></td>
                <td><?= $item['nama']; ?></td>
                <td><?= $item['email']; ?></td>
                <td><?= $item['password']; ?></td>

                <td class="actions">
                    <a href="ubahpengguna.php?id=<?= $item['id']; ?>" class="edit-btn">Edit</a>
                    <a href="hapuspengguna.php?id=<?= $item['id']; ?>" class="delete-btn">Hapus</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

</body>
</html>
