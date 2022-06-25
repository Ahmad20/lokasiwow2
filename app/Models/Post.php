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
        'name',
        'rating_total',
        'image_link',
        'rating_score',
        'image_url',
        'location',
        'category',
        'location_url'
    ];
    function comments(){
        return $this->hasMany(Comment::class)->orderBy('id','desc');
    }
}
