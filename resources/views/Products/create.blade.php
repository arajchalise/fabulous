@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('storeProduct') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="firstName">Product Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="Product Name" name="productName">
        </div>
        <div class="form-group col-md-6">
            <label for="lastName">Brand Name</label>
            <input type="text" class="form-control" id="lastName" placeholder="Brand Name" name="brandName">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="firstName">Price</label>
            <input type="text" class="form-control" id="firstName" placeholder="Product Price" name="productPrice">
        </div>
            <div class="form-group col-md-6">
            <label for="contactNo">Category</label>
            <select class="custom-select form-control" name="category" id="contactNo">
            <option selected value="0">Select Type</option>
            @foreach($categories as $category)
                <option  value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        </div>
        <div class="form-group ">
            <label for="firstName">Product Image</label>
            <input type="file" class="form-control" id="firstName" name="photo[]" multiple>
        </div>
     
         <div class="form-group ">
            <label for="address">Specification</label>
             <textarea name="description" id="editor"></textarea>
        </div>
        
        <input type="submit" name="" value="Store"  class="btn btn-success" />
    </form>
   <script>
      var options = {
        filebrowserUploadUrl: '/ckeditor/upload',
                filebrowserUploadMethod: 'form',
                height: 400,
                baseFloatZIndex: 10005
      };
    </script>
    <script>
        CKEDITOR.replace('editor', options);
    </script>

@endsection
