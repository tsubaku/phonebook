@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Edit contact @endslot
            @slot('parent') Main @endslot
            @slot('active') Contact list @endslot
        @endcomponent
        <hr>

        <form class="form-horizontal" action="{{route('admin.number.store')}}" method="post">

            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.numbers.partials.form')
        </form>

    </div>
@endsection
