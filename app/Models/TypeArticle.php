<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeArticle extends Model
{
    use HasFactory;

    protected $table = "type_articles";

    public function articles(){
      return $this->hasMany(Article::class);
    }
}
