<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable=['post_id','image'];

    //Una imagen pertenecera a un post
    public function post(){
        return $this->belongsTo(Post::class);
    }

}
