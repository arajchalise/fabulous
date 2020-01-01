@extends('layouts.admin_header')

@section('content')
<a href="{{ route('galleryCreate') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">Caption</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($galleries as $gallery)
        <tr>
          <td><img src="{{ asset('images/galleryImages') }}/{{ $gallery->photo }}" style="width: 80px; height: 80px;" /></td>
            <td>{{ $gallery->caption }}</td>
            <td>
              <a href="{{ route('gallary') }}" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> View As</a>
              <a href="/gallery/{{ $gallery->id }}/edit"class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="/gallery/{{ $gallery->id }}/destroy"class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
