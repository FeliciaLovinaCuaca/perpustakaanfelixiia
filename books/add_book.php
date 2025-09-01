<?php include '../connection/connection.php'?>
<!-- Perlu diingat nama nama kolom tabel, kalau error kemungkinan besar
kolomnya salah 
-->
<html>

<head>
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 400px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: #f9f9f9;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            border: none;
            background: #3498db;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <label>Masukkan Judul :</label>
        <input type="text" name="judul" required/><br>
        <label>Masukkan Penulis :</label>
        <input type="text" name="penulis" required/><br>
        <label>Masukkan Penerbit :</label>
        <input type="text" name="penerbit" required/><br>
        <label>Masukkan Tahun Terbit :</label>
        <input type="number" name="tahun_terbit" required/><br>
        <label>Masukkan Genre :</label>
        <input type="text" name="genre" required/><br>
        <label>Masukkan Stok :</label>
        <input type="number" name="stok" required/><br>
        <!-- tag, alt -->
        <input type="submit" name="submit" value="Tambah Buku" />
    </form>
    <?php 
        if (isset ($_POST['submit'])){
            $judul_buku = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $genre = $_POST['genre'];
            $stok = $_POST['stok'];

            $sql = "INSERT INTO buku(judul_buku, penulis, penerbit, tahun_terbit, genre, stok) VALUES('$judul_buku', '$penulis', '$penerbit', '$tahun_terbit', '$genre', '$stok')";
            if ($conn ->query($sql)===TRUE){
                echo "Buku berhasil ditambahkan";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    
    ?>
</body>
</html>
