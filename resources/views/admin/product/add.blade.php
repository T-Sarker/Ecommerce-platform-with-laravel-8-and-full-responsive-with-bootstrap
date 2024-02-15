@extends('admin.layouts.app')
@section('title')
Add Product
@endsection
@section('contents')
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add Product</h4>
      <p class="card-description"> Add Product </p>
       @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
        <form class="forms-sample" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Username" value="{{old('title')}}">
          @error("title")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control textarea" id="description" name="description" rows="2">{{old('description')}}</textarea>
          @error("description")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
          <label for="features">Features</label>
          <textarea class="form-control textarea" id="features" name="features" rows="2">{{old('features')}}</textarea>
          @error("features")
            <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>


        <div class="row mt-3">
          <div class="col">
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" min="1" id="price" name="price" placeholder="Price" value="{{old('price')}}">
              @error("price")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="discount">Discount in Percentage</label>
              <input type="number" class="form-control" id="discount" name="discount" placeholder="Discount in %" value="{{old('discount')}}">
              @error("discount")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="quantity">Quantity (in Stock)</label>
              <input type="number" class="form-control" id="quantity" name="quantity" placeholder="In stock quantity" value="{{old('quantity')}}">
              @error("quantity")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col form-group">
            <label>Thumbnail</label>
            <input type="file" name="imageThumb" class="form-control">
            @error("imageThumb")
              <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="col form-group">
            <label>Images</label>
            <input type="file" name="image[]" class="form-control" multiple accept=".jpg,.jpeg,.JPG,.webp,.PNG,.png,.gif">
            @error("image")
              <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="category">Select Category</label>
              <select class="form-control" id="category" name="category">
                @foreach($categories as $cat)
                  <option class="selectCategory" value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
              </select>
              @error("category")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
            </div>
          </div>

          <div class="col">       
            <div class="form-group">
              <label for="brands">Select Brand</label>
              <select class="form-control" id="brands" name="brands">
                <option value="" selected>Choose Brand</option>
              </select>
              @error("brands")
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
            </div>
          </div>

        </div>

         <div class="field_wrapper mt-4 mb-3">
            <div class="form-group">
                <a href="javascript:void(0);" class="add_button form-control" title="Add field"><img style="width:30px;height:30px;margin-right:15px" src="https://cdn.picpng.com/icon/icon-symbol-plus-more-red-46801.png"/><b>Add Colors</b></a>
            </div>
        </div>

        <div class="addextra"></div>
        

        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>

        </form>
      </div>
    </div>
  </div>
  @endsection

  @push('body-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var addButton2 = $('.add_button2'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var wrapper2 = $('.field_wrapper2'); //Input field wrapper
            
            var x = 1; 
          
          $(document).on('focusout','.colorName',function(){

            $('.addextra').append('<br><b class="text-info">'+$(this).val().toUpperCase()+'</b>');

            for (var j = 0; j < 5; j++) {

                var sizes = ['S','M','L','XL','XXL'];
                var inputName = $(this).val();
                var coloredSizes = '<div class="row ml-3 p-2"><div class="col colorsInput"><div class="form-group">Size Name<label for="coloredSizes"></label><input type="text" class="form-control" name="'+inputName+'[]" id="coloredSizes" placeholder="Size Name" value="'+sizes[j]+'"></div></div><div class="col colorsInput"><div class="form-group"><label for="coloredSizesFiles">Color Images</label><input type="file" class="form-control" id="coloredSizesFiles" name="'+inputName+'File[]" ></div></div><div class="col colorsInput"><div class="form-group">Feature Price<label for="coloredSizesPrice"></label><input type="text" class="form-control" name="'+inputName+'Price[]" id="coloredSizesPrice" placeholder="Price" value="0"></div></div><button type="button" class="badge badge-primary mr-2 remove_button"><i class="mdi mdi-delete menu-icon"></i></button></div>';
                
                $('.addextra').append(coloredSizes);

              }
            
          });
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){ 
                    
                    var colorsInput = '<div class="row mt-3"><div class="col colorsInput"><div class="form-group">Feature Name<label for="featureName"></label><input type="text" class="form-control colorName" name="colorName[]" placeholder="Color Name" value=""></div></div><button type="button" class="badge badge-primary mr-2 remove_button"><i class="mdi mdi-delete menu-icon"></i></button></div>';
                    $(wrapper).append(colorsInput); //Add field html

                    x++; //Increment field counter
                }
            });
            
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('.row').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
      </script>
  @endpush