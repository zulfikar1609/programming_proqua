<!DOCTYPE html>
<html>
<head>
    <title>Cetak Kunjungan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Detail Kunjungan</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= $kunjungan->nama ?></td>
        </tr>
        <tr>
            <th>Jenis Kunjungan</th>
            <td><?= $kunjungan->jenis_kunjungan ?></td>
        </tr>
        <tr>
            <th>Tanggal Kunjungan</th>
            <td><?= $kunjungan->tglkunjungan ?></td>
        </tr>
    </table>
</body>
</html>
