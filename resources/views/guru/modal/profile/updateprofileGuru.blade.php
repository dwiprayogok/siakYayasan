<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Main modal -->
<div id="updateprofileGuruModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-max max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Data Guru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateprofileGuruModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="editProfileGuruForm">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="col-span-2">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="UserID" id="UserID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ID" required="">
                    </div>
                    <div >
                        <label for="updatekode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Guru</label>
                        <input type="text" name="updatekode" id="updatekode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kode Guru" required="">
                    </div>

                    <div>
                        <label for="updatename" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="updatename" id="updatename" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required="">
                    </div>

                    <div >
                        <label for="updategender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                        <select id="updategender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Jenis Kelamin</option>
                            <option value="Male">Laki - Laki</option>
                            <option value="Female">Perempuan</option>
                        </select>
                    </div>  

                    <div >
                      <label for="updatenip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                      <input type="text" name="updatenip" id="updatenip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="nip" required="">
                    </div>

                    
                    <div class="col-span-2">
                        <label for="updateemail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="updateemail" id="updateemail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                      </div>
  

                    <div >
                        <label for="updatetempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                        <input type="text" name="updatetempat_lahir" id="updatetempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="tempat lahir" required="">
                      </div>

                  <div >
                      <label for="updatetanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                      <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input id="updatetanggal_lahir" name="updatetanggal_lahir"  datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pilih Tanggal">
                      </div>
                    </div>
                    <div class="col-span-2">
                        <label for="updatephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                        <input type="text" name="updatephone" id="updatephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Telepon" required="">
                      </div>
                    <div class="col-span-2">
                        <label for="updatesk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SK</label>
                        <input type="text" name="updatesk" id="updatesk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="SK" required="">
                      </div>
                    <div class="col-span-2">
                      <label for="updaterole" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                      <input type="text" name="updaterole" id="updaterole" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="posisi" required="">
                    </div>
                  <div class="col-span-2">
                      <label for="updateeducation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan Terakhir</label>
                      <select id="updateeducation"  name="updateeducation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                          <option selected="">Pilih Pendidikan</option>
                          <option value="SMA">SMA</option>
                          <option value="SMK">SMK</option>
                          <option value="S.1">Strata 1</option>
                          <option value="S.2">Strata 2</option>
                          <option value="S.3">Strata 3</option>
                      </select>
                  </div>   

                  <div class="col-span-2">
                            
                    <label for="updateaddress" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea id="updateaddress" name="address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Tulis alamat mu disini..."></textarea>

                    </div>



                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" id="update" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Update Data Guru
                    </button>      
                    <button type="button" class="inline-flex items-center hover:text-white border border-white  focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-black dark:focus:ring-whiite" data-modal-toggle="updateprofileGuruModal">
                        Tutup
                    </button>      
                </div>
            </form>
        </div>
    </div>
</div> 


<script>

function formatDate(inputDate) {
    let parts = inputDate.split('/'); // Split by "/"
    if (parts.length !== 3) return null; 
    return `${parts[2]}-${parts[0]}-${parts[1]}`; // Rearrange M/D/Y to Y/M/D
}
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
                $('#updatekode').val(response.kode);
                $('#updatename').val(response.name);
                $('#updatenip').val(response.nip);
                $('#updategender').val(response.gender);
                $('#updatetempat_lahir').val(response.tempat_lahir);
                $('#updatetanggal_lahir').val(response.tanggal_lahir);
                $('#updatephone').val(response.phone);
                $('#updatesk').val(response.sk);
                $('#updateemail').val(response.email);
                $('#updateaddress').val(response.address);
                $('#updaterole').val(response.role);
                $('#updateeducation').val(response.education);

            }
        });
    });


    // Update user data
    $('#editProfileGuruForm').submit(function(e) {
        e.preventDefault();
        let formattedDate = '';
        let userid = $('#UserID').val();
        let rawDate = $('#updatetanggal_lahir').val(); 
        
        if (rawDate.includes('/')) {
            formattedDate = formatDate(rawDate); // Convert format
            
        } else {
            formattedDate = $('#updatetanggal_lahir').val(); // Convert format
        }
        

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        console.log("updateemail: ", $('#updateemail').val());


        var formData = {
            //_token: $('input[name=_token]').val(),
            userid: $('#UserID').val(),
            kode: $('#updatekode').val(),
            name: $('#updatename').val(),
            nip: $('#updatenip').val(),
            gender: $('#updategender').val(),
            tempat_lahir: $('#updatetempat_lahir').val(),
            tanggal_lahir: formattedDate,
            phone: $('#updatephone').val(),
            sk: $('#updatesk').val(),
            email: $('#updateemail').val(),
            role: $('#updaterole').val(),
            education: $('#updateeducation').val(),
            address: $('#updateaddress').val(),
        };

        console.log("formData",formData);

         $.ajax({
                url: '/gurus/' + userid + '/updateData',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.success);
                    location.reload();
                },
                error: function(xhr) {
                    console.log("XHR ERROR", xhr);
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        alert('Error: ' + xhr.responseJSON.message);
                    } else if (xhr.responseJSON) {
                        let allErrors = xhr.responseJSON;
                        let messages = [];

                        for (const key in allErrors) {
                            if (allErrors.hasOwnProperty(key)) {
                                messages.push(allErrors[key][0]);
                            }
                        }

                        alert("Validation Error:\n" + messages.join("\n"));
                    } else {
                        alert("Terjadi kesalahan yang tidak diketahui.");
                    }
                }
            });
    });
</script>
