@extends('layouts.template')
@section('module','Suppliers Management')
@section('title','Suppliers')
@push('css_scripts')
<style>
  div.dt-buttons {float:right;padding-bottom :10px;}
  div.dataTables_filter {float:left;}
  div.dataTables_paginate {float: left;}
  div.dataTables_info {float: right;}
  .page-item.active .page-link {
    /*z-index: 3;*/
    color: #6c757d;
    background-color: rgba(0,0,0,.05);
    border-color: #ddd;
    }
</style>
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
              <div class="float-none">Manage Suppliers</div>
              <div class="float-end">
                <button type="button" class="add-sluppliers btn btn-info" data-toggle="modal" data-target="#addModal">Add New Data</button>
              </div>
            </div>
            <div class="card-body">
                {{  $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@include('suppliers.add_modal')
@push('scripts')
{{  $dataTable->scripts() }}  

<script type="text/javascript">
  //jquery
  $(document).ready(function(){
    //console.log("huhuy1");
    $(document).ajaxComplete(function(){
      $(".bi-plus").on("click",function(){
        alert('huhuy');
        return false;
      });
      //console.log("huhuy2");
      /*$("#users-table").on("click",".edit",function(){
        window.location.href=$this.href;
      });*/
      $(".add-sluppliers").on("click",function(){
        alert('huhuy');
        $("#addModal .modal-body").load("{!! route('suppliers.create') !!}");
        return;
      });
    });
  });
</script>
@endpush
