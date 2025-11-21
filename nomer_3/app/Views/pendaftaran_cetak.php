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
    <h2>Detail Pendaftaran</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= $pendaftaran->nama ?></td>
        </tr>
        <tr>
            <th>No. Registrasi</th>
            <td><?= $pendaftaran->noregistrasi ?></td>
        </tr>
        <tr>
            <th>Tanggal Registrasi</th>
            <td><?= $pendaftaran->tglregistrasi ?></td>
        </tr>
    </table>
</body>
</html>
