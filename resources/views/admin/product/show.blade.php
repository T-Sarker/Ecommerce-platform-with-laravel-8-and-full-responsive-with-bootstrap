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
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $x=1;
          @endphp
          @forelse ($subadmins as $subadmin)
            <tr>
              <td>{{$x++}}</td>
              <td><img src="{{asset('')}}{{$subadmin->image}}" alt="{{$subadmin->name}}"></td>
              <td>{{$subadmin->name}}</td>
              <td>{{$subadmin->email}}</td>
              <td>{{$subadmin->getRoleDetails->name}}</td>
              <td><label class="badge badge-success">Active</label></td>
              <td>
                @can('access-validation','sub admin-update')
                <a href="{{route('subadmin.edit',['id'=>$subadmin->id])}}" class="badge badge-danger"><i class="mdi mdi-table-edit"></i></a>
                @endcan

                @can('access-validation','sub admin-delete')
                <a href="{{route('subadmin.delete',['id'=>$subadmin->id])}}" class="badge badge-primary"><i class="mdi mdi-delete"></i></a>
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