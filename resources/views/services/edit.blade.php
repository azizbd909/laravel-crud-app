@extends('layouts.app')

@section('content')
<h2>Edit Service</h2>

{{-- Error Summary --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')    

    {{-- Name --}}
    <div class="form-group">
        <label for="name">Name</label>
        <input
            class="form-control mb-2 @error('name') is-invalid @enderror" 
            name="name" 
            id="name"
            value="{{ old('name', $service->name) }}"
            placeholder="Name"
        >
        @error('name')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror
    </div>
    {{-- MRP Price --}}
    <div class="form-group">
        <label for="mrp_price">MRP Price</label>
        <input
            class="form-control mb-2 @error('mrp_price') is-invalid @enderror" 
            name="mrp_price" 
            id="mrp_price"
            value="{{ old('mrp_price', $service->mrp_price) }}"
            placeholder="MRP Price"
        >
        @error('mrp_price')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror
    </div>    
    {{-- Selling Price --}}
    <div class="form-group">
        <label for="selling_price">Selling Price</label>
        <input 
            class="form-control mb-2 @error('selling_price') is-invalid @enderror" 
            name="selling_price" 
            id="selling_price"
            value="{{ old('selling_price', $service->selling_price) }}"
            placeholder="Selling Price"
        >
        @error('selling_price')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror
    </div>   

    {{-- Offer Price --}}
    <div class="form-group">
        <label for="offer_price">Offer Price</label>
        <input 
            class="form-control mb-2 @error('offer_price') is-invalid @enderror" 
            name="offer_price" 
            id="offer_price"
            value="{{ old('offer_price', $service->offer_price) }}"
            placeholder="Offer Price"
        >
        @error('offer_price')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror
    </div>    

    {{-- Description --}}
    <div class="form-group">
        <label for="description">Description</label>
        <textarea 
            class="form-control mb-2 @error('description') is-invalid @enderror" 
            name="description"
            id="description"
            placeholder="Description"
            maxlength="500"
        >{{ old('description', $service->description) }}</textarea>
        @error('description')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror
    </div>

    {{-- Current Image --}}
    @if ($service->image)
    <div class="mb-2">
        <img src="{{ asset('storage/'.$service->image) }}" width="80">
    </div>
    @endif

    {{-- Image Upload --}}
    <div class="form-control">
        <label for="image">Update Image</label>
        <input 
            type="file" 
            class="form-control mb-2 @error('image') is-invalid @enderror" 
            name="image"
            id="image"
        >
        @error('image')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection