<?php
    $data = [
        [
            "nama_barang" => "HP",
            "harga" => 3000000,
            "stok" => 10,
            "jenis" => "Elektronik"
        ],
        [
            "nama_barang" => "Jeruk",
            "harga" => 5000,
            "stok" => 20,
            "jenis" => "Buah"
        ],
        [
            "nama_barang" => "Kemeja",
            "harga" => 5000,
            "stok" => 9,
            "jenis" => "Pakaian"
        ],
        [
            "nama_barang" => "Apel",
            "harga" => 5000,
            "stok" => 5,
            "jenis" => "Buah"
        ],
        [
            "nama_barang" => "Celana",
            "harga" => 5000,
            "stok" => 10,
            "jenis" => "Pakaian"
        ],
        [
            "nama_barang" => "Laptop",
            "harga" => 50000,
            "stok" => 30,
            "jenis" => "Elektronik"
        ],
        [
            "nama_barang" => "Semangka",
            "harga" => 5000,
            "stok" => 2,
            "jenis" => "Buah"
        ],
        [
            "nama_barang" => "Kaos",
            "harga" => 5000,
            "stok" => 1,
            "jenis" => "Pakaian"
        ],
        [
            "nama_barang" => "VGA",
            "harga" => 2000000,
            "stok" => 0,
            "jenis" => "Elektronik"
        ]
    ];

    function filterDataByJenis($data, $jenis) {
        $filteredData = [];
        foreach ($data as $item) {
            if ($item["jenis"] == $jenis) {
                $filteredData[] = $item;
            }
        }
        return $filteredData;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jenis"])) {
        $jenis = $_POST["jenis"];
        $filteredData = filterDataByJenis($data, $jenis);
    } else {
        $filteredData = [];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 1</title>
</head>
<body>
    <form method="POST">
        <label for="jenis">Jenis:</label>
        <input type="text" name="jenis" id="jenis">
        <button type="submit">Submit</button>
    </form>
    <table border=1>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($filteredData)) : ?>
                <?php foreach ($filteredData as $item) : ?>
                    <tr>
                        <td><?php echo $item["nama_barang"]; ?></td>
                        <td><?php echo $item["stok"]; ?></td>
                        <td><?php echo $item["harga"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>