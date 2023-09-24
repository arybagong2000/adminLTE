@extends('layouts.template')
@section('module','Products Management')
@section('title','Show Products')
@push('css_scripts')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><h4>Show Products</h4></div>
        <div class="card-body">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>

    
@endsection