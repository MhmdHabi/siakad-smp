<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            padding: 20px;
            margin: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            font-size: 24px;
            color: #2c3e50;
        }

        .header h3 {
            font-size: 18px;
            color: #7f8c8d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 12px 15px;
            font-size: 14px;
        }

        th {
            background-color: #f7f7f7;
            font-weight: bold;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Remove border for the info-siswa table */
        .info-siswa table {
            border: none;
        }

        .info-siswa td {
            border: none;
        }

        .info-siswa {
            margin-bottom: 20px;
        }

        .kehadiran {
            margin-top: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .kehadiran h3 {
            font-size: 18px;
            margin-bottom: 20px;
            color: black;
        }

        .kehadiran table {
            width: 100%;
            margin-top: 10px;
        }

        .kehadiran td {
            padding: 12px 15px;
            font-size: 14px;
            border-top: 1px solid #ddd;
        }

        .kehadiran td:first-child {
            font-weight: bold;
            color: black;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Daftar Nilai Siswa</h2>
        <h3>E-Raport SMP Satu Atap Merangin</h3>
    </div>

    <div class="info-siswa">
        <table class="table">
            <tr>
                <td><strong>Nama:</strong> {{ $siswa->name }}</td>
                <td><strong>Tahun Akademik:</strong> {{ $tahunAkademik ? $tahunAkademik->tahun : 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>NISN:</strong> {{ $siswa->nisn }}</td>
                <td><strong>Semester:</strong> {{ $tahunAkademik ? $tahunAkademik->semester : 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Nilai Pengetahuan</th>
                <th>Nilai Keterampilan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilaiSiswa as $index => $nilai)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $nilai->mapel->nama_mapel }}</td>
                    <td>{{ $nilai->nilai_pengetahuan }}</td>
                    <td>{{ $nilai->nilai_keterampilan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="kehadiran">
        <h3>Kehadiran</h3>
        <table>
            <tr>
                <td>Hadir</td>
                <td>{{ $kehadiran['hadir'] }}</td>
            </tr>
            <tr>
                <td>Izin</td>
                <td>{{ $kehadiran['izin'] }}</td>
            </tr>
            <tr>
                <td>Alpha</td>
                <td>{{ $kehadiran['alpha'] }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
