@extends('admin.layouts.app')
@section('title')
Edit sub admin
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add Sub Admin</h4>
      <p class="card-description"> Add sub-admin </p>
      
        <form class="forms-sample" action="{{route('subadmin.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Username" value="{{$subadmin->name}}">
          <input type="hidden" name="id" value="{{$subadmin->id}}">
          @error("name")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$subadmin->email}}">
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
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="alert" id="passalert"></div>
          @error("password")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="role">Select Role</label>
          <select class="form-control" id="role" name="role">
            @foreach($roles as $role)
              <option value="{{$role->role}}" {{$role->role==$subadmin->role?'selected':''}}>{{$role->name}}</option>
            @endforeach
          </select>
        </div>
          <button type="submit" class="btn btn-gradient-primary mr-2 ">Submit</button>
        </form>
      </div>
    </div>
  </div>
  @endsection