@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        {{-- breadcrumb --}}
        @component('admin.components.breadcrumb')
            @slot('title') @lang('admin_number.phoneBook') @endslot
            @slot('parent') @lang('admin_number.mainDashboard') @endslot
            @slot('active') @lang('admin_number.contactList') @endslot
        @endcomponent
        <hr>

        <div class="row">
            <div class="col-sm-11">
                <div class="">
                    <p>
                        <span class="label label-primary">@lang('admin_number.totalNumbers')
                            <span id="amountNumbers">{{$amount_numbers}}</span>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <hr>

        <a href="{{route('admin.number.create')}}" class="btn btn-primary float-right">@lang('admin_number.addContact')</a>

        <form id="searchForm" name="searchForm" method="post">
            <p>@lang('admin_number.search')</p>
            <input type="text" name="contactNumber" id="contactNumber" placeholder="@lang('admin_number.searchNumber')"
                   onkeyup="search2(this.id);"/>
            <input type="text" name="contactName" id="contactName" placeholder="@lang('admin_number.searchName')"
                   onkeyup="search2(this.id);"/>
            {{ csrf_field() }}
        </form>

        {{-- Contact sheet --}}
        <table class="table table-striped">
            <thead>
            <th>@lang('admin_number.number')</th>
            <th>@lang('admin_number.contactName')</th>
            <th class="text-right">@lang('admin_number.action')</th>
            </thead>
            <tbody id="contactListTbody">
            @forelse($numbers as $number)
                <tr class="contactLine">
                    <td class="tdNumber">{{$number->number}}</td>
                    <td class="tdName">{{$number->name}}</td>
                    <td class="tdAction float-right">
                        <form onsubmit="if (confirm('Удалить?')){ return true } else { return false }"
                              action="{{route('admin.number.destroy', $number)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">

                            {{ csrf_field() }}

                            <a class="btn btn-primary" href="{{route('admin.number.edit', $number)}}"><i
                                        class="fa fa-edit"> @lang('admin_number.edit')</i></a>

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash-o"> @lang('admin_number.delete')</i>
                            </button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>@lang('admin_number.empty')</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
@endsection
