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
            
            <form class="max-w-sm mx-auto space-y-3 md:space-y-5" action="{{ route('actionlogin') }}" method="post">
                @csrf
                <label for="login" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Or Username</label>
                <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                </span>
                <input type="text" name="login" id="login" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300
                 text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm p-2.5 
                  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-700
                   dark:focus:border-green-700" required="" placeholder="Email or Username">
                </div>


                {{-- <input type="email" name="email" id="email" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300
                text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm p-2.5 
                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-700
                  dark:focus:border-green-700" required="" placeholder="user@mail.com">
               </div> --}}

                
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path d="M14 7h-1.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm1.5-8h-5V4.5a2.5 2.5 0 0 1 5 0V7Z"/>
                          </svg>
                    </span>
                    <input type="password" name="password" id="password" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="input your password">
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{route('password.request')}}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Lupa password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
  
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Belum punya akun? <a href="/auth/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Daftar Akun</a>
                    </p>

            </form>
  
              {{-- <form class="space-y-4 md:space-y-6" action="{{ route('actionlogin') }}" method="post">
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
                      Belum punya akun? <a href="/auth/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Daftar Akun</a>
                  </p>
              </form> --}}

          </div>
      </div>
  </div>
</section>


</body>
</html>