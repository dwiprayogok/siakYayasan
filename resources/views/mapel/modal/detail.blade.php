<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Main modal -->
<div id="detailModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail Mata Pelajaran
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="detailModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="detailkode_mapel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Mata Pelajaran</label>
                        <input type="text" disabled name="detailkode_mapel" id="detailkode_mapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kode Mata Pelajaran" required="">
                    </div>
                    <div class="col-span-2">
                      <label for="detailnama_mapel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mata Pelajaran</label>
                      <input type="text" disabled name="detailnama_mapel" id="detailnama_mapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Mata Pelajaran" required="">
                  </div>
                  <div class="col-span-2">
                      <label for="detailkode_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guru</label>
                      <select id="detailkode_guru" disabled  name="detailkode_guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                          <option value="">-- Pilih Guru --</option>
                          <option value="all">ALL</option>
                          {{-- @foreach ($gurus as $guru)
                          <option value="{{ $guru->kode }}" {{ request('kode') == $guru->name ? 'selected' : '' }}>
                              {{ $guru->name }}
                          </option>
                          @endforeach --}}
                      </select>
                  </div>
                </div>
            
            </form>
        </div>
    </div>
</div> 
<script>
    //button create post event
    $('body').on('click', '#detail', function () {

        let userid = $(this).data('id');
        console.log("userid",userid);

        //fetch detail post with ajax
        $.ajax({
            url: `/matapelajarans/${userid}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
                // //fill data to form
                $('#detailkode_mapel').val(response.kode);
                $('#detailnama_mapel').val(response.nama);
                $('#detailkode_guru').val(response.kode_guru);
            }
        });
    });

</script>


