<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'headline', 'location', 'about', 'profile_path', 'image_url'];
    protected $guarded = ['id'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'followed_id');
    }

    public function followings()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }
}
