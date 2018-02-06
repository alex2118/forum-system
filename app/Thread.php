<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
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

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function subforum()
    {
      return $this->belongsTo(Subforum::class);
    }

    public function replies()
    {
      return $this->hasMany(Reply::class);
    }

    public function author()
    {
      return $this->user->username;
    }
}
