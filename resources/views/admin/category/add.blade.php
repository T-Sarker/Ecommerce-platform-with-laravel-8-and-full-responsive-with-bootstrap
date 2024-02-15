@extends('admin.layouts.app')
@section('title')
Add sub admin
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Category</h4>
      <p class="card-description"> Add Category </p>
        <form class="forms-sample" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
          @csrf

        <div class="form-group">
          <label for="parentId">Parent Category</label>
          <select class="form-control" id="parentId" name="parentId">
            <option value="0">None</option>
            @foreach($categories as $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Category name" value="{{old('name')}}">
          @error("name")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label>Category Image</label>
          <input type="file" name="image" class="form-control">
          @error("image")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        
        
          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
      
      </div>
    </div>
  </div>
  @endsection