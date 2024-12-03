<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table = 'shares';
    protected $fillable = ['post_id', 'user_id', 'shared_user_id'];
    protected $guarded = ['id'];
}
