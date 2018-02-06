<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Subforum extends Model
{
    use Sluggable;

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable()
    {
       return [
           'slug' => [
               'source' => 'title'
           ]
       ];
    }

    protected $guarded = [];

    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function forum()
    {
      return $this->belongsTo(Forum::class);
    }

    public function threads()
    {
      return $this->hasMany(Thread::class);
    }

    public function replies()
    {
      return $this->hasManyThrough(Reply::class, Thread::class);
    }

    public function lastPost()
    {
      // $threads = $this->threads->toArray();
      // $replies = $this->replies->toArray();
      //
      // $posts = array_merge($threads, $replies);
      //
      // usort($posts, function($a, $b) {
      //   return $a['created_at'] < $b['created_at'];
      // });
      //
      // $lastPost = (object) $posts[0];
      //
      // return $lastPost;

      $lastThread = $this->threads()->latest()->first();
      $lastReply = $this->replies()->latest()->first();

      return collect([$lastThread, $lastReply])->filter()->sortByDesc('created_at')->first();
    }

    public function posts()
    {
      $threads = $this->threads()->latest()->get();
      $replies = $this->replies()->latest()->get();

      return collect([$threads, $replies])->filter()->sortByDesc('created_at')->first();
    }


}
