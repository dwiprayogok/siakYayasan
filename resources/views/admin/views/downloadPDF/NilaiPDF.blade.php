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
            <th scope="col" class="px-4 py-3  dark:text-white">Nama</th>
            <th scope="col" class="px-4 py-3  dark:text-white">B.INDONESIA</th>
            <th scope="col" class="px-4 py-3  dark:text-white">IPA</th>

            <th scope="col" class="px-4 py-3  dark:text-white">Matematika</th>
            <th scope="col" class="px-4 py-3  dark:text-white">PKN</th>
            <th scope="col" class="px-4 py-3  dark:text-white">PAI</th>
            <th scope="col" class="px-4 py-3  dark:text-white">B.INGGRIS</th>
            <th scope="col" class="px-4 py-3  dark:text-white">B.SUNDA</th>
            <th scope="col" class="px-4 py-3  dark:text-white">IPS</th>
            <th scope="col" class="px-4 py-3  dark:text-white">PEND. KOMPUTER</th> 

            <th scope="col" class="px-4 py-3  dark:text-white">SENI BUDAYA</th>
            <th scope="col" class="px-4 py-3  dark:text-white">PJOK</th>
            <th scope="col" class="px-4 py-3  dark:text-white">PRAKARYA</th>
            <th scope="col" class="px-4 py-3  dark:text-white">Baca Tulis Al-Qur'an</th>
            <th scope="col" class="px-4 py-3  dark:text-white">FIQIH</th>
            <th scope="col" class="px-4 py-3  dark:text-white">ASWAJA</th>
            <th scope="col" class="px-4 py-3  dark:text-white">TIK</th> 
            <th scope="col" class="px-4 py-3  dark:text-white">Aqidah</th> 

            
        </tr>
        </thead>
        <tbody>
            @foreach ( $siswas as $siswa )

            @php
            // Cari nilai dari masing-masing mapel
            $nilaiBindo = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL003');
            $nilaiIpa = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL009');

            $nilaiMtk = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL005');
            $nilaiPkn = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL002');
            $nilaiPai = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL001');
            $nilaiEnglish = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL004');
            $nilaiSunda = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL011');
            $nilaiIps = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL006');
            $nilaiKomp = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL017');


            $nilaiBudaya = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL007');
            $nilaiPJOK = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL008');
            $nilaiPrakarya = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL010');
            $nilaiBacaAlq = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL012');
            $nilaiFiqih = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL013');
            $nilaiAswaja = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL014');
            $nilaiTik = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL015');
            $nilaiAqidah = optional($siswa->nilai)->firstWhere(fn($n) => optional($n->matapelajaran)->kode_mapel === 'MAPEL016');

             @endphp


            <tr class="border-b dark:border-gray-700">
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->name }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiBindo->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiIpa->nilai ?? '-' }}</td>

            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiMtk->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiPkn->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiPai->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiEnglish->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiSunda->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiIps->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiKomp->nilai ?? '-' }}</td>
                

            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiBudaya->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiPJOK->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiPrakarya->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiBacaAlq->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiFiqih->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiAswaja->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiTik->nilai ?? '-' }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $nilaiAqidah->nilai ?? '-' }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
