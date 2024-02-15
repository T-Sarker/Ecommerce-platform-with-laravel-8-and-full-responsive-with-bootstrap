@extends('admin.layouts.app')
@section('title')
All Roles
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All Roles</h4>
      <p class="card-description"><a href="{{route('role.add')}}">Add Role</a></p>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $x=1;
          @endphp
          @forelse ($roles as $role)
            <tr>
              <td>{{$x++}}</td>
              <td>{{$role->name}}</td>
              <td>{{$role->role}}</td>
              <td><label class="badge badge-success">Active</label></td>
              <td>
                @can('access-validation','role-update')
                  <a href="{{route('role.edit',['role'=>$role->id])}}" class="badge badge-danger"><i class="mdi mdi-table-edit"></i></a>
                @endcan
                @can('access-validation','role-delete')
                  <a href="{{route('role.delete',['role'=>$role->id])}}" class="badge badge-primary" onclick="return confirm('Are you sure you want to delete this?');"><i class="mdi mdi-delete"></i></a>
                @endcan
              </td>
            </tr>
          @empty
            <p class="alert alert-danger">No Roles Found</p>
          @endforelse 
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection