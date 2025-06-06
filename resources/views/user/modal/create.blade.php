<!-- Main modal -->
  <div id="createModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Create New User
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createModal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form class="p-4 md:p-5" action="{{ route('users.store') }}" method="POST" >
                {{ csrf_field() }}
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                          <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required="">
                      </div>
                      <div class="col-span-2">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Username" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                      </div>
                      <div class="col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Password" required="">
                      </div>
                    <div class="col-span-2">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">role</label>
                        <select id="role"  name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih role</option>
                            <option value="admin">Admin</option>
                            <option value="siswa">Siswa</option>
                            <option value="guru">Guru</option>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="active"  name="active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih status</option>
                            <option value=0>Tidak aktif</option>
                            <option value=1>Aktif</option>
                        </select>
                    </div>

                    <div class="col-span-2" > 
                        <label  id="labelNIP" style="display: none;"  class="text-white text-sm mb-2 block">NIP</label>
                        <input  id="nip" name="nip" type="text" style="display: none;  margin-top: 10px;" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg
                               focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-white dark:focus:border-green-700" placeholder="NIP" />
                    </div>

                    <div  class="col-span-2">
                        <label  id="labelNISN" style="display: none;"  class="text-white text-sm mb-2 block">NISN</label>
                        <input  id="nis" name="nis" type="text" style="display: none;  margin-top: 10px;" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg
                               focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-white dark:focus:border-green-700" placeholder="No Induk Siswa" />
                    </div>


                    <div   class="col-span-2" >
                        <label for="labelclass" id="labelclass" style="display: none;" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <select style="display: none;"  id="kode_kelas"  name="kode_kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Kelas</option>
                             @foreach ($kelass as $kelas)
                            <option value="{{ $kelas->kode_kelas }}" {{ request('kelas') == $kelas->kode_kelas ? 'selected' : '' }}>
                                {{ $kelas->nama }}
                            </option>
                        @endforeach
                        </select>
                    </div> 

                  

                   
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Add new User
                  </button>
              </form>
          </div>
      </div>
  </div> 
  

  
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('role');
        const labelNIP = document.getElementById('labelNIP');
        const labelNISN = document.getElementById('labelNISN');

        const labelclass = document.getElementById('labelclass');

        const class_idInput = document.getElementById('kode_kelas');

        const nisnInput = document.getElementById('nis');
        const nipInput = document.getElementById('nip');

        select.addEventListener('change', function () {
            const role = this.value;

            // Hide both first
            nisnInput.style.display = 'none';
            nipInput.style.display = 'none';
            class_idInput.style.display = 'none';

            labelNISN.style.display = 'none';
            labelNIP.style.display = 'none';
            labelclass.style.display = 'none';

            if (role === 'siswa') {
                nisnInput.style.display = 'block';
                labelNISN.style.display = 'block';
                labelclass.style.display = 'block';
                class_idInput.style.display = 'block';

                nipInput.style.display = 'none';
                labelNIP.style.display = 'none';

            } else if (role === 'guru') {
                nipInput.style.display = 'block';
                labelNIP.style.display = 'block';


                nisnInput.style.display = 'none';
                labelNISN.style.display = 'none';
                labelclass.style.display = 'none';
                class_idInput.style.display = 'none';

                
            } 
        });
    });


 
</script>