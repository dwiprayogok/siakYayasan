<html>
<head>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

<div class="flex flex-col justify-center font-[sans-serif] sm:h-screen p-4">
      <div class="max-w-md w-full mx-auto border dark:bg-gray-800 dark:border-gray-700 rounded-2xl p-8">
        <div class="text-center">
                    <img src="\iconYapa.png" alt="logo" style="margin-left: 110px;border: 0; padding: 0; display: block; width:150px !important; height:150px !important"/>
                    <a href="#" class="flex items-center text-2xl font-semibold text-gray-900 dark:text-white">
                    Yayasan Pendidikan Islam Al-isti'aanah    
                </a>
        </div>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actionregister')}}" method="post">
            @csrf
            <div class="space-y-6">
                <div>
                <label class="text-white  text-sm mb-2 block">Email</label>
                <input name="email" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg
                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                 dark:text-white dark:focus:ring-white dark:focus:border-green-700" placeholder="email" />
                </div>
                <div>
                <label class="text-white text-sm mb-2 block">Name</label>
                <input name="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg
                       focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-white dark:focus:border-green-700" placeholder="Name" />
                </div>
                <div>
                <label class="text-white text-sm mb-2 block">Username</label>
                <input name="username" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg
                       focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-white dark:focus:border-green-700" placeholder="Username" />
                </div>
                <div>
                <label class="text-white text-sm mb-2 block">Password</label>
                <input name="password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg
                       focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-white dark:focus:border-green-700" placeholder="Enter password" />
                </div>
                <div>
                <label  class="text-white text-sm mb-2 block">Pilih Role</label>
                <select id="role"  name="role" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg
                       focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-white dark:focus:border-green-700">
                <option value="siswa">Siswa</option>
                <option value="guru">Guru</option>
                </select>
                </div>

            <div class="!mt-8">
                <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Buat Akun</button>

            </div>
            <p class="text-white text-sm mt-6 text-left">Sudah punya akun? <a href="/" class="text-green-600 font-semibold hover:underline ml-1">Login Disini</a></p>
            </form>
      </div>
    </div>

</body>
</html>