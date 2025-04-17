<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Main modal -->
<div id="updateprofileModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-max max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Profile
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateprofileModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="editprofileSiswaForm">
                @csrf

                <div class="grid gap-6 mb-6 md:grid-cols-2">

                    <div  class="col-span-2">
                        <label for="updateid_sudent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Siswa</label>
                        <input type="text"  disabled name="updateid_sudent" id="updateid_sudent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="ID Siswa" required="">
                    </div>
                   
                    <div >
                        <label for="updatenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Induk Siswa</label>
                        <input type="text" name="updatenis" id="updatenis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="nis" required="">
                      </div>

                    <div>
                        <label for="updatename" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="text" name="updatename" id="updatename" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="Name" required="">
                    </div>

  
                    <div class="col-span-2">
                        <label for="updateemail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="updateemail" id="updateemail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="UserName" required="">
                    </div>

                    <div >
                        <label for="updategender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                        <select id="updategender" name="updategender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Jenis Kelamin</option>
                            <option value="Male">Laki - Laki</option>
                            <option value="Female">Perempuan</option>
                        </select>
                    </div>   

                    <div >
                        <label for="updateclass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <select id="updateclass"  name="kelas_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Kelas</option>
                            @foreach ($kelass as $kelas)
                            <option value="{{ $kelas->kode_kelas }}" {{ request('kelas') == $kelas->nama ? 'selected' : '' }}>
                                {{ $kelas->kode_kelas }}
                            </option>
                        @endforeach
                        </select>
                    </div>

                
                    <div >
                        <label for="updateborn_place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir </label>
                        <input type="text" name="updateborn_place" id="updateborn_place" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="Tempat Lahir" required="">
                    </div>
                   
                  <div >
                      <label for="updatebirth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                      <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input id="updatebirth_date" name="updatebirth_date"  datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="Pilih Tanggal">
                      </div>
                    </div>

                    <div>
                        <label for="updatephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                        <input type="number" name="updatephone" id="updatephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  maxlength="12" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"  placeholder="No Telephone" required="">
                    </div>

                    <div>
                        <label for="updatename_of_parent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Orang Tua</label>
                        <input type="text" name="updatename_of_parent" id="updatename_of_parent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="Nama Orangtua" required="">
                    </div>
                    


                    <div class="col-span-2">
                            
                    <label for="updateaddress" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea id="updateaddress" name="updateaddress" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Tulis alamat mu disini..."></textarea>

                    </div>

                  
                  
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" id="update" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Update Profile
                    </button>      
                    <button type="button" class="inline-flex items-center hover:text-white border border-white  focus:ring-4 focus:outline-none focus:ring-white font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-black dark:focus:ring-whiite" data-modal-toggle="updateprofileModal">
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
    $('body').on('click', '#btnUpdate', function () {

        let userid = $(this).data('id');
        let nis = $(this).data('nis');
        let name = $(this).data('name');
        let kelas = $(this).data('kelas_id');
        let born_place = $(this).data('born_place');
        let birth_date = $(this).data('birth_date');
        let email = $(this).data('email');
        let phone = $(this).data('phone');
        let gender = $(this).data('gender');
        let address = $(this).data('address');
        let name_of_parent = $(this).data('name_of_parent');


        $('#updateid_sudent').val(userid);
        $('#updatenis').val(nis);
        $('#updatename').val(name);
        $('#updateemail').val(email);
        $('#updategender').val(gender);
        $('#updateclass').val(kelas);
        $('#updateborn_place').val(born_place);
        $('#updatebirth_date').val(birth_date);
        $('#updatephone').val(phone);
        $('#updatename_of_parent').val(name_of_parent);
        $('#updateaddress').val(address);

    });


   

$('#editprofileSiswaForm').submit(function(e) {
        e.preventDefault();
        let formattedDate = '';
        let userid = $('#updateid_sudent').val();
        let rawDate = $('#updatebirth_date').val(); 

        console.log("rawDate",rawDate);
        
        if (rawDate.includes('/')) 
        {
            formattedDate = formatDate(rawDate); // Convert format            
        } else
        {
            formattedDate = $('#updatebirth_date').val(); // Convert format
        }

        console.log("formattedDate",formattedDate);
        console.log("updateclass", $('#updateclass').val());

    
        var formData = {
            _token: $('input[name=_token]').val(),
            nis: $('#updatenis').val(),
            name: $('#updatename').val(),
            email: $('#updateemail').val(),
            gender: $('#updategender').val(),
            kelas_id: $('#updateclass').val(),
            born_place: $('#updateborn_place').val(),
            birth_date: formattedDate,
            phone: $('#updatephone').val(),
            name_of_parent: $('#updatename_of_parent').val(),
            address: $('#updateaddress').val(),
        };

        console.log("formData",formData);


        $.post('/siswas/' + userid + '/update', formData, function(response) {
            console.log("formData",formData);
            alert(response.success);
            location.reload(); // Refresh page to see changes
        }).fail(function(xhr) {
            //alert('Error: ' + xhr.responseJSON.message);
            console.log("XHR ERROR", xhr);

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    alert('Error: ' + xhr.responseJSON.message);
                } else if (xhr.responseJSON) {
                    // Tampilkan semua error validasi
                    let allErrors = xhr.responseJSON;
                    let messages = [];

                    for (const key in allErrors) {
                        if (allErrors.hasOwnProperty(key)) {
                            messages.push(allErrors[key][0]); // Ambil pesan error pertama
                        }
                    }

                    alert("Validation Error:\n" + messages.join("\n"));
                } else {
                    alert("Terjadi kesalahan yang tidak diketahui.");
                }
                            
        });
});


</script>
