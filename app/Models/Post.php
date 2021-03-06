<?php

namespace App\Models;

use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    //protected $table = 'mi_tabla';

    //Habilitamos los atributos que pueden ser escritos.
    protected $fillable=['title','url','content','category_id','posted'];

    //Recuperamos los registros de la tabla category "uno a muchos"
    public function category(){
        return $this->belongsTo(Category::class);
    }

     //Un post contiene una imagen
     public function image(){
        return $this->hasOne(PostImage::class);
    }


}
