@extends('admin.layouts.app')
@section('title')
Add Role
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      @if(Session::has('err'))
        <div class="alert alert-danger mt-3 mb-2">
            <strong><i class="mdi mdi-alert btn-icon-prepend"></i></strong> {{Session::get('err')}}
        </div>
      @endif
      <h4 class="card-title">Permissions</h4>
      <p class="card-description"> Add Permission </p>
      <form class="forms-sample" action="{{route('permission.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Permission Name</label>
          <input type="text" class="form-control" id="name" placeholder="Role Name" name="name" value="{{old('name')}}">
          @error('name')
          <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection