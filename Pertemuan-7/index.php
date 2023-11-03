<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="login">
        <div class="container">
            <form method="post" action="">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">LOGIN</button>
                </div>
                <p>Belum punya akun ?<a href="register.php"> Daftar disini!</a></p>
            </form>
        </div>
    </div>
</body>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "praktikum7";

    $conn = new mysqli($server, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "SELECT email, password FROM halo WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        if ($email == "admin@gmail.com" && $password == $row["password"]) {
            $_SESSION["email"] = $email;
            $_SESSION["role"] = "admin";
            header("Location: admin.php");
            exit();

        } else if (password_verify($password, $row["password"])) {
            $_SESSION["email"] = $email;
            $_SESSION["role"] = "mahasiswa";

            $info_query = "SELECT nama, nim, prodi FROM halo WHERE email='$email'";
            $info_result = $conn->query($info_query);

            if ($info_result->num_rows == 1) {
                $info_row = $info_result->fetch_assoc();
                $_SESSION["nama"] = $info_row["nama"];
                $_SESSION["nim"] = $info_row["nim"];
                $_SESSION["prodi"] = $info_row["prodi"];
            }

            header("Location: mahasiswa.php");
            exit();
        } else {
            echo "Autentikasi gagal. Silakan coba lagi.";
        }
    } else {
        echo "Autentikasi gagal. Silakan coba lagi.";
    }

    $conn->close();
} 
?>


</html>

