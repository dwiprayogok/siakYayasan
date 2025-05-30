<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Siswa</title>
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
    <h2>Daftar Siswa</h2>

    <table>
        <thead>
            <tr>
                <th scope="col" class="px-4 py-3 dark:text-white">NIS</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Nama</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Kelas</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Jenis Kelamin</th>
                <th scope="col" class="px-4 py-3  dark:text-white">No Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $siswas as $siswa )
            <tr class="border-b dark:border-gray-700">
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->nis }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->name }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->kode_kelas }}</td>
            @if ($siswa->gender === 'Male')
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">Laki - Laki</td>    
            @else
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">Perempuan</td>    
            @endif

            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->phone }}</td>


            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
