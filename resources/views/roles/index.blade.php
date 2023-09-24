@extends('layouts.template')
@section('module','Role Management')
@section('title','Role Edit')
@push('css_scripts')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><h4>Role Management</h4></div>
        <div class="card-body">


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="text-right">
            @can('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

<div> <br /> </div>
<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                <a class="btn btn-danger" href="{{ route('roles.destroy',$role->id) }}" data-confirm-delete="true">Delete</a>
                {{--!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!--}}
                    {{--!! Form::submit('Delete', ['class' => 'btn btn-danger','data-confirm-delete'=>'true']) !!--}}
                {{--!! Form::close() !!--}}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}



        </div>
    </div>
</div>
@endsection