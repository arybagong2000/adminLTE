@extends('layouts.template')
@section('module','Users Management')
@section('title','Users')
@push('css_scripts')
<style>
  div.dt-buttons {float:right;}
</style>
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

@endsection
@push('scripts')
  {{ $dataTable->scripts() }}
  <script>
  $(document).ready(function() {
    //alert('ini jquery');  
  });
  </script>
@endpush