@extends('layouts.master')

@section('content')

  <h3 style="text-transform: capitalize">{{ $subforum->title }}</h3>

  @if ($recentlyTouchedThreads)

    <ul class="list-group">
      @foreach ($recentlyTouchedThreads as $thread)
        <li class="list-group-item">
          <div class="row">
            <div class="col-md-7">
              <h4>
                <a href="{{ route('thread.show', [$forum->slug, $thread->subforum->slug, $thread->slug]) }}">
                  {{ $thread->title }}
                </a>
              </h4>
              <p><span>By</span> <a href="{{ route('user.profile', $thread->author()) }}">{{ $thread->author() }}</a>, {{ $thread->created_at->format('F d, Y') }}</p>
            </div>

            <div class="col-md-2">
              <p>{{ count($thread->replies) }} {{ str_plural('reply', count($thread->replies)) }}</p>
            </div>

            <div class="col-md-3">
              @if (!empty($thread->replies->toArray()))
                @foreach ($thread->replies as $reply)
                  @if ($loop->last)
                    <p>
                      <a href="{{ route('user.profile', $reply->author()) }}">{{ $reply->author() }}</a>
                      <p>{{ $reply->created_at->diffForHumans() }} <a href="{{ route('thread.show', [$forum->slug, $subforum->slug, $reply->thread->slug]) . '#reply-' . $reply->id }}" title="Go to last post" ><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
                    </p>
                  @endif
                @endforeach

              @else
                <p>
                  <a href="#">{{ $thread->author() }}</a>
                </p>
              @endif

            </div>
          </div>

        </li>
      @endforeach
    </ul>

  @endif

  <a class="btn btn-primary" href="{{ route('thread.create', [$forum->slug, $subforum->slug]) }}">Post New Thread</a>

@endsection
