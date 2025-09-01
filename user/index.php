<?php include '../connection/connection.php'; ?>

<html>
<head>
    <title>Daftar Buku</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: white;
            background: #e74c3c;
            padding: 5px 10px;
            border-radius: 4px;
        }
        a:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Daftar Peminjam Buku Perpustakaan</h1>
    <table>
        <tr>
            <th>User ID</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
            <th>Edit</th>
        </tr>
        <?php
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);

        

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['user_id']."</td>
                        <td>".$row['fullname']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['password']."</td>
                        <td><a href='remove_user.php?user_id=".$row['user_id']."' onclick=\"return confirm('Yakin ingin menghapus user ini?');\">Hapus</a></td>
                        <td><a class='edit' href='edit_user.php?id=".$row['user_id']."'>Edit</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada user tersedia</td></tr>";
        }
        ?>
    </table>
    <div style="text-align:center;">
        <a href="add_user.php">Tambah User Baru</a>
</body>
</html>