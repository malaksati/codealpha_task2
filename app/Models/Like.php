<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'blog_id',
        'comment_id',
        'reply_id',
        'like_type'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
    public function comment(){
        return $this->belongsTo(Comment::class);
    }
    public function reply(){
        return $this->belongsTo(Reply::class);
    }
}
