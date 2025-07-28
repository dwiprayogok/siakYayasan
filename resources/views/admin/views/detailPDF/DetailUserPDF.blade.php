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
    <h2>Detail User : {{$user->name}}</h2>

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
            <tr class="border-b">
                <td class="px-4 py-3">{{ $user->name ?? '-----' }}</td>
                <td class="px-4 py-3">{{ $user->username ?? '-----' }}</td>
                <td class="px-4 py-3">{{ $user->email ?? '-----' }}</td>
                <td class="px-4 py-3">{{ $user->role ?? '-----' }}</td>
                <td class="px-4 py-3">
                    @if($user->active === 1)
                        Aktif
                    @elseif($user->active === 0)
                        Tidak Aktif
                    @else
                        -
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
