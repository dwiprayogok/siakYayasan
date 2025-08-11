<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Registrasi</title>
</head>
<body>
    <h1>Selamat Datang, {{ $user->name }}!</h1>
    <p>Registrasi Anda telah berhasil.</p>
    
    <p>Detail login akun Anda :</p>
    <ul>
        <li>Username: {{ $user->username }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Password: {{ $password }}</li> <!-- Only include if you want to show the plain password -->
    </ul>

    <p>Sekarang Anda bisa masuk menggunakan akun diatas.</p>

    <p>Terimakasih!</p>
</body>
</html>