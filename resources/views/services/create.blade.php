@extends('layouts.app')

@section('content')
<h2>Create Service</h2>

<form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<input class="form-control mb-2" name="name" placeholder="Name">
<input class="form-control mb-2" name="price" placeholder="Price">
<textarea class="form-control mb-2" name="description"></textarea>
<input type="file" class="form-control mb-2" name="image">

<button class="btn btn-success">Submit</button>
</form>
@endsection