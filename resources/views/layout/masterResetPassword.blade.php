@extends('layout.master')
@section('konten')


<div class="max-w mx-auto p-6 bg-white rounded-lg shadow-md">
     <!-- Header -->
     <div class="mb-6">
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-200 dark:border-gray-200" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-black hover:text-green-700 dark:text-black dark:hover:text-green-700">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-black " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-green-700 md:ms-2 dark:text-black dark:hover:text-green-700">User Data</a>
                        </div>
                    </li>
            
                </ol>
            </nav>
        <br>
        <p class="text-2xl font-bold  text-gray-800"> {{ now()->locale('id')->translatedFormat('l, d F Y') }}</p>     
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif


  
    <!-- Profile Card -->
    <div class="bg-gradient-to-r from-blue-100 to-yellow-100 p-6 rounded-xl mb-6">
        <div class="flex items-center  mx-auto  space-x-4">
            <img class="w-20 h-20 rounded-full border-4 border-white shadow-md" src="/profile.png" alt="user photo">
  
            <div>
                <h3 class="text-2xl font-bold text-gray-900">{{Auth::user()->username}}</h3>
            </div>
      
        </div>
    </div>
  
    <!-- Form Grid -->
    <div class="bg-white dark:bg-white relative shadow-md sm:rounded-lg overflow-hidden">
         
        <form class="p-4 md:p-5" action="{{ route('ResetPassword') }}" method="POST" >
            {{ csrf_field() }}
              <div class="grid gap-6 mb-6 md:grid-cols-2">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Email</label>
                      <input type="email" name="email" id="email" class="bg-white border border-white text-gray-900 text-sm rounded-lg
                       focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                       dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-400 dark:focus:border-green-400" placeholder="name@company.com" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">New Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                       focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                        dark:text-white dark:focus:ring-green-400 dark:focus:border-green-400" required="">
                  </div>
                  <div>
                      <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Confirm password</label>
                      <input type="confirm-password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 
                      text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                       dark:text-white dark:focus:ring-green-400 dark:focus:border-green-4000" required="">
                  </div>
                  
                
              </div>
              <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                  <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                  Update Password
              </button>
          </form>
        
    </div>
    

@endsection