@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="label label-primary">Total numbers: {{$count_numbers}}</span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">

                <a class="btn btn-block btn-primary" href="">Add number</a>

                @foreach($numbers as $number)
                    <a class="list-group-item" href="{{route('admin.number.edit', $number)}}">
                        <h4 class="list-group-item-heading">{{$number->name}}</h4>
                    </a>
                @endforeach

            </div>

        </div>

    </div>
@endsection
