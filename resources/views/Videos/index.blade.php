@extends('layouts.admin_header')

@section('content')
<a href="{{ route('videoCreate') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Video</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($videos as $video)
        <tr>
            <td>{{ $video->id }}</td>
            <td>
              <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" width="100">
                  <source src="{{ asset('videos') }}/{{ $video->video }}" type="video/mp4">
                </video>
            </td>
            <td>
              @if(!$loop->first)
                <a href="/video/{{ $video->id }}/edit" class="btn btn-success">Set as Background</a>
               <a href="/video/{{ $video->id }}/destroy" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
              @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
