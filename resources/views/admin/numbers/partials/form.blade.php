{{-- Form for creating and/or updating contact --}}
<div class="row">
    <div class="col-md-6 col-sm-8 col-xs-12">

        <div class="form-group">
            <label for="number">Number</label>
            <input type="text" class="form-control" name="number" placeholder="Number"
                   value="{{$number->number ?? ""}}">
        </div>

        <div class="form-group">
            <label for="name">Name</label>

            <input type="text" class="form-control" name="name" placeholder="Name"
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

        <input class="btn btn-primary" type="submit" value="Save">
    </div>
</div>