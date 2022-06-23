<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'posts';
    protected $primaryKey='post_id';
    protected $fillable = [
        'title',
        'location',
        'image_link',
        // 'count_like'
        'rating_score',
        'rating_count',
    ];
    function comments(){
        return $this->hasMany(Comment::class)->orderBy('id','desc');
    }
}
