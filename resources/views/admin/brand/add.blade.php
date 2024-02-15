@extends('admin.layouts.app')
@section('title')
Add sub admin
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Brand</h4>
      <p class="card-description"> Add Brand </p>
        <form class="forms-sample" action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
          @csrf

        <div class="form-group">
          <label for="category">Choose Category</label>
          <select class="form-control" id="category" name="category">
            <option value="" selected="selected">select</option>
            @foreach($categories as $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
          </select>
          @error("category")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="name">Brand Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Brand name" value="{{old('name')}}">
          @error("name")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label>Brand Image</label>
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