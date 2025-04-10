@extends('layout.master')


@section('konten')

<section class=" bg-gray-100 dark:bg-gray-100 sm:p-20">
    <div class=" px-1 lg:px-12">
        <h1 class="text-2xl py-4 border-b-4 mb-5">List Mata Pelajaran</h1>
        <div class="bg-white dark:bg-white relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <form method="GET" action="{{ url('/adminControl/matapelajaran') }}" class="mb-4">
                    <input type="text" name="search" class="border p-2 rounded-lg focus:ring-4 focus:ring-primary-700 " value="{{ request('search') }}" placeholder="Search by Mata Pelajaran">
                   
                    <button type="submit" class="mt-2 ml-10 bg-primary-700 text-white px-4 py-2 rounded">Search</button>
                    </form>

                   
                <button type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4
                 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-700 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                 data-modal-target="createModal" data-modal-toggle="createModal">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Tambah Data
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-black dark:text-black" id="user-table">
                    <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 dark:text-white">No</th>
                            <th scope="col" class="px-4 py-3  dark:text-white">Kode</th>
                            <th scope="col" class="px-4 py-3  dark:text-white">Mata Pelajaran</th>
                            <th scope="col" class="px-4 py-3   dark:text-white">Nama Guru</th>
                            <th scope="col" class="px-4 py-6  dark:text-white">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ( $matapelajarans as $mapel )
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $mapel->id }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $mapel->kode }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $mapel->nama }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900  whitespace-nowrap dark:text-black">{{ $mapel->guru ? $mapel->guru->name : 'Not Found' }}</td>
                            <td class="p-4">
                                <button class="mr-4 update" title="update" id="btnUpdate" data-id="{{ $mapel->id }}" data-modal-target="updateModal" data-modal-toggle="updateModal"  > 
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
                                <button class="mr-4 btnDelete" title="delete" id="btnDelete" data-id="{{ $mapel->id }}" data-modal-target="deleteModal" data-modal-toggle="deleteModal">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                    <path
                                      d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                      data-original="#000000" />
                                    <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                      data-original="#000000" />
                                  </svg>
                                </button>
                                
                                <button class="mr-2 detail" title="view" id="detail" data-id="{{ $mapel->id }}" data-modal-target="detailModal" data-modal-toggle="detailModal">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                                      </svg>
                                  </button>
                              </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="d-flex justify-content-center mb-3 mr-3 ml-3">
                    {{ $matapelajarans->links() }}
                </div>
                
            </div>
        </div>
    </div>
</section>
@include('mapel.modal.create')
@include('mapel.modal.delete')
@include('mapel.modal.update')
@include('mapel.modal.detail')



@endsection