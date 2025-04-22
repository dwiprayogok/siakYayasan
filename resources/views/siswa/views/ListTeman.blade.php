@extends('layout.masterSiswa')

 
@section('konten')

<section class=" bg-gray-100 dark:bg-gray-100 sm:p-20">
    <div class=" px-1 lg:px-12">
        

        <div class="bg-gradient-to-r from-blue-100 to-yellow-100 p-6 rounded-xl mb-6">
            <div class="flex items-center  mx-auto  space-x-4">
                <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/profile.png" alt="user photo">
      
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">{{Auth::user()->siswa->name}}</h3>
                    <p class="text-xl text-gray-600">Kelas {{ Auth::user()->siswa->kelas_id ?? 'No class found' }}</p>
                </div>
               
            </div>
        </div>


        <div class="bg-white dark:bg-white relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <form method="GET" action="{{ url('/adminControl/siswa') }}" class="mb-4">
                    <input type="text" name="search" class="border p-2 rounded-lg focus:ring-4 focus:ring-primary-500 " value="{{ request('search') }}" placeholder="Search by name">
            
                    <button type="submit" class="mt-2 ml-10 bg-primary-700 text-white px-4 py-2 rounded">Search</button>
                </form>


                
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-black dark:text-black" id="user-table">
                    <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 hidden dark:text-white">Id Siswa</th>
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
                            <td class="px-4 py-3 font-medium hidden text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->id }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->nis }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->name }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $siswa->kelas_id }}</td>
                            
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
                <br>
                <div class="d-flex justify-content-center mb-3 mr-3 ml-3">
                    {{ $siswas->links() }}
                </div>
                
            </div>
        </div>
    </div>
</section>




@endsection