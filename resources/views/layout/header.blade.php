<header>
    <h2>Header</h2>
    <div>
        {{-- {{dd($menu)}} --}}
        @foreach($menu as $m)
            <li>{{$m}}</li>
        @endforeach
    </div>
</header>