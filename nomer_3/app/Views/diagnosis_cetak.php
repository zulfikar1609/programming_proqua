<!DOCTYPE html>
<html>
<head>
    <title>Cetak Diagnosis</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Detail Diagnosis</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= $diagnosis->nama ?></td>
        </tr>
        <tr>
            <th>Keluhan Utaman</th>
            <td><?= $diagnosis->keluhan_utama ?></td>
        </tr>
        <tr>
            <th>Keluhan Tambahan</th>
            <td><?= $diagnosis->keluhan_tambahan ?></td>
        </tr>
        <tr>
            <th>Diagnosa</th>
            <td><?= $diagnosis->diagnosa ?></td>
        </tr>
        <tr>
            <th>Tindakan Penanganan</th>
            <td><?= $diagnosis->tindakan_penanganan ?></td>
        </tr>
    </table>
</body>
</html>
