@extends('layouts.master')

@section('content')

  <form class="" action="{{ route('reply.store', [$forum->slug, $subforum->slug, $thread->slug]) }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
      <textarea class="form-control" name="content" rows="8" cols="80"></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Submit Reply</button>
  </form>

@endsection
