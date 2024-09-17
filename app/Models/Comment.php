<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'content',
        'user_id',
        'blog_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
    public function getCreatedAtFormattedAttribute() {
        return $this->created_at->format('H:i || d M Y');
    }
    public function likes()
    {
        return $this->hasMany(Like::class)->where('like_type', 'comment');
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
