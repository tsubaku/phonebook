<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">

            {{-- Contact sheet --}}
            <table class="table table-striped">
                <thead>
                <th>Number</th>
                <th>Contact name</th>
                </thead>
                <tbody>
                @forelse($numbers as $number)
                    <tr>
                        <td>{{$number->number}}</td>
                        <td>{{$number->name}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center"><h2>Contact sheet is empty</h2></td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3">
                        <ul class="pagination pull-right">
                            {{$numbers->links()}}
                        </ul>

                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</body>
</html>
