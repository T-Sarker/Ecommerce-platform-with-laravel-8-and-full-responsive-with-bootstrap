@extends('admin.layouts.app')
@section('title')
All Roles
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All Roles</h4>
      <p class="card-description"><a href="{{route('category.add')}}">Add Category</a></p>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Parrent Category</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $x=1;
          @endphp
          @forelse ($categories as $cat)
            <tr>
              <td>{{$x++}}</td>
              <td><img src="{{asset('')}}{{$cat->image}}" alt="{{$cat->name}}"></td>
              <td>{{$cat->name}}</td>
              <td>{{$cat->getParentCategory!=null?$cat->getParentCategory->name:'none'}}</td>
              <td>{{$cat->slug}}</td>
              <td><label class="badge badge-success">Active</label></td>
              <td>
                @can('access-validation','category-update')
                <a href="{{route('category.edit',['id'=>$cat->id])}}" class="badge badge-danger"><i class="mdi mdi-table-edit"></i></a>
                @endcan

                @can('access-validation','category-delete')
                <a href="{{route('category.delete',['id'=>$cat->id])}}" class="badge badge-primary" onclick="return confirm('Are you sure you want to delete this?');"><i class="mdi mdi-delete"></i></a>
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