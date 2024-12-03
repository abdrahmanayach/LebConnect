<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Like extends Model
{
    protected $table = 'likes';
    protected $fillable = ['user_id', 'post_id'];
    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
