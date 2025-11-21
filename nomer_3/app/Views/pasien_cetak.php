<!DOCTYPE html>
<html>
<head>
    <title>Cetak Pasien</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Detail Pasien</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= $pasien->nama ?></td>
        </tr>
        <tr>
            <th>No. Rekam Medis</th>
            <td><?= $pasien->norm ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= $pasien->alamat ?></td>
        </tr>
    </table>
</body>
</html>
