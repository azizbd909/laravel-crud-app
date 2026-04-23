@extends('layouts.app')

@section('content')
<h2>Create Service</h2>

<form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<input class="form-control mb-5" name="name" placeholder="Name">
<input class="form-control mb-2" name="mrp_price" placeholder="MRP Price">
<input class="form-control mb-2" name="selling_price" placeholder="Selling Price">
<input class="form-control mb-2" name="offer_price" placeholder="Offer Price">
<textarea class="form-control mb-2" name="description"></textarea>
<input type="file" class="form-control mb-2" name="image">

<button class="btn btn-success">Submit</button>
</form>
@endsection