<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Subforum;
use App\Thread;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubforumsController extends Controller
{
    public function index(Forum $forum, Subforum $subforum)
    {
      $recentlyTouchedThreads = Thread::where('subforum_id', $subforum->id)->paginate(15)->sortByDesc(function($thread) {
        $replies = $thread->replies->sortByDesc('created_at');

        $lastTouchedPost = Carbon::minValue();

        if (!empty($replies->toArray())) {
          $lastTouchedPost = $lastTouchedPost->max($replies->first()->created_at);
        }

        return $lastTouchedPost->max($thread->created_at);
      });

      return view('forums.subforums.index', compact(['forum', 'subforum', 'recentlyTouchedThreads']));
    }
}
