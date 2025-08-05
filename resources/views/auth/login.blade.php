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
      <div class="w-full bg-white rounded-xl shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-green-700 dark:border-gray-900">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

            @if($errors->has('login'))
            <div class="alert alert-danger text-black">
            <b>Opps!</b> {{ $errors->first('login') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger text-black">
            <b>Opps!</b> {{ session('error') }}
            </div>
            @endif

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-black">
            {{ session('status') }}
            </div>
            @endif


            
            <form class="max-w-sm mx-auto space-y-3 md:space-y-5" action="{{ route('actionlogin') }}" method="post">
                @csrf
                <label for="login" class="block mb-2 text-sm font-medium text-white dark:text-white">Email Or Username</label>
                <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-white bg-white border border-e-0 border-black rounded-s-md dark:bg-white dark:text-black dark:border-black">
                    <svg class="w-4 h-4 text-black dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg>
                </span>
                <input type="text" name="login" id="login" class="rounded-none rounded-e-lg bg-white border border-black
                 text-black focus:ring-black focus:border-black block flex-1 min-w-0 w-full text-sm p-2.5 
                  dark:bg-white dark:border-black dark:placeholder-black dark:text-black dark:focus:ring-yellow-400 dark:focus:border-yellow-400" required="" placeholder="Email or Username">
                </div>

                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-white border border-e-0 border-black rounded-s-md dark:bg-white dark:text-black dark:border-black">
                        <svg class="w-4 h-4 text-black dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path d="M14 7h-1.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm1.5-8h-5V4.5a2.5 2.5 0 0 1 5 0V7Z"/>
                          </svg>
                    </span>
                    <input type="password" name="password" id="password" class="rounded-none rounded-e-lg bg-white border border-black
                 text-black focus:ring-black focus:border-black block flex-1 min-w-0 w-full text-sm p-2.5 
                  dark:bg-white dark:border-black dark:placeholder-black dark:text-black dark:focus:ring-yellow-400 dark:focus:border-yellow-400" placeholder="input your password">
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{route('password.request')}}" class="text-sm font-medium text-primary-600 hover:underline dark:text-white">Lupa password?</a>
                    </div>
                    <button type="submit" class="w-full text-black bg-yellow hover:bg-yellow-400 focus:ring-4 
                    focus:outline-none focus:ring-black font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-400
                     dark:hover:bg-yellow-600 dark:focus:ring-yellow-400">Sign in</button>

                    <p class="text-sm font-light text-white dark:text-white">
                        Belum punya akun? <a href="/auth/register" class="font-medium text-black hover:underline dark:text-black">Daftar Akun</a>
                    </p>

            </form>

          </div>
      </div>
  </div>
</section>


</body>
</html>