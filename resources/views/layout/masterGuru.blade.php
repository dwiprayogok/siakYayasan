
<!DOCTYPE html>
<html lang="en"  class="h-full">
<head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Siak</title>
</head>
<body class="flex flex-col min-h-screen">


      <header 
      x-data="{ scrolled: false }" 
      @scroll.window="scrolled = window.scrollY > 10"
      :class="{'py-2 shadow-lg': scrolled, 'py-4': !scrolled}"
      class="sticky top-0 z-50 bg-white w-full  transition-all duration-300"
      >

      <nav class="bg-gray-400 border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between mx-auto p-4">
                  <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                  <img  src="\iconYapa.png" alt="logo" style="margin: 0; border: 0; padding: 0; display: block; width:100px !important; height:100px !important" class="h-8" alt="YAPA Logo" />
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SMP YAPA 1</span>
                  </a>
                  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                  <button type="button" class="flex text-sm bg-gray-400 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="/profile.png" alt="user photo">
                  </button>
                  <!-- Dropdown menu -->
                  <div class="z-50 hidden my-4 text-base list-none bg-gray-200 divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                  <div class="px-4 py-3">
                  <span class="block text-sm text-gray-400 dark:text-white"><a>{{Auth::user()->name}}</a></span>
                  <span class="block text-sm  text-gray-400 truncate dark:text-gray-400"><a>{{Auth::user()->email}}</a></span>
                  </div>
                  <ul class="py-2" aria-labelledby="user-menu-button">
                  <li>
                  <a href="{{route('actionlogout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                  </li>
                  </ul>
                  </div>
                  <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                  </svg>
                  </button>
                  </div>
                  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                  <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-400 rounded-lg bg-gray-400 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-gray-00 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                  <li>
                  <a href="\guru\dashboard" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-200 md:hover:bg-transparent md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                  </li>
                  <li>
                  <a href="\guru\profileguru" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-200 md:hover:bg-transparent md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Profile</a>
                  </li>
                  <li>
                  <a href="\guru\inputnilai" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-200 md:hover:bg-transparent md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Input Nilai</a>
                  </li>
                  <li>
                  <a href="\guru\jadwalajar" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-200 md:hover:bg-transparent md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Jadwal Ajar</a>
                  </li>
                  </ul>
                  </div>
            </div>
      </nav>  
      
      </header>
      <main class="flex-1">
            
          @yield('konten')
    
      </main>
      
 
         <!-- Footer -->
    <footer class="bg-gray-900 text-white text-sm py-4 text-center">
      <div style="width: 100%;
      position: fixed;
      bottom: 0;
      padding-top: 30px;" >
          @extends('layout.footer')
    </div>

  </footer>

</body>
</html>