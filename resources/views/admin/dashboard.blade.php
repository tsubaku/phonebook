@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        {{--
        <div class="row">
            <div class="col-sm-11">
                <div class="">
                    <p><span class="label label-primary">Total numbers: {{$count_numbers}}</span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">

                <a class="btn btn-block btn-primary" href="{{route('admin.number.create')}}">Add number</a>

                @foreach($numbers as $number)
                    <a class="list-group-item" href="{{route('admin.number.edit', $number)}}">
                        <h4 class="list-group-item-heading">{{$number->number}}|{{$number->name}}</h4>
                    </a>
                @endforeach

            </div>

        </div>
        --}}

    </div>
@endsection
