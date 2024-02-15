@extends('admin.layouts.app')
@section('title')
Edit Role
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Role</h4>
      <p class="card-description"> <a href="{{route('role.add')}}">Add Role</a> </p>
      <form class="forms-sample" action="{{route('role.update')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Role Name" name="name" value="{{$srole->name}}">
          <input type="hidden" name="id" value="{{$srole->id}}">
          @error('name')
          <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="role">Role</label>
          @php
          $x=array();
          @endphp
          @foreach($roles as $role)
          @php
          $x[]=$role->role;
          @endphp
          @endforeach
          <select class="form-control" id="role" name="role">
            @for($i=1;$i<=5;$i++)
            <option {{ in_array($i, $x) && $srole->role!=$i ?'disabled':'' }} {{$srole->role==$i?'selected':''}} value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>
        <div class="form-group">
          <label for="permissions">Permissions</label>
          <div class="dropdown show">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;text-align: left;background: none;"></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
              <h6 class="dropdown-header">Permission List</h6>
              @forelse($permissions as $permission)
                <div class="form-check ml-3">
                  <label class="form-check-label">
                    <input type="checkbox" {{in_array($permission->permission,json_decode($srole->permissions))?'checked':''}} class="form-check-input" name="access[]" value="{{$permission->permission}}"> {{$permission->permission}} <i class="input-helper"></i></label>
                </div>
              @empty
                <p>No Permissions Yet</p>
              @endforelse
              </div>
            </div>
          </div>          
          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
  @endsection