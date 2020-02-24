<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Blog;
class Comment extends Model
{
    protected $guarded=[];

	public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function replies()
    {
        return $this->hasMany('App\Comment');
    }
}
