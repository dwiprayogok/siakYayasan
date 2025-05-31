@extends('layout.master')

 
@section('konten')

    <section class=" bg-gray-100 dark:bg-gray-100 sm:p-20">
        <div class=" px-1 lg:px-12">
            <h1 class="text-2xl py-4 border-b-4 mb-5">List Nilai Siswa</h1>
            <div class="bg-white dark:bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <form method="GET" action="{{ url('/adminControl/nilai') }}" class="mb-4">
                        <input type="text" name="search" class="border p-2 rounded-lg focus:ring-4 focus:ring-primary-700 " value="{{ request('search') }}" placeholder="Search by nama siswa">

                        <select name="kelas"  class="border p-2 rounded-lg focus:ring-4 focus:ring-primary-500">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelass as $kelas)
                                <option value="{{ $kelas->kode_kelas }}" {{ request('kelas') == $kelas->kode_kelas ? 'selected' : '' }}>
                                    {{ $kelas->nama }}
                                </option>
                            @endforeach
                        </select>


                        <button type="submit" class="mt-2 ml-10 bg-primary-700 text-white px-4 py-2 rounded">Search</button>
                    </form>


                    <div class="flex space-x-4"> 
                          <!-- Print Data Button -->
                          <button type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 
                          focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-700 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" 
                          onclick="window.open('{{ route('nilai.printAllSiswa') }}?search={{ request('search') }}&kelas={{ request('kelas') }}', '_blank')">
                              <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path clip-rule="evenodd" fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1V9a1 1 0 011-1h4a1 1 0 011 1v6h1a2 2 0 002-2V9a2 2 0 00-2-2H6V4a2 2 0 00-2-2H4zm0 9h6v-1H4v1zm0-3h6V6H4v3zm7 0v4h1v-4h-1zm0-3v1h1V6h-1zm0-3v1h1V3h-1z" />
                              </svg>
                              Print Data
                          </button>
                           
                    </div>
                 
                   
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-black dark:text-black" id="user-table">
                        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-8 py-3  dark:text-white">Aksi</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">Nama</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">Kelas</th>
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
                            $nilaiBindo = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL003');
                            $nilaiIpa = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL009');

                            $nilaiMtk = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL005');
                            $nilaiPkn = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL002');
                            $nilaiPai = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL001');
                            $nilaiEnglish = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL004');
                            $nilaiSunda = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL011');
                            $nilaiIps = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL006');
                            $nilaiKomp = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL017');


                            $nilaiBudaya = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL007');
                            $nilaiPJOK = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL008');
                            $nilaiPrakarya = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL010');
                            $nilaiBacaAlq = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL012');
                            $nilaiFiqih = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL013');
                            $nilaiAswaja = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL014');
                            $nilaiTik = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL015');
                            $nilaiAqidah = $siswa->nilai->firstWhere('matapelajaran.kode_mapel', 'MAPEL016');

                             @endphp


                            <tr class="border-b dark:border-gray-700">
                                <td class="p-4 px-10">
                                    <button class="mr-2 detail" title="view" id="detail" onclick="window.open('{{ route('nilai.printDetail', ['id_student'=> $siswa->id_student]) }}', '_blank')" >
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                          <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                          <rect x="6" y="14" width="12" height="8"></rect>
                                        </svg>
                                    </button>
      
                                </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->name }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->kode_kelas }}</td>
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
                    <br>
                    <div class="d-flex justify-content-center mb-3 mr-3 ml-3">
                        {{ $siswas->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </section>



@endsection