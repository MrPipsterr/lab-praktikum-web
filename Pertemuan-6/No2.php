<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 2</title>
</head>
<body>
    <h1>Form</h1>
    <form method="post">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td>:</td>
                <td><input type="int" name="usia" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Tanggal lahir</td>
                <td>:</td>
                <td><input type="date" name="ttl" required></td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>:</td>
                <td>
                    <label for="cowok">Laki-Laki</label>
                    <input type="radio" id="cowok" name="gender" value="man" required>
                    
                    <label for="cewek">Perempuan</label>
                    <input type="radio" id="cewek" name="gender" value="woman" required>
                </td>
            </tr>
            <tr>
                <td>Bahasa yang dikuasai</td>
                <td>:</td>
                <td>
                    <input type="checkbox" id="option1" name="choices[]" value="Java">
                    <label for="option1">Java</label>

                    <input type="checkbox" id="option2" name="choices[]" value="Python">
                    <label for="option2">Python</label>

                    <input type="checkbox" id="option3" name="choices[]" value="HTML">
                    <label for="option3">HTML</label>

                    <input type="checkbox" id="option4" name="choices[]" value="CSS">
                    <label for="option3">CSS</label>

                    <input type="checkbox" id="option5" name="choices[]" value="JavaScript">
                    <label for="option3">JavaScript</label>

                    <input type="checkbox" id="option6" name="choices[]" value="PHP">
                    <label for="option3">PHP</label>
                </td>
            </tr>
        </table>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>

    <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $usia = $_POST['usia'];
            $kata1 = "Halo! Perkenalkan nama saya " . $nama . ", saya berumur " . $usia . " tahun, ";

            $date = $_POST['ttl'];
            $tanggal = date("d", strtotime($date));
            $bulan = [
                '01' => 'januari',
                '02' => 'februari',
                '03' => 'maret',
                '04' => 'april',
                '05' => 'mei',
                '06' => 'juni',
                '07' => 'juli',
                '08' => 'agustus',
                '09' => 'september',
                '10' => 'oktober',
                '11' => 'november',
                '12' => 'desember'
            ];
            $tahun = date("Y", strtotime($date));
            $kata2 = "saya lahir pada tanggal " . $tanggal . " " . $bulan[date("m", strtotime($date))] . " tahun " . $tahun . ", ";

            $gender = $_POST["gender"];
            if ($gender == "man") {
                $kata3 = "saya berjenis kelamin Laki-laki ";
            } elseif ($gender == "woman") {
                $kata3 = "saya berjenis kelamin Perempuan ";
            }

            if (isset($_POST["choices"])) {
                $bahasa = $_POST["choices"];
                    if (count($bahasa) > 1) {
                        $bahasa_terakhir = end($bahasa);
                        array_pop($bahasa);
                        $kata4 = "dan saat ini saya berhasil menguasai bahasa pemrograman " . implode(", ", $bahasa) . " dan " . $bahasa_terakhir;
                    } else {
                        $kata4 = "dan saat ini saya berhasil menguasai bahasa pemrograman " . implode(", ", $bahasa);                    }
                } else {
                    $kata4 = "dan saat ini saya belum menguasai bahasa pemrograman apapun.";
                } 
            echo $kata1 . $kata2 . $kata3 . $kata4;
        }
    ?>
</body>
</html>