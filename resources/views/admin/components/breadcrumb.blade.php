<h2>{{$title}}</h2>
<ol class="breadcrumb">
    {{-- Link to main page --}}
    <li><a href="{{route('admin.index')}}">{{$parent}}</a> </li>
    <li class="active">{{$active}}</li>

</ol>
