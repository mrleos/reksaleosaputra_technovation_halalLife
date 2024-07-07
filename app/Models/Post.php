<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
        'report',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post_comment()
    {
        return $this->hasMany(PostComment::class);
    }

    public function commentsCount()
    {
        return $this->post_comment()->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
