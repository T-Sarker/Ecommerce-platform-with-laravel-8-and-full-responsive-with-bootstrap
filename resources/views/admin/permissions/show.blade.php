@extends('admin.layouts.app')
@section('title')
All Permissions
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All Permissions</h4>
      <p class="card-description"><a href="{{route('permission.add')}}">Add Permission</a></p>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Permission Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $x=1;
          @endphp
          @forelse ($permissions as $permission)
            <tr>
              <td>{{$x++}}</td>
              <td>{{$permission->permission}}</td>
              <td><label class="badge badge-success">Active</label></td>
              <td>
                
                <a href="{{route('permission.delete',['id'=>$permission->id])}}" class="badge badge-primary" onclick="return confirm('Are you sure you want to delete this?');"><i class="mdi mdi-delete"></i></a>
              </td>
            </tr>
          @empty
            <p class="alert alert-danger">No Permissions Found</p>
          @endforelse 
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection