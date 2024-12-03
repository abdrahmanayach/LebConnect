<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Experience extends Model
{
    protected $table = 'experience';
    protected $fillable = ['job_title', 'company', 'type', 'description', 'start_date', 'end_date', 'user_id'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStartYearMonthAttribute()
    {
        return Carbon::parse($this->start_date)->format('Y/m');
    }

    public function getEndYearMonthAttribute()
    {
        return Carbon::parse($this->end_date)->format('Y/m');
    }

    public function getMonthsDifferenceAttribute()
    {
        $start = Carbon::parse($this->start_date);
        $end = Carbon::parse($this->end_date);
        $difference = $start->diffInMonths($end, false);
        return intval(max($difference, 1));
    }
}
