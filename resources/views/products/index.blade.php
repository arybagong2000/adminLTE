@extends('layouts.template')
@section('module','Products Management')
@section('title','List Products')
@push('css_scripts')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><h4>List Products</h4></div>
        <div class="card-body">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td>
                <!-- form action="{{ route('products.destroy',$product->id) }}" method="POST" -->
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endcan
                    @can('product-delete')
                    <a class="btn btn-danger" href="{{ route('products.destroy',$product->id) }}" data-confirm-delete="true">Delete</a>
                    @endcan
                    
                    {{-- @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <!-- button type="submit" class="btn btn-danger">Delete</button -->
                    @endcan --}}
                <!-- /form -->
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}

        </div>
    </div>
</div>
@endsection