{{-- Form for creating and/or updating contact --}}
<div class="row">
    <div class="col-md-6 col-sm-8 col-xs-12">

        <div class="form-group">
            <label for="number">@lang('admin_number.number')</label>
            <input type="text" class="form-control" name="number" placeholder="@lang('admin_number.number')"
                   value="{{$number->number ?? ""}}">
        </div>

        <div class="form-group">
            <label for="name">@lang('admin_number.name')</label>

            <input type="text" class="form-control" name="name" placeholder="@lang('admin_number.name')"
                   value="{{$number->name ?? ""}}">
        </div>

        @if (count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <input class="btn btn-primary" type="submit" value="@lang('admin_number.save')">
    </div>
</div>