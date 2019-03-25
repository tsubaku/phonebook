@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Создание категории @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot

            <hr>
            <!-- Указываем именованный маршрут: запись в базу, функция store -->
            <form class="form-horizontal" action="{{route('admin.category.store')}}" method="post">
                <!-- Передать токен, для этого есть хелпер в блейде:-->
                {{ csrf_field() }}

                {{-- Form include--}}
                @include('admin.categories.partials.form')
            </form>

    </div>
@endsection
