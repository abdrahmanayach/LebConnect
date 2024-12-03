<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DateTime;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['content', 'image_url', 'user_id'];
    protected $guarded = ['id'];

    public function getLikedAttribute()
    {
        return $this->likes()->where('user_id', $_SESSION['user_id'])->exists();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    
    public function getElapsedTimeAttribute()
    {
        $createdAt = new DateTime($this->created_at);
        $currentTime = new DateTime();

        $interval = $createdAt->diff($currentTime);

        if ($interval->y > 0) {
            return $interval->format('%y y');
        } elseif ($interval->m > 0) {
            return $interval->format('%m m');
        } elseif ($interval->d > 0) {
            return $interval->format('%d d');
        } elseif ($interval->h > 0) {
            return $interval->format('%h h');
        } elseif ($interval->i > 0) {
            return $interval->format('%i m');
        } elseif ($interval->s < 60) {
            return 'now';
        } else {
            return $interval->format('%s second(s) ago');
        }
    }
}
