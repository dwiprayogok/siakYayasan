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
    <h2>Nilai Siswa</h2>

    <table>
        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-3 dark:text-white">Kode</th>
                <th scope="col" class="px-4 py-3 dark:text-white">Mata Pelajaran</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Nilai</th>

            </tr>
        </thead>
        <tbody>
            @foreach ( $nilai as $item )
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $item->kode_mapel }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black"> {{ $item->matapelajaran->nama ?? '-' }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $item->nilai }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
