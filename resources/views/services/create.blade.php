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
    {{-- Name --}}
    <div class="form-group">
        <label for="name">Name</label>
        <input 
            class="form-control mb-2 @error('name') is-invalid @enderror" 
            name="name"
            id="name"
            placeholder="Name"
            value="{{ old('name') }}"
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
        placeholder="MRP Price"
        value="{{ old('mrp_price') }}"
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
            placeholder= "Selling Price"
            value="{{ old('selling_price') }}"
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
            placeholder="Offer Price"
            value="{{ old('offer_price') }}"
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
            name="description" id="description"
            placeholder="Write a berif description of the service..."
            maxlength="500"
        >{{ old('description') }}</textarea>
        @error('description')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror
    </div>
    {{-- Image --}}
    <div class="form-control">
        <label for="image">Upload Image</label>
        <input 
            type="file" 
            class="form-control mb-2 @error('image') is-invalid @enderror" 
            name="image" id="image"
        >
        @error('image')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror
    </div>    
    <button class="btn btn-success">Submit</button>
</form>
@endsection