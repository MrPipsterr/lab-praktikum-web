<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="register">
    <div class="container">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>  
                <button type="submit" class="btn btn-primary" name="regist">REGISTER NOW</button>
                <div class="notif"></div>
            </form>
        </div>
    </div>
</body>

    <?php
        
        session_start();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $nim = $_POST["nim"];
            $prodi = $_POST["prodi"];
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

            $check_query = "SELECT email FROM halo WHERE email = '$email   '";
            $check_result = $conn->query($check_query);

            if ($check_result->num_rows > 0) {
                echo "Email telah terdaftar. Silahkan gunakan email lain!";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO halo (nama, nim, prodi, email, password) VALUES ('$nama', '$nim', '$prodi', '$email', '$hashed_password')";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION["email"] = $email;

                    $_SESSION["nama"] = $nama;
                    $_SESSION["nim"] = $nim;
                    $_SESSION["prodi"] = $prodi;

                    header("Location: index.php");
                    exit();

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                

            }

            $conn->close();
                
        }

    ?>

</html> 