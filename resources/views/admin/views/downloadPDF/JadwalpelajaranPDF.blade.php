<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Jadwal Pelajaran</title>
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
    <h2>Daftar Jadwal Pelajaran</h2>

    <table>
        <thead>
            <tr>
                <th scope="col" class="px-4 py-3  dark:text-white">Jam Mulai</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Jam Selesai</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Hari</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Kelas</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Guru</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Mata Pelajaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $jadwalpelajarans as $japel )
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $japel->start_time }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $japel->end_time }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $japel->hari }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $japel->kelas }}</td>
                <td class="px-4 py-3 font-medium text-gray-900  whitespace-nowrap dark:text-black">{{ $japel->guru ? $japel->guru->name : $japel->kode_guru }}</td>
                <td class="px-4 py-3 font-medium text-gray-900  whitespace-nowrap dark:text-black">{{ $japel->matapelajaran ? $japel->matapelajaran->nama : $japel->kode_mapel  }}</td>
               

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
