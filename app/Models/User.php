<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'birthdate',
        'gender',
        'phone',
        'image',
        'cover',
        'address'
    ];
    public function getFullNameAttribute(){
        return $this->fname .' '. $this->lname;
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
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
