<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasFilter;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail , CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, HasFilter;

    const ROLE_USER = 1;
    const ROLE_AUTHOR = 2;
    const ROLE_ADMIN = 3;

    const ROLES = [
        'Admin' => self::ROLE_ADMIN,
        'Author' => self::ROLE_AUTHOR,
        'User' => self::ROLE_USER,
    ];

    const STATUS = [
        true => 'Blocked',
        false => 'Unblocked',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_blocked',
        'bio',
        'avatar',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getAvatarAttribute($value)
    {
        return $value ?? config('app.default_avatar');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['username'] = Str::slug($value) . '-' . uniqid();
    }

    public function scopeSearch($query, $q = null)
    {
        $query->where('name', 'LIKE', '%' . $q . '%')
            ->orwhere('email', 'LIKE', '%' . $q . '%');
    }

    public function commentsCount()
    {
        if (count($this->comments) > 1) {
            return count($this->comments) . ' comments';
        }

        if (count($this->comments) < 1) {
            return 'No comments';
        }

        return 'One comment';
    }

    public function postsCount()
    {
        if (count($this->posts) > 1) {
            return count($this->posts) . ' posts';
        }

        if (count($this->posts) < 1) {
            return 'No posts';
        }

        return 'One post';
    }
}
