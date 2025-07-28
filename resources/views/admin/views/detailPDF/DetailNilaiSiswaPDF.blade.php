<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nilai Siswa</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #cccccc;
            padding: 8px 6px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
        }
        h2 {
            text-align: center;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <h2>Nilai Siswa: {{ $siswas->name }}</h2>

    <table>
        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
            <tr>
                <th class="px-4 py-3 dark:text-white">Kelas</th>
                <th class="px-4 py-3 dark:text-white">Nama Mapel</th>
                <th class="px-4 py-3 dark:text-white">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas->nilai as $item)
            <tr>
                <td>{{ $item->kode_kelas }}</td>
                <td>{{ $item->matapelajaran->nama ?? '-' }}</td>
                <td>{{ $item->nilai }}</td>
            </tr>
        @endforeach

          
        </tbody>
    </table>
</body>
</html>
