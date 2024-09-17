<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Blog extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'content',
        'image',
        'user_id'
    ];
    public function getCreatedAtFormattedAttribute() {
        return $this->created_at->format('H:i || d M Y');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class)->where('like_type', 'blog');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
