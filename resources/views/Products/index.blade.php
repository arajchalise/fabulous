@extends('layouts.admin_header')
@section('content')
<a href="{{ route('createProduct') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{!! $product->description !!}</td>
        <td>
          <a href="/product/{{ $product->id}}/edit"class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a href="/product/{{ $product->id}}/destroy"class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
    </tr>
    @endforeach
     </tbody>
</table>
@endsection
