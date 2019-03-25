{{-- Form for creating and/or updating contact --}}
<div class="row">
    <div class="col-md-6 col-sm-8 col-xs-12">

        <label for="number">Number</label>

        <input type="text" class="form-control" name="number" placeholder="Number"
               value="{{$number->number ?? ""}}" required>

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name"
               value="{{$number->name ?? ""}}" required>

        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug" placeholder="Automatic generation"
               value="{{$number->slug ?? ""}}" readonly>

        <hr>

        <input class="btn btn-primary" type="submit" value="Save">
    </div>
</div>