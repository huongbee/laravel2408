<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Home Page</h2>
    <p><?=$idUser?></p>
    <p><?=$username?></p>
    <p>{{$idUser}}</p>
    <p>{{$fullname}}</p>
    <p><?=$fullname?></p>
    <p>{!!$fullname!!}</p>
    {{-- 234567 --}}
    {{--  --}}
    {{-- @for($i=1; $i<=10; $i++)
        @if($i%2==0)
            <p>{{$i}}</p>
        @else
            <u>{{$i}}</u>
        @endif
    @endfor --}}


    <form action="/foo/bar" method="POST">
        @method('PUT')
        <input type="text">
    </form>

</body>
</html>