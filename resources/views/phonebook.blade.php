@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <p>
                <span class="label label-primary">@lang('phonebook.total')
                    <span id="amountNumbers">{{$amount_numbers}}</span>
                </span>
            </p>

            <form id="searchForm" name="searchForm" method="post">
                <p>@lang('phonebook.search')</p>
                <input type="text" name="contactNumber" id="contactNumber"
                       placeholder="@lang('phonebook.searchNumber')" onkeyup="search(this.id);"/>
                <input type="text" name="contactName" id="contactName"
                       placeholder="@lang('phonebook.searchName')" onkeyup="search(this.id);"/>
                {{ csrf_field() }}
            </form>

            {{-- Contact list --}}
            <table class="table table-striped">
                <thead>
                <th>@lang('phonebook.number')</th>
                <th>@lang('phonebook.contactName')</th>
                </thead>
                <tbody id="contactListTbody">
                @forelse($numbers as $number)
                    <tr>
                        <td>{{$number->number}}</td>
                        <td>{{$number->name}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center"><h2>@lang('phonebook.empty')</h2></td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>

@endsection

