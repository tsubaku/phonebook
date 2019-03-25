@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        <!-- Указываем путь до шаблона -->
    @component('admin.components.breadcrumb')
        <!-- slot - объявление значения переменных -->
            @slot('title') Список категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot
        @endcomponent

        <hr>
        <!-- Список категорий -->
        <!--Именованный маршрут -->
        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Создать категорию</a>

        <!-- Таблица для списока категорий -->
        <table class="table table-stripted">
            <thead>
            <th>Наименование</th>
            <th>Статей</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->published}}</td>
                    <td class="float-right">
                        <form onsubmit="if (confirm('Удалить?')){ return true } else { return false }"
                              action="{{route('admin.category.destroy', $category)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">

                        {{ csrf_field() }}

                        <!-- Именованный маршрут с параметром (id категории) -->
                            <a class="btn btn-primary" href="{{route('admin.category.edit', $category)}}"><i
                                        class="fa fa-edit">Редакт.</i></a>

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash-o">Удал.</i>
                            </button>

                            <!-- Именованный маршрут с параметром (id категории) -->
                        <!--<a href="{{route('admin.category.edit', ['id'=>$category->id])}}"><i class="fa-edit">Редактировать</i></a>-->


                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$categories->links()}}
                    </ul>

                </td>
            </tr>
            </tfoot>
        </table>

    </div>
@endsection
