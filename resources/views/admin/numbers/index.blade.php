@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        {{-- breadcrumb --}}
        @component('admin.components.breadcrumb')
            @slot('title') Phone book @endslot
            @slot('parent') Main @endslot
            @slot('active') Contact list @endslot
        @endcomponent

        <hr>

        <div class="row">
            <div class="col-sm-11">
                <div class="">
                    <p><span class="label label-primary">Total numbers: {{$count_numbers}}</span></p>
                </div>
            </div>
        </div>

        <a href="{{route('admin.number.create')}}" class="btn btn-primary">Add contact</a>

        {{-- Contact sheet --}}
        <table class="table table-stripted">
            <thead>
            <th>Number</th>
            <th>Contact name</th>
            <th class="text-right">Action</th>
            </thead>
            <tbody>
            @forelse($numbers as $number)
                <tr>
                    <td>{{$number->number}}</td>
                    <td>{{$number->name}}</td>
                    <td class="float-right">
                        <form onsubmit="if (confirm('Удалить?')){ return true } else { return false }"
                              action="{{route('admin.number.destroy', $number)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">

                            {{ csrf_field() }}

                            <a class="btn btn-primary" href="{{route('admin.number.edit', $number)}}"><i
                                        class="fa fa-edit"> Edit</i></a>

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash-o"> Delete</i>
                            </button>

                        </form>
                    </td>
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
@endsection
