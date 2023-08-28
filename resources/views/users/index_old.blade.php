@extends('layouts.template')
@section('module','Users Management')
@section('title','Users')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
        <!-- h3 class="card-title">Bordered Table</h3 -->
      </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        {{ $message }}
      </div>
      @endif
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
            <th width="10px">No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="270px">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($data as $key => $user)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <h5>
                @if(!empty($user->getRoleNames()))
                  @foreach($user->getRoleNames() as $v)
                    <label class="badge bg-success">{{ $v }}</label>
                  @endforeach
                @endif
                </h5>
              </td>
              <td class="text-center">
                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i> Show</a>
                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i> Edit</a>
                  {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content1')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!-- div class="pull-left">
            <h2>Users Management</h2>
        </div -->
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge bg-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection