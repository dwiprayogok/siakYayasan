<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Main modal -->
<div id="detailSiswaModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail Data Siswa
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="detailSiswaModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div >
                        <label for="detailid_sudent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Siswa</label>
                        <input type="text" name="detailid_sudent" id="detailid_sudent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled placeholder="ID Siswa" required="">
                    </div>

                    <div >
                        <label for="detailnis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                        <input type="text" name="detailnis" id="detailnis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled placeholder="nis" required="">
                      </div>

                    <div class="col-span-2">
                        <label for="detailname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="detailname" id="detailname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled placeholder="Name" required="">
                    </div>

                    <div >
                        <label for="detailgender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                        <select id="detailgender" disabled name="detailgender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Jenis Kelamin</option>
                            <option value="Male">Laki - Laki</option>
                            <option value="Female">Perempuan</option>
                        </select>
                    </div>   

                    <div >
                        <label for="detailclass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <input type="text" name="detailclass" id="detailclass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled placeholder="Kelas" required="">
                    </div>


                    <div class="col-span-2">
                            
                    <label for="detailaddress" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea id="detailaddress" name="detailaddress" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled placeholder="Tulis alamat mu disini..."></textarea>

                    </div>

                    <div >
                        <label for="detailborn_place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir </label>
                        <input type="text" name="detailborn_place" id="detailborn_place" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled placeholder="Tempat Lahir" required="">
                    </div>
                   
                  <div >
                      <label for="detailbirth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                      <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input id="detailbirth_date" name="detailbirth_date"  datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled placeholder="Pilih Tanggal">
                      </div>
                    </div>

                    
                    <div class="col-span-2">
                        <label for="detailphone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepone</label>
                        <input type="number" name="detailphone" id="detailphone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled maxlength="12"  placeholder="No Telephone" required="">
                    </div>

                    <div class="col-span-2">
                        <label for="detailname_of_parent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orang Tua</label>
                        <input type="text" name="detailname_of_parent" id="detailname_of_parent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled placeholder="Nama Orangtua" required="">
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
            url: `/siswas/${userid}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
         
                // //fill data to form
                $('#detailid_sudent').val(response.id_student);
                $('#detailnis').val(response.nis);
                $('#detailname').val(response.name);
                $('#detailaddress').val(response.address);
                $('#detailclass').val(response.class);
                $('#detailgender').val(response.gender);
                $('#detailphone').val(response.phone);
                $('#detailborn_place').val(response.born_place);
                $('#detailbirth_date').val(response.birth_date);
                $('#detailname_of_parent').val(response.name_of_parent);


            }
        });
    });

</script>


