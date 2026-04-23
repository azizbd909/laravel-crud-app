@extends('layouts.app')

@section('content')
<h2>Service Details</h2>

<div class="card p-3">
    <h4>{{ $service->name }}</h4>
    <p>{{ $service->description }}</p>
    <p><strong>MRP Price:</strong> {{ $service->mrp_price }}</p>
    <p><strong>Selling Price:</strong> {{ $service->selling_price }}</p>
    <p><strong>Offer Price:</strong> {{ $service->offer_price }}</p>

    @if($service->image)
        <img src="{{ asset('storage/'.$service->image) }}" width="120">
    @endif
</div>
@endsection