@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') @lang('admin_number.phoneBook') @endslot
            @slot('parent') @lang('admin_number.mainDashboard') @endslot
            @slot('active') @lang('admin_number.contactList') @endslot
        @endcomponent
        <hr>

        <form class="form-horizontal" action="{{route('admin.number.store')}}" method="post">

            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.numbers.partials.form')
        </form>

    </div>
@endsection
