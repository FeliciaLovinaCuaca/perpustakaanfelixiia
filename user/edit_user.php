<?php
include '../connection/connection.php';

// cek apakah ada parameter id di URL
if (!isset($_GET['id'])) {
    die("ID user tidak diberikan.");
}

$user_id = $_GET['id'];

// ambil data user berdasarkan ID
$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("User tidak ditemukan.");
}

$user = $result->fetch_assoc();

// jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // update data user
    $update = "UPDATE user 
               SET fullname='$fullname', address='$address', email='$email', username='$username', password='$password' 
               WHERE user_id='$user_id'";

    if ($conn->query($update) === TRUE) {
        echo "<script>alert('Data user berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<html>
<head>
    <title>Edit User</title>
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
    <form method="POST">
        <h2>Edit User</h2>
        <label>User ID</label>
        <input type="text" value="<?php echo $user['user_id']; ?>" disabled>

        <label>Nama Lengkap</label>
        <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>" required>

        <label>Alamat</label>
        <input type="text" name="address" value="<?php echo $user['address']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

        <label>Username</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>

        <label>Password</label>
        <input type="text" name="password" value="<?php echo $user['password']; ?>" required>

        <button type="submit">Simpan Perubahan</button>
    </fo
