<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
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

    public function subforums()
    {
      return $this->hasMany(Subforum::class);
    }
}
