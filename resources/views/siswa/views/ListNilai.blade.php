@extends('layout.masterSiswa')
@section('konten')


<div class="max-w mx-auto p-6 bg-white rounded-lg shadow-md">
    <!-- Header -->
    <div class="mb-6">
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-200 dark:border-gray-200" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-black hover:text-green-700 dark:text-black dark:hover:text-green-700">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-black " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-green-700 md:ms-2 dark:text-black dark:hover:text-green-700">Nilai</a>
                        </div>
                    </li>
            
                </ol>
            </nav>
        <br>
        <p class="text-2xl font-bold  text-gray-800"> {{ now()->locale('id')->translatedFormat('l, d F Y') }}</p>     
    </div>
  
    <!-- Profile Card -->
    <div class="bg-gradient-to-r from-blue-100 to-yellow-100 p-6 rounded-xl mb-6">
        <div class="flex items-center  mx-auto  space-x-4">
            <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/profile.png" alt="user photo">
  
            <div>
                <h3 class="text-2xl font-bold text-gray-900">{{Auth::user()->siswa->name}}</h3>
                <p class="text-xl text-gray-600">Kelas {{ Auth::user()->siswa->kode_kelas ?? 'No class found' }}</p>
            </div>
      
        </div>
    </div>
  
    <!-- Form Grid -->
    <div class="bg-white dark:bg-white relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-black dark:text-black" id="user-table">
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
            <br>
            <div class="d-flex justify-content-center mb-3 mr-3 ml-3">
                {{ $nilai->links() }}
            </div>
            
        </div>
    </div>
    
</div>
@endsection