<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    public $fillable = [
        "nom", "noSerie",  "type_article_id"
    ];

    public function type()
    {
       return $this->belongsTo(TypeArticle::class, "type_articles", "id");
    }
    public function taraifications(){
        return $this->hasMany(Tarification::class);
    }

    public function locations(){
        return $this->belongsToMany(Location::class, "article_location", "article_id", 'location_id');
    }
    public function proprietes(){
        return $this->belongsToMany(ProprieteArticle::class, "article_propriete", "article_id", 'propriete_article_id');
    }
}
