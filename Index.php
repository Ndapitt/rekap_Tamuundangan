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
    <title>Data Pengguna</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

body {
    font-family: 'Inter', sans-serif;
    background-color: #f4f7f6;
    color: #333;
    margin: 0;
    padding: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    color: #2c3e50;
    margin-bottom: 20px;
    font-weight: 600;
}

/* Style untuk tombol "+Tambah Data" */
body > a:first-of-type {
    display: inline-block;
    background-color: #10b981; /* Warna hijau modern */
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 500;
    margin-bottom: 20px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
}

body > a:first-of-type:hover {
    background-color: #059669;
    transform: translateY(-2px);
}

/* Style untuk Tabel */
table {
    width: 100%;
    max-width: 900px;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    border-radius: 10px;
    overflow: hidden; /* Agar border-radius pada tabel berfungsi */
}

/* Mengabaikan atribut border="1" bawaan dari HTML */
table, th, td {
    border: none;
}

th, td {
    padding: 16px 20px;
    text-align: left;
}

th {
    background-color: #1e293b;
    color: #f8fafc;
    font-weight: 600;
    font-size: 0.9em;
    text-transform: uppercase;
    letter-spacing: 0.05em;
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

/* Kolom Aksi */
.actions {
    display: flex;
    gap: 8px;
}

/* Tombol Edit dan Hapus */
.edit-btn, .delete-btn {
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
    </style>
</head>
<body>
    <h1>Data Pengguna</h1>
    <a href="tambahpengguna.php">+Tambah Data</a><br>
    <table border="1" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>aksi</th>
        </tr>

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
      </table>

</body>
</html>