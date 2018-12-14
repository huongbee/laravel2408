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
    @if($errors->any())
        @foreach($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    @endif
    <form action="" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
        @if($errors->has('email'))
            {{-- <li>{{$errors->first('email')}}</li> --}}
            @foreach($errors->get('email') as $err)
                <li>{{$err}}</li>
            @endforeach
        @endif
        <br><br>
        <input type="text" name="fullname" placeholder="Full name" 
            value="{{old('fullname')}}">
        @if($errors->has('fullname'))
            {{-- <li>{{$errors->first('fullname')}}</li> --}}
            @foreach($errors->get('fullname') as $err)
                <li>{{$err}}</li>
            @endforeach
        @endif
        <br><br>
        <input type="text" name="age" placeholder="Age" value="{{old('age')}}">
        <br><br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <input type="password" name="confirm_password" placeholder="Confirm password">
        <br><br>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>