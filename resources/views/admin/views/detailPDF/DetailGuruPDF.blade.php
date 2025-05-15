<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Guru</title>
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
    <h2>Daftar Guru</h2>

    <table>
        <thead>
            <tr>
                <th scope="col" class="px-10 py-3   dark:text-white">Nip</th>
                <th scope="col" class="px-10 py-3   dark:text-white">Name</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Posisi</th>
                <th scope="col" class="px-1 py-3  dark:text-white">Tempat & Tanggal Lahir</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Pendidikan</th>
                <th scope="col" class="px-14 py-3  dark:text-white">Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b dark:border-gray-700">

                <td class="px-4 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $gurus->nip }}</td>
                <td class="px-4 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $gurus->name }}</td>
                <td class="px-4 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $gurus->role }}</td>
                <td class="px-4 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $gurus->tempat_lahir }} , {{ $gurus->tanggal_lahir }}</td>
                <td class="px-10 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $gurus->education }}</td>
                <td class="px-10 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $gurus->phone }}</td>
    
            </tr>
        </tbody>
    </table>
</body>
</html>
