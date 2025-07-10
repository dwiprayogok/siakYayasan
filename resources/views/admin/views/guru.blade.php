@extends('layout.master')
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
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-green-700 md:ms-2 dark:text-black dark:hover:text-green-700">Guru</a>
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
            {{-- <img src="https://via.placeholder.com/100" alt="Profile" class="w-20 h-20 rounded-full border-4 border-white shadow-md"> --}}
            <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/profile.png" alt="user photo">
  
            <div>
                <h3 class="text-2xl font-bold text-gray-900">{{Auth::user()->name}}</h3>
            </div>
      
        </div>
    </div>
  
    <!-- Form Grid -->
    <div class="bg-white dark:bg-white relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <form method="GET" action="{{ url('/adminControl/guru') }}" class="mb-4">
                <input type="text" name="search" class="border p-2 rounded-lg focus:ring-4 focus:ring-primary-700 " value="{{ request('search') }}" placeholder="Search by name">
                <button type="submit" class="mt-2 ml-10 bg-primary-700 text-white px-4 py-2 rounded">Search</button>
            </form>


            <div class="flex space-x-4">
                <button type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4
                focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-700 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                data-modal-target="createGuruModal" data-modal-toggle="createGuruModal">
                   <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                       <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                   </svg>
                   Tambah Data
               </button>


                 <!-- Print Data Button -->
                 <button type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 
                 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-700 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" 
                 onclick="window.open('{{ route('gurus.print') }}', '_blank')">
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
                        <th scope="col" class="px-10 py-3   dark:text-white">Nip</th>
                        <th scope="col" class="px-10 py-3   dark:text-white">Nama</th>
                        <th scope="col" class="px-4 py-3  dark:text-white">Posisi</th>
                        <th scope="col" class="px-32 py-3  dark:text-white">SK</th>
                        <th scope="col" class="px-1 py-3  dark:text-white">Tempat & Tanggal Lahir</th>
                        <th scope="col" class="px-4 py-3  dark:text-white">Pendidikan</th>
                        <th scope="col" class="px-14 py-3  dark:text-white">No Telepon</th>
                        <th scope="col" class="px-10 py-3  dark:text-white">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $gurus as $guru )
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $guru->nip }}</td>
                        <td class="px-4 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $guru->name }}</td>
                        <td class="px-4 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $guru->role }}</td>
                        <td class="px-4 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $guru->sk }}</td>
                        <td class="px-4 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $guru->tempat_lahir }} , {{ $guru->tanggal_lahir }}</td>
                        <td class="px-10 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $guru->education }}</td>
                        <td class="px-10 py font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $guru->phone }}</td>
                        <td class="p-4">
                            <button class="mr-4 update" title="update" id="btnUpdate" data-id="{{ $guru->id }}" data-modal-target="updateGuruModal" data-modal-toggle="updateGuruModal"  > 
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700"
                                viewBox="0 0 348.882 348.882">
                                <path
                                  d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                  data-original="#000000" />
                                <path
                                  d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                  data-original="#000000" />
                              </svg>
                            </button>
                            <button class="mr-4 btnDelete" title="delete" id="btnDelete" data-id="{{ $guru->id }}" data-modal-target="deleteGuruModal" data-modal-toggle="deleteGuruModal">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                <path
                                  d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                  data-original="#000000" />
                                <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                  data-original="#000000" />
                              </svg>
                            </button>
                            
                            <button class="mr-2 detail" title="view" id="detail" data-id="{{ $guru->id }}" data-modal-target="detailGuruModal" data-modal-toggle="detailGuruModal">
                                <svg class="w-6 h-6 text-gray-800 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                                  </svg>
                              </button>

                              <button class="mr-2 detail" title="view" id="detail" onclick="window.open('{{ route('gurus.printDetail', ['id' => $guru->id]) }}', '_blank')" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                    <rect x="6" y="14" width="12" height="8"></rect>
                                  </svg>
                              </button>


                          </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div class="d-flex justify-content-center mb-3 mr-3 ml-3">
                {{ $gurus->links() }}
            </div>
            
        </div>
    </div>
    
</div>





@include('guru.modal.create')
@include('guru.modal.delete')
@include('guru.modal.update')
@include('guru.modal.detail')

@endsection