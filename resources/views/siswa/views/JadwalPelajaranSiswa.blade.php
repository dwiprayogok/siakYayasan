
@extends('layout.masterSiswa')
@section('konten')

<section class=" bg-gray-100 dark:bg-gray-100 sm:p-20">


    <div class=" px-1 lg:px-12">



        <div class="bg-gradient-to-r from-blue-100 to-yellow-100 p-6 rounded-xl mb-6">
            <div class="flex items-center  mx-auto  space-x-4">
                <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/profile.png" alt="user photo">
      
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">{{Auth::user()->name}}</h3>
                    <p class="text-xl text-gray-600">Kelas {{ Auth::user()->siswa->kelas_id ?? 'No class found' }}</p>
                </div>
               
            </div>
        </div>


        <div class="bg-white dark:bg-white relative shadow-md sm:rounded-lg overflow-hidden">
           
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-black dark:text-black" id="user-table">
                    <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 dark:text-white">Hari</th>
                            <th scope="col" class="px-4 py-3  dark:text-white">Jam Mulai</th>
                            <th scope="col" class="px-4 py-3  dark:text-white">Jam Selesai</th>
                            <th scope="col" class="px-4 py-3  dark:text-white">Mata Pelajaran</th>
                            <th scope="col" class="px-4 py-6  dark:text-white">Kelas</th>
                            <th scope="col" class="px-4 py-6  dark:text-white">Nama Guru</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $item)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $item->hari }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $item->start_time }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $item->end_time }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $item->matapelajaran }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $item->kelas }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $item->Nama_Guru }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Tidak ada data.</td>
                </tr>
            @endforelse
                    </tbody>
                </table>
                <br>
                {{-- <div class="d-flex justify-content-center mb-3 mr-3 ml-3">
                    {{ $users->links() }}
                </div> --}}
                
            </div>
        </div>
    </div>
</section>



@endsection