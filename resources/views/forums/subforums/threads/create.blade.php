@extends('layouts.master')

@section('content')

  <form class="" action="{{ route('thread.store', [$forum->slug, $subforum->slug]) }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="title">Title:</label>
      <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}">
    </div>
    <div class="form-group">
      <textarea class="form-control" name="content" rows="8" cols="80"></textarea>
    </div>
    <button class="btn btn-primary" type="submit" name="button">Post Thread</button>
  </form>

@endsection
