<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'category',
        'price',
        'description',
        'image'
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
