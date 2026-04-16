@extends('layouts.app')

@section('content')
<h2>Services</h2>
<a href="{{ route('services.create') }}" class="btn btn-success mb-3">Add Service</a>

<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>MRP Price</th>
    <th>Selling Price</th>
    <th>Offer Price</th>
    <th>Image</th>
    <th>Action</th>
</tr>

@foreach($services as $service)
<tr>
    <td>{{ $service->id }}</td>
    <td>{{ $service->name }}</td>
    <td>{{ $service->mrp_price }}</td>
    <td>{{ $service->selling_price }}</td>
    <td>{{ $service->offer_price }}</td>
    <td>
        @if($service->image)
            <img src="{{ asset('storage/'.$service->image) }}" width="60">
        @endif
    </td>
    <td>
        <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>

        <form action="{{ route('services.destroy',$service->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>

{{ $services->links() }}
@endsection