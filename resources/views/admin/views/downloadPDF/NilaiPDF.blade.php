<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Nilai Murid </title>
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
    <h2>Daftar Nilai</h2>

    <table>
        <thead>
            <tr>
                <th scope="col" class="px-4 py-3 dark:text-white">Nama</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Username</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Email</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Role</th>
                <th scope="col" class="px-4 py-3  dark:text-white">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $users as $user )
            <tr class="border-b dark:border-gray-700">

                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $user->name }}</td>
                            
                @if ($user->username === '')
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">-----</td>    
                @else
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $user->username }}</td>
                @endif

                
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $user->email }}</td>

                @if ($user->role === '')
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">-----</td>    
                @else
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $user->role }}</td>
                @endif


                
                @if ($user->active === 1)
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">Aktif</td>    
                @elseif ($user->active === 0)
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">Tidak Aktif</td>    
                @else
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">-</td>    
                @endif
    
            </tr>
           

        
            @endforeach
        </tbody>
    </table>
</body>
</html>
