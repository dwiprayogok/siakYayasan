<html>
<head>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

<section class="bg-white dark:bg-white">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
  <img src="\iconYapa.png" alt="logo" style="margin: 0; border: 0; padding: 0; display: block; width:150px !important; height:150px !important"/>
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-black-900 dark:text-black">
          Yayasan Pendidikan Islam Al-isti'aanah    
      </a>
      <div class="w-full bg-white rounded-xl shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            @if(session('error'))
            <div class="alert alert-danger text-white">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
              <form class="space-y-4 md:space-y-6" action="{{ route('admin.loginAdmin') }}" method="POST">
              @csrf
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg
                       focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-white dark:focus:border-green-700" 
                       required="" placeholder="user@mail.com">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg
                       focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                       dark:text-white dark:focus:ring-white dark:focus:border-green-700" 
                      required="">
                  </div>
                  <div class="flex items-center justify-between">
                      <a href="{{route('password.request')}}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Lupa password?</a>
                  </div>
                  <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>

                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Belum punya akun? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Daftar Akun</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>


</body>
</html>