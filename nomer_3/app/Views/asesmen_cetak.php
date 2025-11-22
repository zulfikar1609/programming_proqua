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
    <h2>Detail Asesmen</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= $asesmen->nama ?></td>
        </tr>
        <tr>
            <th>Jenis Kunjungan</th>
            <td><?= $asesmen->jenis_kunjungan ?></td>
        </tr>
        <tr>
            <th>Keluhan Utama</th>
            <td><?= $asesmen->keluhan_utama ?></td>
        </tr>
        <tr>
            <th>Keluhan Tambahan</th>
            <td><?= $asesmen->keluhan_tambahan ?></td>
        </tr>
    </table>
</body>
</html>
