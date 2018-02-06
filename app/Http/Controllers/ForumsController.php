<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Thread;
use App\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function index()
    {
      $forums = Forum::with('subforums')->get();

      // $subforums = Subforum::all()->sortByDesc(function($subforum) {
      //     $threads = $subforum->threads->sortByDesc('created_at');
      //
      //     $last_post = Carbon::minValue();
      //
      //     $threads->each(function($thread) use (&$last_post) {
      //       $reply = $thread->replies->sortByDesc('created_at')->first();
      //
      //       if (!empty($reply)) {
      //         $last_post = $last_post->max($reply->created_at);
      //       }
      //     });
      //
      //     if (!empty($threads->toArray())) {
      //       $last_post = $last_post->max($threads->first()->created_at);
      //     }
      //
      //     return $last_post->max($subforum->created_at);
      // });

      return view('forums.index', compact('forums'));
    }
}
