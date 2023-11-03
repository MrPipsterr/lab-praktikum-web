<?php
    session_start();
    $ismahasiswa = false;
    if (isset($_SESSION["role"])) {
        if($_SESSION["role"] == "mahasiswa") {
            echo "Berhasil Masuk!";
            $ismahasiswa = true;
        }
        else {
            $ismahasiswa = false;
            echo "anda bukan mahasiswa";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<script>
        window.history.forward();
</script>

<?php if ($ismahasiswa == true): ?>

<form action="" method="get">
    <button type="submit" class="btn btn-danger" name="logout">LOGOUT</button>
</form>



<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nama</th>
                <td><?php echo $_SESSION["nama"]; ?></td>
            </tr>
            <tr>
                <th scope="row">NIM</th>
                <td><?php echo $_SESSION["nim"]; ?></td>
            </tr>
            <tr>
                <th scope="row">Program Studi</th>
                <td><?php echo $_SESSION["prodi"]; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php endif; ?>

</body>

</html>

