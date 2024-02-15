@extends('admin.layouts.app')
@section('title')
Add sub admin
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add Sub Admin</h4>
      <p class="card-description"> Add sub-admin </p>
      @if(!$roles->isEmpty())
        <form class="forms-sample" action="{{route('subadmin.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Username" value="{{old('name')}}">
          @error("name")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
          @error("email")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label>Upload Image</label>
          <input type="file" name="image" class="form-control">
          @error("image")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control pass" id="password" name="password" placeholder="Password">
          <div class="alert" id="passalert"></div>
          @error("password")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="cpassword">Confirm Password</label>
          <input type="password" class="form-control pass" id="cpassword" name="cpassword" placeholder="Password">
          <div class="alert" id="cpassalert"></div>
        </div>
        <div class="form-group">
          <label for="role">Select Role</label>
          <select class="form-control" id="role" name="role">
            @foreach($roles as $role)
              <option value="{{$role->role}}">{{$role->name}}</option>
            @endforeach
          </select>
        </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 btnsave">Submit</button>
        </form>
      @else
        <h3 class="alert alert-danger">No Role found! <a href="{{route('role.add')}}">Add role</a> first</h3>
      @endif
      </div>
    </div>
  </div>
  @endsection