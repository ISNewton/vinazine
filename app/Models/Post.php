<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Support\Str;
use App\Models\Scopes\ActivePostScope;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use DateTime;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements Viewable
{
    use HasFactory, HasFilter, HasEagerLimit, InteractsWithViews;

    protected static function booted()
    {
        static::addGlobalScope(new ActivePostScope());
    }

    const STATUS = [
        true => 'Active',
        false => 'Unactive',
    ];

    public $fillable = ['title', 'content', 'user_id', 'is_active', 'category_id', 'thumbnail'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
        $this->attributes['slug'] = Str::slug($value . '-' . now());
    }

    public function getThumbnailAttribute($value)
    {
        return $value ?? config('app.default_thumbnail');
    }

    public function getCreatedAtAttribute($date)
    {
        $date = new DateTime($date);
        return $date->format('M d Y');
    }

    public function scopeSearch($query, $q = null)
    {
        $query->where('title', 'LIKE', '%' . $q . '%')
            ->orWhereHas('user', fn ($query) => $query->where('name', 'LIKE', '%' . $q . '%'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function shortDescription()
    {
        return Str::words($this->content, 20);
    }

    public function commentsCount()
    {
        $count = $this->comments->count();

       /*  $this->comments->map(function($comment) use($count) {
                $count += $comment->replies->count();
        }); */

        if ($count > 1) {
            return $count . ' comments';
        }

        if ($count < 1) {
            return 'No comments yet';
        }

        return 'One comment';
    }

    public function getNextPost()
    {
        return Post::select('id', 'title', 'thumbnail', 'slug', 'category_id')
            ->where('category_id', $this->category_id)
            ->where('id', '>', $this->id)
            ->firstOr(function () {
                return Post::select('id', 'title', 'thumbnail', 'slug', 'category_id')
                    ->find($this->id + 1);
            });
    }

    public function getPreviousPost()
    {
        return Post::select('id', 'title', 'thumbnail', 'slug', 'category_id')
            ->where('category_id', $this->category_id)
            ->where('id', '<', $this->id)
            ->firstOr(function () {
                return Post::select('id', 'title', 'thumbnail', 'slug', 'category_id')
                    ->find($this->id - 1);
            });
    }
}
