@extends('admin.layouts.app')
@section('title')
All Brand
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All Brand</h4>
      <p class="card-description"><a href="{{route('brand.add')}}">Add Brand</a></p>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $x=1;
          @endphp
          @forelse ($brands as $brand)
            <tr>
              <td>{{$x++}}</td>
              <td><img src="{{asset('')}}{{$brand->image}}" alt="{{$brand->name}}"></td>
              <td>{{$brand->name}}</td>
              
              <td>{{$brand->getCategory!=null?$brand->getCategory->name:'none'}}</td>
              <td>{{$brand->slug}}</td>
              <td><label class="badge badge-success">Active</label></td>
              <td>
                @can('access-validation','category-update')
                <a href="{{route('brand.edit',['id'=>$brand->id])}}" class="badge badge-danger"><i class="mdi mdi-table-edit"></i></a>
                @endcan

                @can('access-validation','category-delete')
                <a href="{{route('brand.delete',['id'=>$brand->id])}}" class="badge badge-primary"><i class="mdi mdi-delete"></i></a>
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