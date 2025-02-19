<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Main modal -->
<div id="updateGuruModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Data Guru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateGuruModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="editUserForm">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="col-span-2">
                        <input type="hidden" name="UserID" id="UserID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ID" required="">
                    </div>
                    <div >
                        <label for="updatekode_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Guru</label>
                        <input type="text" name="kode_guru" id="kode_guru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kode Guru" required="">
                    </div>

                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required="">
                    </div>

                    <div >
                      <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                      <input type="text" name="nip" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="nip" required="">
                    </div>
                  <div >
                      <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                      <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input id="tanggal_lahir" name="tanggal_lahir"  datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pilih Tanggal">
                      </div>
                    </div>
                    <div class="col-span-2">
                        <label for="sk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SK</label>
                        <input type="text" name="sk" id="sk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="SK" required="">
                      </div>
                    <div class="col-span-2">
                      <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                      <input type="text" name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="posisi" required="">
                    </div>
                  <div class="col-span-2">
                      <label for="education" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan Terakhir</label>
                      <select id="education"  name="education" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                          <option selected="">Pilih Pendidikan</option>
                          <option value="SMA">SMA</option>
                          <option value="SMK">SMK</option>
                          <option value="S.1">Strata 1</option>
                          <option value="S.2">Strata 2</option>
                          <option value="S.3">Strata 3</option>
                      </select>
                  </div>   
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" id="update" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Update user
                    </button>      
                    <button type="button" class="inline-flex items-center hover:text-white border border-white  focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-black dark:focus:ring-whiite" data-modal-toggle="updateGuruModal">
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
        console.log("userid",userid);

        //fetch update post with ajax
        $.ajax({
            url: `/gurus/${userid}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
                // //fill data to form
                $('#UserID').val(response.id);
                $('#kode_guru').val(response.kode_guru);
                $('#name').val(response.name);
                $('#nip').val(response.nip);
                $('#tanggal_lahir').val(response.tanggal_lahir);
                $('#sk').val(response.sk);
                $('#role').val(response.role);
                $('#education').val(response.education);

            }
        });
    });


    // Update user data
    $('#editUserForm').submit(function(e) {
        e.preventDefault();
        let userid = $('#UserID').val();
        
        var formData = {
            _token: $('input[name=_token]').val(),
            userid: $('#UserID').val(),
            kode_guru: $('#kode_guru').val(),
            name: $('#name').val(),
            nip: $('#nip').val(),
            tanggal_lahir: $('#tanggal_lahir').val(),
            sk: $('#sk').val(),
            role: $('#role').val(),
            education: $('#education').val(),
        };

        $.post('/gurus/' + userid + '/update', formData, function(response) {
            alert(response.success);
            location.reload(); // Refresh page to see changes
        }).fail(function(xhr) {
            alert('Error: ' + xhr.responseJSON.message);
        });
    });
</script>
