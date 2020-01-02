@extends('layouts.admin_header')
@section('content')
<a href="{{ route('createBlog') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($blogs as $blog)
    <tr>
        <td>{{ $blog->title }}</td>
        <td>{{ $blog->description }}</td>
        <td><img src="{{ asset('images/blogImages') }}/{{ $blog->photo }}" style="width:  80px; height: 80px;"></td>
        <td>
          <a href="{{ route('blog') }}" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> View As</a>
          <a href="/blog/{{ $blog->id}}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a href="/blog/{{ $blog->id}}/destroy" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
    </tr>
    @endforeach
     </tbody>
</table>
@endsection
