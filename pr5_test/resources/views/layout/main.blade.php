<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Lab5')</title> </head>
<body>
    <nav>
        @foreach($menu as $item) <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
        @endforeach
    </nav>

    <hr>
    <div>
        IP: {{ $client_ip }} | @if($first_in_15_minutes) Вперше за 15 хв! @endif </div>

    @yield('content')
</body>
</html>