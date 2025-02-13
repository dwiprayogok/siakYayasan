<html>
<head>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

    <section class="bg-white dark:bg-white">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-black">
                <img src="\iconYapa.png" alt="logo" style="margin: 0; border: 0; padding: 0; display: block; width:150px !important; height:150px !important"/>
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-black-900 dark:text-black">
                    Yayasan Pendidikan Islam Al-isti'aanah    
                </a>
                    
            </a>
            <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ( $errors->all() as $errors )
                        <li>{{ $errors }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif

                <h1 class="mb-1 text-l font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Forgot your password?
                </h1>
                {{-- <p class="font-light text-gray-500 dark:text-gray-400">Don't fret! Just type in your email and we will send you a code to reset your password!</p> --}}
                {{-- <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{route('password.email')}}" method="POST">
                    @csrf --}}
                    <form method="POST" action="{{ route('password.email') }}" class="mt-4 space-y-4 lg:mt-5 md:space-y-5">
                        @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan email Anda</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                         focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300
                     font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Reset password</button>
                </form>
            </div>
        </div>
      </section>


</body>
</html>