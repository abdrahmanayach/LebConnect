<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DateTime;

class Job extends Model
{
    protected $table = 'jobs';
    protected $fillable = ['company', 'job_title', 'location', 'salary', 'type', 'email', 'description', 'user_id'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getElapsedTimeAttribute()
    {
        $createdAt = new DateTime($this->created_at);
        $currentTime = new DateTime();

        $interval = $createdAt->diff($currentTime);

        if ($interval->y >= 1) {
            return $interval->y . ' year' . ($interval->y == 1 ? '' : 's') . ' ago';
        } elseif ($interval->m >= 1) {
            return $interval->m . ' month' . ($interval->m == 1 ? '' : 's') . ' ago';
        } elseif ($interval->d >= 1) {
            return $interval->d . ' day' . ($interval->d == 1 ? '' : 's') . ' ago';
        } elseif ($interval->h >= 1) {
            return $interval->h . ' hour' . ($interval->h == 1 ? '' : 's') . ' ago';
        } elseif ($interval->i >= 1) {
            return $interval->i . ' minute' . ($interval->i == 1 ? '' : 's') . ' ago';
        } elseif ($interval->s < 60) {
            return 'just now';
        } else {
            return $interval->s . ' second' . ($interval->s == 1 ? '' : 's') . ' ago';
        }
    }

    public function getReqAttribute()
    {
        return explode("\n", $this->description);
    }
}
