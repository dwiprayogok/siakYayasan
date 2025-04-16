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
                    <div >
                        <label for="updateid_student" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                        <input type="text"  disabled name="updateid_student" id="updateid_student" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="ID Siswa" required="">
                    </div>

                    <div >
                        <label for="updatenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Induk Siswa</label>
                        <input type="text" name="updatenis" id="updatenis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="nis" required="">
                      </div>

                    <div>
                        <label for="updatename" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="text" name="updatename" id="updatename" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="Name" required="">
                    </div>

                    <div>
                        <label for="updateusername" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="updateusername" id="updateusername" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="UserName" required="">
                    </div>

                   
                    <div class="col-span-2">
                        <label for="updateemail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="updateemail" id="updateemail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="UserName" required="">
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

// function formatDate(inputDate) {
//     let parts = inputDate.split('/'); // Split by "/"
//     if (parts.length !== 3) return null; 
//     return `${parts[2]}-${parts[0]}-${parts[1]}`; // Rearrange M/D/Y to Y/M/D
// }
    $('body').on('click', '#btnUpdate', function () {

        let userid = $(this).data('id');
        let name = $(this).data('name');
        let username = $(this).data('username');
        let email = $(this).data('email');
        let nis = $(this).data('nis');
        let phone = $(this).data('phone');
        let address = $(this).data('address');
        let name_of_parent = $(this).data('name_of_parent');


        $('#updateid_student').val(userid);
        $('#updatename').val(name);
        $('#updatenis').val(nis);
        $('#updateusername').val(username);
        $('#updateemail').val(email);
        $('#updatephone').val(phone);
        $('#updateaddress').val(address);
        $('#updatename_of_parent').val(name_of_parent);

    });


    //Update user data
//     $('#editprofileSiswaForm').submit(function(e) {
//     e.preventDefault();
        
//     let userid = $('#updateid_sudent').val();
//     let nis = $('#updatenis').val();
//     console.log("userid", userid);
//     console.log("nis", nis);

    
//     var formData = {
//         // User table fields
//         _token: $('input[name=_token]').val(),
//         name: $('#updatename').val(),
//         email: $('#updateemail').val(), // if you have email field
//         username: $('#updateusername').val(), // if you have username field
        
//         // siswa table fields
//         id: $('#updateid_sudent').val(),
//         nis: $('#updatenis').val(),
//         address: $('#updateaddress').val(),
//         phone: $('#updatephone').val(),
//         name_of_parent: $('#updatename_of_parent').val(),
//     };

//     console.log("formData", formData);

//     $.ajax({
//         //url: '/siswas/' + userid + '/update',
//         url: '/siswas/' + userid + '' + nis + '/update',
//         type: 'POST',
//         data: formData,
//         headers: {
//         'X-CSRF-TOKEN': $('input[name="_token"]').val()
//         },
//         success: function(response) {
//             alert(response.success);
//             location.reload();
//         },
//         error: function(xhr) {
//             alert('Error: ' + (xhr.responseJSON?.message || 'Unknown error occurred'));
//         }
//     });
// });


// $('#editprofileSiswaForm').submit(function(e) {
//     e.preventDefault();
    
//     // Get CSRF token from meta tag (recommended approach)
//     let token = $('meta[name="csrf-token"]').attr('content');
    
//     let userid = $('#updateid_sudent').val();
//     let formData = {
//         // Student data
//         id: userid,
//         nis: $('#updatenis').val(),
//         address: $('#updateaddress').val(),
//         phone: $('#updatephone').val(),
//         name_of_parent: $('#updatename_of_parent').val(),
        
//         // User data
//         name: $('#updatename').val(),
//         email: $('#updateemail').val(),
//         username: $('#updateusername').val()
//     };

//     console.log("Submitting data:", formData);

//     $.ajax({
//         url: '/siswas/' + userid + '/update',
//         type: 'POST',
//         data: formData,
//         headers: {
//             'X-CSRF-TOKEN': token,
//             'X-Requested-With': 'XMLHttpRequest'
//         },
//         success: function(response) {
//             console.log("Success:", response);
//             alert(response.success);
//             location.reload();
//         },
//         error: function(xhr) {
//             console.error("Error:", xhr);
//             if (xhr.status === 419) {
//                 alert('Session expired. Please refresh the page and try again.');
//                 location.reload();
//             } else {
//                 alert('Error: ' + (xhr.responseJSON?.message || 'Unknown error occurred'));
//             }
//         }
//     });
// });


$('#editprofileSiswaForm').submit(function(e) {
    e.preventDefault();

    let token = $('meta[name="csrf-token"]').attr('content');
    let userid = $('#updateid_student').val(); 

    let formData = {
        id: userid,
        nis: $('#updatenis').val(),
        address: $('#updateaddress').val(),
        phone: $('#updatephone').val(),
        name_of_parent: $('#updatename_of_parent').val(),

        _method: 'POST' // If using RESTful route
    };

    $.ajax({
        url: '/siswas/' + userid + '/update',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': token,
            'X-Requested-With': 'XMLHttpRequest'
        },
        success: function(response) {
            console.log("Success:", response);
            alert(response.success || 'Data updated successfully.');
            location.reload();
        },
        error: function(xhr) {
            console.error("Error:", xhr);
            alert('Error: ' + (xhr.responseJSON?.message || 'Something went wrong.'));
        }
    });
});


</script>
