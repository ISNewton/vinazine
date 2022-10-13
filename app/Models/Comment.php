<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Comment extends Model
{
    use HasFactory , HasEagerLimit;

    public $fillable = ['comment','user_id','post_id','parent_id'];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class,'parent_id');
    }

    public function getCreatedAtAttribute($date)
    {
        $date = new DateTime($date);
        return $date->format('M d Y');
        // return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('M d Y');
    }
}
