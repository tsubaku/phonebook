<h2>{{$title}}</h2>
<ol class="breadcrumb">
    {{-- Роут - именованный маршрут, формирующий ссылку на главную страницу сайта --}}
    <li><a href="{{route('admin.index')}}">{{$parent}}</a> </li>
    <li class="active">{{$active}}</li>

</ol>
