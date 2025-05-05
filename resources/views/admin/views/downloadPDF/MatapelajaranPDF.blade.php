<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Pelajaran</title>
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
    <h2>Daftar Mata Pelajaran</h2>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Nama Guru</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $matapelajarans as $mapel)
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $mapel->id }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $mapel->kode_mapel }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $mapel->nama }}</td>
                <td class="px-4 py-3 font-medium text-gray-900  whitespace-nowrap dark:text-black">{{ $mapel->guru ? $mapel->guru->name : 'Not Found' }}</td>
               

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
