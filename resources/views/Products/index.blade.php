@extends('layouts.admin_header')
@section('content')
<a href="{{ route('createProduct') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Rewards</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <form method="post" action="{{ route('bulkEdit') }}">
      {{ csrf_field() }}
      <input type="submit" name="" value="Bulk Update" class="btn btn-success" style="float: right;">
      <?php $i = 0; ?>
    @foreach($products as $product)
    <tr>
      <input type="text" name="{{ $i }}" value="{{$product->id}}" hidden>
        <td><input type="text" name="name{{ $i }}" value="{{ $product->name }}" class="form-control" style="width: 300px;"></td>
        <td><input type="text" name="brand_name{{ $i }}" value="{{ $product->brand_name }}" class="form-control"></td>
        <td><input type="text" name="price{{ $i }}" value="{{ $product->price }}" class="form-control"></td>
        <td><div class="form-row">
          <input type="text" name="prevStock{{ $i }}" value="{{ $product->stock }}" readonly class="form-control col-lg-6" style="width: 40%;"><input type="text" name="stock{{ $i }}" value="" class="form-control col-lg-6"  style="width: 40%;">
        </div></td>
        <td><input type="text" name="reward{{ $i }}" value="{{ $product->rewards }}" class="form-control"></td>
        <td>
          <a href="/product/{{ $product->id}}/edit"class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a href="/product/{{ $product->id}}/destroy"class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
    </tr>
    <?php $i++ ?>
    @endforeach
    </form>
     </tbody>
</table>
@endsection
