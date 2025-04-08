<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Main modal -->
<div id="updateModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Mata Pelajaran
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="editMapelForm">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <input type="hidden" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ID" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="updatekode_mapel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Mata Pelajaran</label>
                        <input type="text" name="updatekode_mapel" id="updatekode_mapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kode Mata Pelajaran" required="">
                    </div>
                    <div class="col-span-2">
                      <label for="updatenama_mapel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mata Pelajaran</label>
                      <input type="text" name="updatenama_mapel" id="updatenama_mapel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Mata Pelajaran" required="">
                  </div>
                  <div class="col-span-2">
                      <label for="updatekode_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guru</label>
                      <select id="updatekode_guru"  name="updatekode_guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                          <option value="">-- Pilih Guru --</option>
                          <option value="all">ALL</option>
                          {{-- @foreach ($gurus as $guru)
                              <option value="{{ $guru->kode_guru }}">{{ $guru->name }}</option>
                          @endforeach --}}
                      </select>
                  </div>
                    
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" id="update" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Update user
                    </button>      
                    <button type="button" class="inline-flex items-center hover:text-white border border-white  focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-black dark:focus:ring-whiite" data-modal-toggle="updateModal">
                        Tutup
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

        //fetch update post with ajax
        $.ajax({
            url: `/matapelajarans/${userid}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
                // //fill data to form
                $('#id').val(response.id);
                $('#updatekode_mapel').val(response.kode_mapel);
                $('#updatenama_mapel').val(response.nama_mapel);
                $('#updatekode_guru').val(response.kode_guru);
            }
        });
    });


    // Update user data
    $('#editMapelForm').submit(function(e) {
        e.preventDefault();
        let userid = $('#id').val();

        console.log("userid",userid);
        
        var formData = {
            _token: $('input[name=_token]').val(),
            id: $('#id').val(),
            kode_mapel: $('#updatekode_mapel').val(),
            nama_mapel: $('#updatenama_mapel').val(),
            kode_guru: $('#updatekode_guru').val(),

        };

        console.log("formData",formData);


        $.post('/matapelajarans/' + userid + '/update', formData, function(response) {
            alert(response.success);
            location.reload(); // Refresh page to see changes
        }).fail(function(xhr) {
            alert('Error: ' + xhr.responseJSON.message);
        });
    });
</script>
