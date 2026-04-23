@extends('layouts.app')

@section('content')
<h2>Edit Service</h2>

<form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')    

    <input class="form-control mb-2" name="name" value="{{ $service->name }}">
    <input class="form-control mb-2" name="mrp_price" value="{{ $service->mrp_price }}">
    <input class="form-control mb-2" name="selling_price" value="{{ $service->selling_price }}">
    <input class="form-control mb-2" name="offer_price" value="{{ $service->offer_price }}">
    <textarea class="form-control mb-2" name="description">{{ $service->description }}</textarea>
    @if ($service->image)
        <img src="{{ asset('storage/'.$service->image) }}" width="80">
    @endif
    <input class="form-control mb-2" type="file" name="image">
    <button class="btn btn-primary">Update</button>
</form>
@endsection