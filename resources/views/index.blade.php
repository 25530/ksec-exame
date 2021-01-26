@extends('parent')

@section('main')
<div align="right">
    <a href="{{ route('crud.create') }}" class="btn btn-success btn-sm">Upload</a>
</div>
@if ($message = Session::get('succes'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="col-md-4">
    <form action="/search" method="get">
    <div class="input-group">
    <input type="search" name="search" class="form-control">
    <span class="form-group-prepend">
        <button type="submit" class="btn btn-primary">Search</button>
        </span>
        </div>
        </form>
</div>
<table class="table table-bordered table-striped">

 @foreach($data as $row)
  <div class="videodiv">
  <video width="640" height="480" controls>
   <source src="{{ URL::to('/') }}/video/{{ $row->video }}" >
    </video>
   <h1>{{ $row->title }}</h1>
   <p>{{ $row->description }}</p>
    <a href="{{ route('crud.show', $row->id) }}" class="btn btn-primary">Watch</a>
    <a href="{{ route('crud.edit', $row->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('crud.destroy', $row->id) }}" method="post">@csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
 @endforeach
</table>
{!! $data->links() !!}
@endsection