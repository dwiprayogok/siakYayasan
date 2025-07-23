<html>
<head>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

{{-- <div class="flex flex-col justify-center font-[sans-serif] sm:h-screen p-4"> --}}
    <div class="flex flex-col justify-center font-[sans-serif] mx-auto md:h-screen lg:py-60">
      <div class="max-w-md w-full mx-auto border dark:bg-green-700 dark:border-gray-900 rounded-2xl p-8">
        <div class="text-center">
                    <img src="\iconYapa.png" alt="logo" style="margin-left: 110px;border: 0; padding: 0; display: block; width:150px !important; height:150px !important"/>
                    <a href="#" class="flex items-center text-xl font-semibold text-black-900 dark:text-black">
                    Yayasan Pendidikan Islam Al-isti'aanah    
                </a>
        </div>
            @if(session('message'))
            <div class="alert alert-success text-white">
                {{session('message')}}
            </div>
            @endif
            <br>

            <form action="{{route('actionregister')}}" method="post">
            @csrf
            <div class="space-y-6">
                <div>
                <label class="text-white  text-m font-medium mb-2 block">Email</label>
                 <input name="email" type="text" class="bg-gray-50 border border-gray-300 text-black  rounded-lg
                         focus:ring-white focus:border-white block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-black
                          dark:text-black dark:focus:ring-yellow-400 dark:focus:border-yellow-400" placeholder="Email">

                </div>
                <div>
                <label class="text-white text-m mb-2 block">Nama</label>
                <input name="name" type="text" class="bg-gray-50 border border-gray-300 text-black  rounded-lg
                         focus:ring-white focus:border-white block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-black
                          dark:text-black dark:focus:ring-yellow-400 dark:focus:border-yellow-400" placeholder="Nama" />
                </div>
                <div>
                <label class="text-white text-m mb-2 block">Username</label>
                <input name="username" type="text" class="bg-gray-50 border border-gray-300 text-black  rounded-lg
                         focus:ring-white focus:border-white block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-black
                          dark:text-black dark:focus:ring-yellow-400 dark:focus:border-yellow-400" placeholder="Username" />
                </div>
                <div>
                <label class="text-white text-m mb-2 block">Password</label>
                <input name="password" type="password" class="bg-gray-50 border border-gray-300 text-black  rounded-lg
                         focus:ring-white focus:border-white block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-black
                          dark:text-black dark:focus:ring-yellow-400 dark:focus:border-yellow-400" placeholder="Enter password" />
                </div>
                <div>
                <label  class="text-white text-m mb-2 block">Pilih Role</label>
                <select id="role"  name="role" class="bg-gray-50 border border-gray-300 text-black  rounded-lg
                         focus:ring-white focus:border-white block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-black
                          dark:text-black dark:focus:ring-yellow-400 dark:focus:border-yellow-400">
                <option value="">-- Select Role --</option>
                <option value="admin">Admin</option>
                <option value="siswa">Siswa</option>
                <option value="guru">Guru</option>
                </select>
                </div>

                <div>
                    <label  id="labelNISN" style="display: none;"  class="text-white text-m mb-2 block">NISN</label>
                    <input  id="nis" name="nis" type="text" style="display: none;  margin-top: 10px;" class="bg-gray-50 border border-gray-300 text-black  rounded-lg
                         focus:ring-white focus:border-white block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-black
                          dark:text-black dark:focus:ring-yellow-400 dark:focus:border-yellow-400" placeholder="No Induk Siswa" />
                </div>

                <div>
                    <label  id="labelNIP" style="display: none;"  class="text-white text-m mb-2 block">NIP</label>
                    <input  id="nip" name="nip" type="text" style="display: none;  margin-top: 10px;"class="bg-gray-50 border border-gray-300 text-black  rounded-lg
                         focus:ring-white focus:border-white block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-black
                          dark:text-black dark:focus:ring-yellow-400 dark:focus:border-yellow-400" placeholder="NIP" />
                </div>

            <div class="!mt-8"> 
             <button type="submit" class="w-full text-black bg-yellow hover:bg-yellow-400 focus:ring-4 
                    focus:outline-none focus:ring-black font-medium rounded-lg text-m px-5 py-2.5 text-center dark:bg-yellow-400
                     dark:hover:bg-yellow-600 dark:focus:ring-yellow-400">Buat Akun</button>


            </div>
            <p class="text-white text-m mt-6 text-left">Sudah punya akun? <a href="/" class="text-black font-semibold hover:underline ml-1">Login Disini</a></p>
            </form>
      </div>
    </div>

    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('role');
        const labelNIP = document.getElementById('labelNIP');
        const labelNISN = document.getElementById('labelNISN');
        const nisnInput = document.getElementById('nis');
        const nipInput = document.getElementById('nip');

        select.addEventListener('change', function () {
            const role = this.value;

            // Hide both first
            nisnInput.style.display = 'none';
            nipInput.style.display = 'none';
            labelNISN.style.display = 'none';
            labelNIP.style.display = 'none';

            if (role === 'siswa') {
                nisnInput.style.display = 'block';
                labelNISN.style.display = 'block';
            } else if (role === 'guru') {
                nipInput.style.display = 'block';
                labelNIP.style.display = 'block';
            } 
        });
    });

</script>


</body>
</html>
