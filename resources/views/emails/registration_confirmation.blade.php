<!DOCTYPE html>
<html>
<head>
    <title>Registration Confirmation</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Your registration was successful.</p>
    
    <p>Here are your login details:</p>
    <ul>
        <li>Username: {{ $user->username }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Password: {{ $password }}</li> <!-- Only include if you want to show the plain password -->
    </ul>

    <p>You can now login to your account using the credentials above.</p>

    <p>Thank you!</p>
</body>
</html>