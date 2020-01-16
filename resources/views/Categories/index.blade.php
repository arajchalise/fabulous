@extends('layouts.admin_header')

@section('content')
<a href="{{ route('categoryCreate') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td><a href="/category/{{ $category->id }}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a><a href="/category/{{ $category->id }}/destroy" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

