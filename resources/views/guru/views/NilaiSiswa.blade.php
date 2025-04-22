
@extends('layout.masterGuru')
@section('konten')

<section class=" bg-gray-100 dark:bg-gray-100 sm:p-20">


    <div class=" px-1 lg:px-12">
      
        <div class="bg-gradient-to-r from-blue-100 to-yellow-100 p-6 rounded-xl mb-6">
            <div class="flex items-center  mx-auto  space-x-4">
                <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/profile.png" alt="user photo">
      
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">{{Auth::user()->guru->name}}</h3>
                    <p class="text-xl text-gray-600">Posisi : {{ Auth::user()->guru->role ?? 'No class found' }}</p>
                </div>
               
            </div>
        </div>





        <h1 class="text-2xl py-4 border-b-4 mb-5"></h1>
        <div class="bg-white dark:bg-white relative shadow-md sm:rounded-lg overflow-hidden">
           
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-black dark:text-black" id="user-table">
                    <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 dark:text-white">No</th>
                            <th scope="col" class="px-4 py-3  dark:text-white">Nis</th>
                            <th scope="col" class="px-4 py-3  dark:text-white">Nama Siswa</th>
                            <th scope="col" class="px-4 py-3  dark:text-white">Mata Pelajaran</th>
                            <th scope="col" class="px-4 py-6  dark:text-white">Kelas</th>
                            <th scope="col" class="px-4 py-6  dark:text-white">Nilai</th>
                        </tr>
                    </thead>

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