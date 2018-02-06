@extends('layouts.master')

@section('content')

  @if ($forums)

    @foreach ($forums as $forum)
      <div class="row">
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 style="text-transform: capitalize;">
                {{ $forum->title }}
              </h4>
              <span>{{ $forum->description }}</span>
            </div>

            <div class="panel-body">
              @foreach ($forum->subforums as $subforum)

                <div class="row">
                  <div class="col-md-7">
                    <h4 style="text-transform: capitalize;">
                      <a href="{{ route('subforums.index', [$subforum->forum->slug, $subforum->slug]) }}">
                        {{ $subforum->title }}
                      </a>
                    </h4>
                    <p>
                      <h6>{{ $subforum->description }}</h6>
                    </p>
                  </div>

                  <div class="col-md-2 text-center">
                    <p>{{ (int)count($subforum->threads) }}</p>
                    <p>{{ str_plural('post', count($subforum->threads)) }}</p>
                  </div>

                  <div class="col-md-3">
                    @if ($lastPost = $subforum->lastPost())
                      @if ($lastPost->thread_id)

                        <h5 style="text-transform: capitalize">
                          <span>Latest: </span>
                          <a href="{{ route('thread.show', [$forum->slug, $subforum->slug, $lastPost->thread->slug]) }}">{{ $lastPost->thread->title }}</a>
                        </h5>

                      @else

                        <h5 style="text-transform: capitalize">
                          <span>Latest: </span>
                          <a href="{{ route('thread.show', [$forum->slug, $subforum->slug, $lastPost->slug]) }}">{{ $lastPost->title }}</a>
                        </h5>

                      @endif

                      <p>
                        <a href="{{ route('user.profile', $lastPost->author()) }}">{{ $lastPost->author() }}</a>, {{ $lastPost->created_at->diffForHumans() }}
                      </p>
                    @endif
                  </div>
                </div>

              @endforeach
            </div>
          </div>
        </div>

        <div class="col-md-3">

        </div>
      </div>



    @endforeach

  @endif

@endsection
