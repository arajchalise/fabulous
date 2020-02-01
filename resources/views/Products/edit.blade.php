@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('updateProduct') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="text" name="id" value="{{ $data['product']->id }}" hidden>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="firstName">Product Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="Product Name" name="productName" value="{{ $data['product']->name }}">
        </div>
        <div class="form-group col-md-6">
            <label for="lastName">Brand Name</label>
            <input type="text" class="form-control" id="lastName" placeholder="Brand Name" name="brandName" value="{{ $data['product']->brand_name }}">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="firstName">Price</label>
            <input type="text" class="form-control" id="firstName" placeholder="Product Price" name="productPrice" value="{{ $data['product']->price }}">
        </div>
            <div class="form-group col-md-6">
            <label for="contactNo">Category</label>
            <select class="custom-select form-control" name="category" id="contactNo">
            <option selected value="0">Select Type</option>
            @foreach($data['categories'] as $category)
                @if($category == $data['product']->category)
                    <option  value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option  value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
          </select>
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="firstName">Stock</label>
            <input type="text" class="form-control" id="firstName" placeholder="Product Stock" name="productStock" value="{{ $data['product']->stock }}">
        </div>
            <div class="form-group col-md-6">
            <label for="contactNo">Rewards</label>
            <input type="text" class="form-control" id="firstName" placeholder="Product Rewards" name="productRewards" value="{{ $data['product']->rewards }}">
        </div>
        </div>
        <div class="form-group ">
            <label for="firstName">Product Image</label>
            <input type="file" class="form-control" id="firstName" name="photo[]" multiple>
        </div>
     
         <div class="form-group ">
            <label for="address">Specification</label>
             <textarea name="description" id="editor">{!! $data['product']->description !!}</textarea>
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
