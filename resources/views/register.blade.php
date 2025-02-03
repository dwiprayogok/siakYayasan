<!-- {{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">FORM REGISTER USER</h3>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actionregister')}}" method="post">
            @csrf
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <a href="/">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>
</html> --}} -->


<html>
<head>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

<div class="flex flex-col justify-center font-[sans-serif] sm:h-screen p-4">
      <div class="max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-8">
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
                <label class="text-gray-800 text-sm mb-2 block">Email</label>
                <input name="email" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="email" />
                </div>
                <div>
                <label class="text-gray-800 text-sm mb-2 block">Name</label>
                <input name="name" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Name" />
                </div>
                <div>
                <label class="text-gray-800 text-sm mb-2 block">Username</label>
                <input name="username" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Username" />
                </div>
                <div>
                <label class="text-gray-800 text-sm mb-2 block">Password</label>
                <input name="password" type="password" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter password" />
                </div>
                <div>
                <!-- <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> -->
                <label  class="text-gray-800 text-sm mb-2 block">Pilih Role</label>
                <select id="role" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500">
                <option value="US">Admin</option>
                <option value="CA">Siswa</option>
                <option value="FR">Guru</option>
                </select>


                </div>

            <div class="!mt-8">
                <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Buat Akun</button>

            </div>
            <p class="text-gray-800 text-sm mt-6 text-center">Sudah punya akun? <a href="/" class="text-green-600 font-semibold hover:underline ml-1">Login Disini</a></p>
            </form>
      </div>
    </div>

</body>
</html>