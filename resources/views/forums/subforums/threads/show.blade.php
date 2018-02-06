@extends('layouts.master')

@section('content')

  <h3>{{ $thread->title }}</h3>
  <p>{{ $thread->content }}</p>

  @if ($thread->replies)

    <ul style="height: 6000px;">
      @foreach ($thread->replies as $reply)

        <li id="reply-{{ $reply->id }}">{{ $reply->content }}</li>
        <p>{{ $reply->user->username }}</p>

      @endforeach
    </ul>

  @endif

  <a class="btn btn-primary" href="{{ route('reply.create', [$forum->slug, $subforum->slug, $thread->slug]) }}">Post Reply</a>
@endsection
