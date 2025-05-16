@extends('layout.master')

 
@section('konten')

    <section class=" bg-gray-100 dark:bg-gray-100 sm:p-20">
        <div class=" px-1 lg:px-12">
            <h1 class="text-2xl py-4 border-b-4 mb-5">List Nilai Siswa</h1>
            <div class="bg-white dark:bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <form method="GET" action="{{ url('/adminControl/nilai') }}" class="mb-4">
                        <input type="text" name="search" class="border p-2 rounded-lg focus:ring-4 focus:ring-primary-700 " value="{{ request('search') }}" placeholder="Search by nama siswa">
                        <button type="submit" class="mt-2 ml-10 bg-primary-700 text-white px-4 py-2 rounded">Search</button>
                    </form>
                   
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-black dark:text-black" id="user-table">
                        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3  dark:text-white">Nis</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">Nama</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">Kelas</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">Matematika</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">PKN</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">PAI</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">B.INDONESIA</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">B.INGGRIS</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">B.SUNDA</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">IPA</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">IPS</th>
                                <th scope="col" class="px-4 py-3  dark:text-white">PEND. KOMPUTER</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ( $nilai as $score )
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->id_student }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nameofstudent }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->kode_kelas }}</td>
                                <td class="px-10 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nilai }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nilai }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nilai }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nilai }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nilai }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nilai }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nilai }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nilai }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $score->nilai }}</td>
                                

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
    </section>



@endsection