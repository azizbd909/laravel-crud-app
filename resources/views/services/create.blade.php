@extends('layouts.app')

@section('content')
<h2>Create Service</h2>

<form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
@csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<input class="form-control mb-5" name="name" placeholder="Name" value="{{ old('name') }}">
<input class="form-control mb-2" name="mrp_price" placeholder="MRP Price" value="{{ old('mrp_price') }}">
<input class="form-control mb-2" name="selling_price" placeholder="Selling Price" value="{{ old('selling_price') }}">
<input class="form-control mb-2" name="offer_price" placeholder="Offer Price" value="{{ old('offer_price') }}">
<textarea class="form-control mb-2" name="description">{{ old('description') }}</textarea>
<input type="file" class="form-control mb-2" name="image">

<button class="btn btn-success">Submit</button>
</form>
@endsection