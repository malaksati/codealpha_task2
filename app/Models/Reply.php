<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'user_id',
        'comment_id',
        'blog_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comment(){
        return $this->belongsTo(Comment::class);
    }
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class)->where('like_type', 'reply');
    }
}
