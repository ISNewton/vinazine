<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\EloquentEagerLimit\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public function posts(): BelongsToMany {
        return $this->belongsToMany(Post::class);
    }
}
