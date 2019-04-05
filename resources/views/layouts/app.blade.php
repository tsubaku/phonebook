<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Phone book</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Scripts --}}
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

</head>
<body>
<div class="container-fluid">
    <div class="py-5 position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/admin/number') }}">@lang('layouts_app.mainDashboard')</a>
                @else
                    <a href="{{ route('login') }}">@lang('layouts_app.login')</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">@lang('layouts_app.register')</a>
                    @endif
                @endauth
            </div>
        @endif


        <main class="py-4 content flex-center">
            @yield('content')
        </main>


    </div>
</div>
</body>
</html>
