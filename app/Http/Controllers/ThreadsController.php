<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Subforum;
use App\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Forum $forum, Subforum $subforum)
    {
        return view('forums.subforums.threads.create', compact(['forum', 'subforum']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Forum $forum, Subforum $subforum)
    {
        // $this->validate($request, [
        //   'title' => 'required|max:255',
        //   'content' => 'required'
        // ]);

        $thread = Thread::create([
          'user_id' => request()->user()->id,
          'subforum_id' => $subforum->id,
          'title' => request()->title,
          'content' => request()->content
        ]);

        return redirect()->route('thread.show', [$forum->slug, $subforum->slug, $thread->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum, Subforum $subforum, Thread $thread)
    {
        return view('forums.subforums.threads.show', compact(['forum', 'subforum', 'thread']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
