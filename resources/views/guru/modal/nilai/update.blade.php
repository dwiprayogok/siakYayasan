<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Main modal -->
<div id="updateNilaiSiswaModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-max max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Input Nilai Siswa
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateNilaiSiswaModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5"  action="{{ route('nilai.store') }}" method="POST" >
                {{ csrf_field() }}
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                   
                    <div>
                        <label for="id_student" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                        <input type="text"  name="id_student" id="id_student" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIS" required="">
                    </div>

                    <div>
                        <label for="nameofstudent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text"  name="nameofstudent" id="nameofstudent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required="">
                    </div>

                    <div>
                        <label for="kode_mapel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MataPelajaran</label>
                        <input type="text"  name="kode_mapel" id="kode_mapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Matapelajaran" required="">
                    </div>

                    <div>
                        <label for="nilai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai</label>
                        <input type="text"  name="nilai" id="nilai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nilai" required="">
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Tambah Nilai
                    </button>   
                </div>
            </form>
        </div>
    </div>
</div> 


<script>

    //button create post event
    $('body').on('click', '#btnUpdate', function () {

        let userid = $(this).data('id');
        let id_student = $(this).data('id_student');
        let name = $(this).data('name');
        let mapel = $(this).data('mapel');
        

        $('#id_student').val(id_student);
        $('#nameofstudent').val(name);
        $('#kode_mapel').val(mapel);
    
        });
</script>
