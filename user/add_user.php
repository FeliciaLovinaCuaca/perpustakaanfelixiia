<?php include '../connection/connection.php'?>
<!-- Perlu diingat nama nama kolom tabel, kalau error kemungkinan besar
kolomnya salah 
-->
<html>

<head>
    <title>Tambah User</title>
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
</head>
<body>
    <form action="" method="POST">
        <label>Masukkan Nama :</label>
        <input type="text" name="fullname" required/><br>
        <label>Masukkan Alamat :</label>
        <input type="text" name="address" required/><br>
        <label>Masukkan Email:</label>
        <input type="text" name="email" required/><br>
        <label>Masukkan Username :</label>
        <input type="number" name="username" required/><br>
        <label>Masukkan Password :</label>
        <input type="text" name="password" required/><br>
        <!-- tag, alt -->
        <input type="submit" name="submit" value="Tambah User" />
    </form>
    <?php 
        if (isset ($_POST['submit'])){
            $nama = $_POST['fullname'];
            $alamat = $_POST['address'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "INSERT INTO user(fullname, address, email, username, password) VALUES('$nama', '$alamat', '$email', '$username', '$password')";
            if ($conn ->query($sql)===TRUE){
                echo "User berhasil ditambahkan";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    
    ?>
</body>
</html>
