<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Comment;

class Blog extends Model
{
    use SoftDeletes;
    protected $guarded=[];
    protected $dates=['deleted_at'];

   	public function comments()
    {
        return  $this->hasMany('App\Comment');
    }

    public function getRouteKeyName(){
   	 return 'slug';
	}

}
