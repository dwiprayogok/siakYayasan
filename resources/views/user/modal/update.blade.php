<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Main modal -->
<div id="updateModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="editUserForm">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <input type="hidden" name="UserID" id="UserID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ID" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="updateName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="updateName" id="updateName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Neame" required="">
                    </div>
                    <div class="col-span-2">
                      <label for="updateUsername" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                      <input type="text" name="updateUsername" id="updateUsername" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Username" required="">
                  </div>
                  <div class="col-span-2">
                      <label for="updateEmail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                      <input type="email" name="updateEmail" id="updateEmail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                    </div>
                    <div class="col-span-2">
                      <label for="updatePassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="updatePassword" id="updatePassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Password" >
                    </div>
                  <div class="col-span-2">
                      <label for="updateRole" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">role</label>
                      <select id="updateRole" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                          <option selected="">Pilih role</option>
                          <option value="admin">Admin</option>
                          <option value="siswa">Siswa</option>
                          <option value="guru">Guru</option>
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
            url: `/users/${userid}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
                // //fill data to form
                $('#UserID').val(response.id);
                $('#updateName').val(response.name);
                $('#updateUsername').val(response.username);
                $('#updateEmail').val(response.email);
                $('#updateRole').val(response.role);

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
            name: $('#updateName').val(),
            username: $('#updateUsername').val(),
            email: $('#updateEmail').val(),
            role: $('#updateRole').val(),
            password: $('#updatePassword').val(),
        };

        $.post('/users/' + userid + '/update', formData, function(response) {
            alert(response.success);
            location.reload(); // Refresh page to see changes
        }).fail(function(xhr) {
            alert('Error: ' + xhr.responseJSON.message);
        });
    });
</script>
