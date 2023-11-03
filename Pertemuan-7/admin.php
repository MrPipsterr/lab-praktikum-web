<?php

session_start();
$isadmin = false;
if (isset($_SESSION["role"])) {
        if($_SESSION["role"] == "admin") {
            echo "Berhasil Masuk!";
            $isadmin = true;
        }
        else {
            $isadmin = false;
            echo "anda bukan admin";
        }
    }

    else {
        echo "anda belum login";
    }

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        window.history.forward();
    </script>

    <?php if ($isadmin == true): ?>


    <form action="">
        <button type="submit" class="btn btn-danger" name="logout">LOGOUT</button>
    <?php

    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "praktikum7";

    $conn = new mysqli($server, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $data_query = "SELECT nama, nim, prodi, email FROM halo WHERE email != 'admin@gmail.com'";
    $data_result = $conn->query($data_query);

    if ($data_result->num_rows > 0) {
        echo "<table border='1'>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Email</th>
                    </tr>";

        while ($row = $data_result->fetch_assoc()) {
            echo "<tr>
                        <td>" . $row["nama"] . "</td>
                        <td>" . $row["nim"] . "</td>
                        <td>" . $row["prodi"] . "</td>
                        <td>" . $row["email"] . "</td>
                        </tr>";
        }

        echo "</table>";
    } else {
        echo "No data available.";
    }

    ?>
    </form>

    <h2>Data Mahasiswa:</h2>


    <h2>Tambahkan Mahasiswa:</h2>
    <form action="" method="post">
        Nama: <input type="text" name="nama" required><br>
        NIM: <input type="text" name="nim" required><br>
        Prodi: <input type="text" name="prodi" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="add_submit" value="Add">
    </form>

    <h2>Update Mahasiswa:</h2>
    <form action="" method="post">
        Email: <input type="email" name="email_update" required><br>
        NIM: <input type="text" name="nim_update" required><br>
        Nama: <input type="text" name="nama_update" required><br>
        Prodi: <input type="text" name="prodi_update" required><br>
        Password: <input type="password" name="password_update" required><br>
        <input type="submit" name="update_submit" value="Update">
    </form>

    <h2>Hapus Mahasiswa:</h2>
    <form action="" method="post">
        Input Email: <input type="email" name="email_delete" required><br>
        <input type="submit" name="delete_submit" value="Delete">
    </form>

    
    <?php

if (isset($_POST['add_submit'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $prodi = $_POST['prodi'];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $check_query = "SELECT email FROM halo WHERE email = '$email   '";
        $check_result = $conn->query($check_query);
        
        if ($check_result->num_rows > 0) {
            echo "Email telah terdaftar. Silahkan gunakan email lain!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $insert_query = "INSERT INTO halo (nama, nim, prodi, email, password) VALUES ('$nama', '$nim', '$prodi', '$email', '$hashed_password')";
            
            if ($conn->query($insert_query) === TRUE) {
                echo "Data berhasil ditambahkan!";
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
    
    if (isset($_POST['update_submit'])) {
        $email_update = $_POST["email_update"];
        $nim_update = $_POST['nim_update'];
        $nama_update = $_POST['nama_update'];
        $prodi_update = $_POST['prodi_update'];
        $password_update = $_POST["password_update"];
        
        $check_query = "SELECT email FROM halo WHERE email = '$email_update'";
        $check_result = $conn->query($check_query);
        
        if ($check_result->num_rows > 0) {
            $hashed_password = password_hash($password_update, PASSWORD_DEFAULT);
            
            $update_query = "UPDATE halo SET nama='$nama_update', nim='$nim_update', prodi='$prodi_update', password='$hashed_password' WHERE email='$email_update'";
            
            if ($conn->query($update_query) === TRUE) {
                echo "Data berhasil diupdate!";
            } else {
                echo "Error: " . $update_query . "<br>" . $conn->error;
            }
        } else {
            echo "Email tidak ditemukan.";
        }
    }
    
    
    if (isset($_POST['delete_submit'])) {
        $email_delete = $_POST['email_delete'];
        
        $delete_query = "DELETE FROM halo WHERE email = '$email_delete'";
        
        if ($conn->query($delete_query) === TRUE) {
            echo "Data berhasil dihapus!";
        } else {
            echo "Error: " . $delete_query . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
    ?>
    <?php endif; ?>
</body>

</html>