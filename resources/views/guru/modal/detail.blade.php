<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Main modal -->
<div id="detailModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail User
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
                        <label for="detailName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="detailName" class="bg-gray-50 border border-gray-300
                         text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                          dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500
                           dark:focus:border-primary-500" placeholder="Name" required="" readonly>
                    </div>
                    <div class="col-span-2">
                      <label for="detailUsername" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                      <input type="text" name="username" id="detailUsername" class="bg-gray-50 border border-gray-300
                       text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                        dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500
                         dark:focus:border-primary-500" placeholder="Username" required="" readonly>
                  </div>
                  <div class="col-span-2">
                      <label for="detailEmail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                      <input type="email" name="email" id="detailEmail" class="bg-gray-50 border border-gray-300
                       text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                        dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500
                        dark:focus:border-primary-500" placeholder="Email" required="" readonly>
                    </div>
                    <div class="col-span-2">
                        <label for="detailRole" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <input type="role" name="role" id="detailRole" class="bg-gray-50 border border-gray-300
                        text-gray-900 text-sm rounded-lg focus:ring-primary-800 focus:border-primary-800 block w-full p-2.5
                         dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-800
                          dark:focus:border-primary-800" placeholder="Role" required="" readonly>
                      </div> 
                      <div class="col-span-2">
                        <label for="detailStatus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <input type="status" name="status" id="detailStatus" class="bg-gray-50 border border-gray-300
                        text-gray-900 text-sm rounded-lg focus:ring-primary-800 focus:border-primary-800 block w-full p-2.5
                         dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-800
                          dark:focus:border-primary-800" placeholder="Aktik / Tidak Aktif" required="" readonly>
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
            url: `/users/${userid}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
                // //fill data to form
                $('#detailName').val(response.name);
                $('#detailUsername').val(response.username);
                $('#detailEmail').val(response.email);

                if (response.role  == '') {
                    $('#detailRole').val('--');
                } else {
                    $('#detailRole').val(response.role);
                }
                

                if (response.active == 1) {
                    $('#detailStatus').val('Aktif');
                } else if (response.active == 0) {
                    $('#detailStatus').val('Tidak Aktif');
                } else {
                    $('#detailStatus').val('-');
                }
                

            }
        });
    });

</script>


