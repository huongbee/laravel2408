<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="text-align:center">
    <h2>Sign Up</h2>

    <form action="" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <br><br>
        <input type="text" name="fullname" placeholder="Full name">
        <br><br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <input type="password" name="confirm_password" placeholder="Confirm password">
        <br><br>
        <button>Sign Up</button>
    </form>
</body>
</html>