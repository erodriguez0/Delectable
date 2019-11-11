<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
@yield('body-container')

    {{-- Fixed top navbar --}}
    @yield('navbar')

    {{-- Main content --}}
    <main>
        <div class="container-fluid">

            {{-- Sidebar for admins and restaurants --}}
            @hasSection ('sidenav')
                @yield('sidenav')
            @endif

            {{-- Content based on user --}}
            @yield('content')

        </div>
    </main>

    {{-- Footer for customers --}}
    @hasSection ('footer')
        @yield('footer')
    @endif
    
</div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>