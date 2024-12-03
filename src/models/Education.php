<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = ['university', 'major', 'start_date', 'end_date', 'user_id'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStartYearAttribute()
    {
        return Carbon::parse($this->start_date)->format('Y');
    }

    public function getEndYearAttribute()
    {
        return Carbon::parse($this->end_date)->format('Y');
    }
}
