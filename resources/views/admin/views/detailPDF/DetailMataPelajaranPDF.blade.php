<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
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
    <h2>Daftar User</h2>

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
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $matapelajarans->id }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $matapelajarans->kode_mapel }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $matapelajarans->nama }}</td>
                <td class="px-4 py-3 font-medium text-gray-900  whitespace-nowrap dark:text-black">{{ $matapelajarans->guru ? $matapelajarans->guru->name : 'Not Found' }}</td>
               

            </tr>
        </tbody>
    </table>
</body>
</html>
