<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['post_id', 'user_id', 'content'];
    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
